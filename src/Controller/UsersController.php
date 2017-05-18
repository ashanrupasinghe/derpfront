<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {
	public function isAuthorized($user) {
		
		// The owner of an article can edit and delete it
		if (in_array ( $this->request->action, [ 
				'userpage' 
		] )) {
			
			if ($this->Auth->user ()) {
				return true;
			}
		}
		
		return parent::isAuthorized ( $user );
	}
	public function beforeFilter(Event $event) {
		parent::beforeFilter ( $event );
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow ( [ 
				'logout',
				'register' 
		] );
	}
	
	/*
	 * public function beforeFilter(Event $event)
	 * {
	 * parent::beforeFilter($event);
	 * // Allow users to register and logout.
	 * // You should not add the "login" action to allow list. Doing so would
	 * // cause problems with normal functioning of AuthComponent.
	 * $this->Auth->allow(['add', 'logout']);
	 * }
	 */
	
	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index() {
		$users = $this->paginate ( $this->Users );
		
		$this->set ( compact ( 'users' ) );
		$this->set ( '_serialize', [ 
				'users' 
		] );
	}
	
	/**
	 * View method
	 *
	 * @param string|null $id
	 *        	User id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null) {
		$user = $this->Users->get ( $id, [ 
				'contain' => [ 
						'Callcenter',
						'Delivery',
						'Suppliers' 
				] 
		] );
		
		$this->set ( 'user', $user );
		$this->set ( '_serialize', [ 
				'user' 
		] );
	}
	
	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add() {
		$user = $this->Users->newEntity ();
		if ($this->request->is ( 'post' )) {
			$user = $this->Users->patchEntity ( $user, $this->request->data );
			if ($this->Users->save ( $user )) {
				$this->Flash->success ( __ ( 'The user has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'user' ) );
		$this->set ( '_serialize', [ 
				'user' 
		] );
	}
	
	/**
	 * Edit method
	 *
	 * @param string|null $id
	 *        	User id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
		$user = $this->Users->get ( $id, [ 
				'contain' => [ ] 
		] );
		if ($this->request->is ( [ 
				'patch',
				'post',
				'put' 
		] )) {
			$user = $this->Users->patchEntity ( $user, $this->request->data );
			if ($this->Users->save ( $user )) {
				$this->Flash->success ( __ ( 'The user has been saved.' ) );
				
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		}
		$this->set ( compact ( 'user' ) );
		$this->set ( '_serialize', [ 
				'user' 
		] );
	}
	
	/**
	 * Delete method
	 *
	 * @param string|null $id
	 *        	User id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null) {
		$this->request->allowMethod ( [ 
				'post',
				'delete' 
		] );
		$user = $this->Users->get ( $id );
		if ($this->Users->delete ( $user )) {
			$this->Flash->success ( __ ( 'The user has been deleted.' ) );
		} else {
			$this->Flash->error ( __ ( 'The user could not be deleted. Please, try again.' ) );
		}
		
		return $this->redirect ( [ 
				'action' => 'index' 
		] );
	}
	public function login() {
		if (! $this->Auth->user ()) {
			if ($this->request->is ( 'post' )) {
				$user = $this->Auth->identify ();
				if ($user) {
					if ($user ['status'] == 1) {
						
						$this->Auth->setUser ( $user );
						$mobtoken = $this->__getMobToken ();
						$query = $this->Users->query ();
						$update_data = [ 
								'mobtoken' => $mobtoken,
								'mobtoken_created_at' => date ( 'Y-m-d H:i:s' ) 
						];
						$query->update ()->set ( $update_data )->where ( [ 
								'id' => $user ['id'] 
						] )->execute ();
						
						$this->__updateCart ();
						
						return $this->redirect ( $this->Auth->redirectUrl () );
					} else {
						$this->Flash->error ( __ ( 'Your account has been disabled' ) );
					}
				} else {
					
					$this->Flash->error ( __ ( 'Invalid username or password, try again' ) );
				}
			}
		} else {
			
			return $this->redirect ( '/user/dashboard' );
		}
		
		$register_url="/user/register";
		if ($this->request->getQuery('redirect')!=null){
			$register_url="/user/register?redirect=".urlencode($this->request->getQuery('redirect'));			
		}
		$this->set('register_url',$register_url);
	}
	public function logout() {
		if ($this->Auth->user ()) {
			$session = $this->request->session ();
			
			$user = $this->Users->get ( $this->Auth->user ( 'id' ) );
			$user->mobtoken = '';
			$user->mobtoken_created_at = date ( 'Y-m-d H:i:s' );
			if ($this->Users->save ( $user )) {
				$session->destroy ();
				return $this->redirect ( $this->Auth->logout () );
			} else {
				$this->Flash->error ( __ ( 'Something went wrong' ) );
				$this->redirect('/user/login');
			}
		} else {
			$this->Flash->error ( __ ( 'You are not loged in' ) );
			$this->redirect('/user/login');
		}
	}
	public function userpage() {
		if ($this->Auth->user ()) {
			$userlevel = $this->Auth->user ( 'user_type' );
			if ($userlevel == 1) {
				return $this->redirect ( [ 
						'controller' => 'Customers',
						'action' => 'search' 
				] );
			}
			if ($userlevel == 2) {
				return $this->redirect ( [ 
						'controller' => 'Customers',
						'action' => 'search' 
				] );
			}
			if ($userlevel == 3) {
				$user_id = $this->Auth->user ( 'id' );
				return $this->redirect ( [ 
						'controller' => 'SupplierNotifications',
						'action' => 'schedule' 
				] );
			}
			if ($userlevel == 4) {
				return $this->redirect ( [ 
						'controller' => 'DeliveryNotifications',
						'action' => 'listSuppliervice' 
				] );
			}
		} else {
			return $this->redirect ( [ 
					'controller' => 'Users',
					'action' => 'login' 
			] );
		}
	}
	function __getMobToken() {
		/*
		 * $hasher = new DefaultPasswordHasher();
		 * $token=$hasher->hash(sha1(Text::uuid()));
		 */
		$token = "";
		for($i = 0; $i < 100; $i ++) {
			$d = rand ( 1, 100000 ) % 2;
			$d ? $token .= chr ( rand ( 33, 79 ) ) : $token .= chr ( rand ( 80, 126 ) );
		}
		(rand ( 1, 100000 ) % 2) ? $token = strrev ( $token ) : $token = $token;
		// Generate hash of random string
		$hash = Security::hash ( $token, 'sha256', true );
		;
		for($i = 0; $i < 20; $i ++) {
			$hash = Security::hash ( $hash, 'sha256', true );
		}
		
		return $hash;
	}
	private function __updateCart() {
		// if session has cart id, check current user cart id and update cart products, den delete cat id
		$session = $this->request->session ();
		$user = $this->Users->get ( $this->Auth->user ( 'id' ), [ 
				'contain' => [ 
						'Cart' 
				] 
		] ); // user cart id
		/* print '<pre>';
		print_r($user->cart->id);
		die(); */
		//$user_cart = $user->Cart;
		$cart_id = $user->cart->id; // logedin user cart id
		
		if ($session->read ( 'cart_id' ) != "") {
			$cart_products = $this->loadModel ( 'cartProducts' );
			$query = $cart_products->query ();
			$query->update ()->set ( [ 
					'cart_id' => $cart_id 
			] )->where ( [ 
					'cart_id' => $session->read ( 'cart_id' ) 
			] )->execute (); // update cart product tempory cart id to original cart id
			
			$temp_cart = $this->Users->Cart->get ( $session->read ( 'cart_id' ) );
			$this->Users->Cart->delete ( $temp_cart );
		}
		$session->write ( 'cart_id', $cart_id );
	}
	public function register() {
		$user = $this->Users->newEntity ();
		if ($this->request->is ( 'post' )) {
			$data = $this->request->data;
			
			$user_data = [ 
					'username' => $data ['email'],
					'user_type' => 5,
					'password' => $data ['password'],
					'confirm_password' => $data ['confirm_password'],
					'status' => 1,
					'formType' => $data ['formType'] 
			];
			
			// $customer_data[];
			$data ['status'] = 1;
			$user = $this->Users->patchEntity ( $user, $user_data );
			// print_r($user);
			// die($user->id);
			if ($this->Users->save ( $user )) {
				$data ['user_id'] = $user->id;
				$customer_model = $this->loadModel ( 'customers' );
				$customer = $customer_model->newEntity ();
				$customer = $customer_model->patchEntity ( $customer, $data );
				
				if ($customer_model->save ( $customer )) {
					// $this->Flash->success(__('The user has been saved.'));
					// Retrieve user from DB
					$authUser = $this->Users->get ( $user->id )->toArray ();
					
					// Log user in using Auth
					$this->Auth->setUser ( $authUser );
					
					$mobtoken = $this->__getMobToken ();
					$query = $this->Users->query ();
					$query->update ()->set ( [ 
							'mobtoken' => $mobtoken,
							'mobtoken_created_at' => date ( 'Y-m-d H:i:s' ) 
					] )->where ( [ 
							'id' => $user ['id'] 
					] )->execute ();
					
					// create cart
					$cart_model = $this->loadModel ( 'Cart' );
					$cart_entity = $cart_model->newEntity ( [ 
							'user_id' => $user->id 
					] );
					// $cart_entity->patchEntity($cart_entity,['user_id'=>$user->id]);
					$cart_model->save ( $cart_entity );
					
					$this->__updateCart ();
					// Redirect user
					$this->Flash->success ( __ ( 'Registered succesfully' ) );
					return $this->redirect ( $this->Auth->redirectUrl () );
				} else {
					$this->Flash->error ( __ ( 'Ops, Something went wrong' ) );
					/*
					 * $return->status = 901;
					 * $return->message = "Unable to save customer. Try again.";
					 * echo json_encode ( $return );
					 * die ();
					 */
				}
				
				return $this->redirect ( [ 
						'action' => 'register' 
				] );
			} else {
				$this->Flash->error ( __ ( 'The user could not be saved. Please, try again.' ) );
				/*
				 * $return ['status'] = 902;
				 * $return ['message'] = "Unable to save user. Try again.";
				 * echo json_encode ( $return );
				 * die ();
				 */
			}
		}
		
		
		$login_url="/user/login";
		if ($this->request->getQuery('redirect')!=null){
			$login_url="/user/login?redirect=".urlencode($this->request->getQuery('redirect'));			
		}
		$this->set('login_url',$login_url);
		
	}
}
