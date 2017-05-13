<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use App\Model\Table\CartProductsTable;
use App\Model\Table\CartTable;

class CartController extends AppController {
	
	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		parent::beforeFilter($event);
		$this->Auth->allow ();
	}

    public function addproduct() {
    	
        //header('Content-type: application/json');
        //if ($this->request->is('post')) {
        // $data=$this->request->data();//cart_id,product_id,qty,type[default-1]
        //$product_id = $this->request->query('product_id');
        //$product_qty = $this->request->query('qty');
    	$product_id = $this->request->data('product_id');
    	$product_qty = $this->request->data('qty');
        
        $session = $this->request->session();
        $phpsessid = $session->read('d2d_session_id');
        $phpsessid = '123456';
        $phpsessid=session_id();    
         
        if ($session->read('cart_id') == "") {
            $cart_id = $this->add('', $phpsessid);
            $session->write('cart_id', $cart_id);
        } else {
            $cart_id = $session->read('cart_id');
        }
        
        
        if ($product_id != null && $product_qty != null) {
        	
            if ($cart_id && !($this->__isInCart($cart_id, $product_id, 1))) {
            	
            	
                $data = [
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'qty' => $product_qty,
                    'type' => 1
                ];

                $cart_product_model = $this->loadModel('CartProducts');
                $product_entity = $cart_product_model->newEntity($data);
                $saving = $cart_product_model->save($product_entity);
                
                if ($saving) {
                	$cart_products = CartProductsTable::getCart ( $cart_id, 1 );
                	
                    $return ['status'] = 0;
                    $return ['message'] = 'Product has been added to cart';
                    $return ['result'] ['product_list'] = $cart_products;
                    $return ['result'] ['cart_size'] = sizeof($cart_products);
                    $return ['result'] ['total'] = $this->__getTotal($cart_id);
                } else {
                    $return ['status'] = 500;
                    $return ['message'] = 'Product not added to cart';
                }
            } else {
                $return ['status'] = 0;
                $return ['message'] = 'Product already in your cart';
            }
        } else {
            $product = $this->__isInCart($cart_id, $product_id, 1);
            $new_qty = $product_qty; //+ $product['qty']; 
            $product->qty = $new_qty;
            if ($cart_product_model->save($product)) {
                $return ['status'] = 0;
                $return ['message'] = 'Pruduct qty updated successfully';
            } else {
                $return ['status'] = 500;
                $return ['message'] = 'Culd not update the qty';
            }
        }
        /* } else {
          $return ['status'] = 500;
          $return ['message'] = "Unauthorized acess";
          } */
        echo json_encode($return);
        //echo json_encode($return);
        die();
    }

    private function __isCartExists($session_id) {
        $categories = TableRegistry::get('Cart');

        $cart = $categories->find()
                ->select(['id'])
                ->where(['session_id' => $session_id])
                ->toArray();

        if (!empty($cart)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($user_id = NULL, $phpsessid = NULL) {

        $cart = $this->Cart->newEntity();
        $data = array('session_id' => $phpsessid, 'user_id' => $user_id);

        $cart = $this->Cart->patchEntity($cart, $data);
        if ($result = $this->Cart->save($cart)) {
                return $result->id;
            }else{
                return -1;
            }
    }

    public function __isInCart($cart_id, $product_id) {
    	
        $cart_product_model = $this->loadModel('CartProducts');
        
        $result = $cart_product_model->find('all', [
                    'conditions' => [
                        'cart_id' => $cart_id,
                        'product_id' => $product_id
                    ]
                ])->toArray();
                   
        if (sizeof($result) > 0) {
            return $result[0]['qty'];
        }
        return false;
    }
    
    
    public function __getTotal($cart_id) {
    	$tax_p = 0; // tax persontage 10
    	$discount_p = 0; // discount persentage 5
    	$counpon_value = 0; // call to a function to find coupon values
    	$sub_total = CartTable::getTotal ( $cart_id, 1 );
    
    	$tax = $sub_total * $tax_p / 100;
    	$discount = $sub_total * $discount_p / 100;
    	$grand_total = $sub_total + $tax - $discount - $counpon_value;
    
    	$total ['sub_total'] = $sub_total;
    	$total ['tax'] = $tax;
    	$total ['discount'] = $discount;
    	$total ['counpon_value'] = $counpon_value;
    	$total ['grand_total'] = $grand_total;
    	return $total;
    }
    
    public function getcart() {
    	$token=$this->__getToken();     	
    	$chck = $this->__checkToken ($token);
    	if ($chck ['boolean']) {
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    		if ($cart_id) {
    
    			$total = $this->__getTotal ( $cart_id );
    			$cart_products = CartProductsTable::getCart ( $cart_id, 1 );
    			// $cart_products = $this->__getProductList ( $cart_id, 1 );
    
    			if (sizeof ( $cart_products ) > 0) {
    				$return ['status'] = 0;
    				$return ['message'] = 'success';
    				$return ['result'] ['product_list'] = $cart_products;
    				$return ['result'] ['total'] = $total; 
    				$this->set(['return'=>$return]);
    			} else {
    				$return ['status'] = 0;
    				$return ['message'] = 'your cart is empty';
    				$return ['result'] ['product_list'] = $cart_products;
    				$return ['result'] ['total'] = $total;
    				$this->set(['return'=>$return]);
    			}
    		} else {
    			/* $return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart"; */
    			$this->Flash->error(__('you have not create a cart'));
    		}
    	} else {
    		/* $return ['status'] = 100;
    		$return ['message'] = $chck ['message']; */
    		$this->Flash->error(__('Token miss match'));
    	}
    
    	
    }
    
    
    /**
     *
     * @param unknown $token
     * @return multitype:boolean string
     */
    function __checkToken($token) {
    	
    	$user_model = $this->loadModel ( 'users' );
    	$user = $user_model->find ( 'all', [
    			'conditions' => [
    					'mobtoken' => $token
    			]
    	] )->first ();
    			
    			
    			if (sizeof ( $user ) <= 0) {
    				return [
    						'boolean' => false,
    						'message' => 'token not found'
    				];
    			} else {
    				/*
    				 * $mobtoken_created_at = $user->mobtoken_created_at;
    				 * $mobtoken_created_at = new Time ( $mobtoken_created_at );
    				 */
    					
    				/*
    				 * echo $mobtoken_created_at;
    				 * die ();
    				 */
    					
    				/*
    				 * if ($mobtoken_created_at->wasWithinLast ( 1 )) {
    				 * $user->mobtoken_created_at = date ( 'Y-m-d H:i:s' );
    				 * $user_model->save ( $user );
    				 *
    				 * return [
    				 * 'boolean' => true,
    				 * 'message' => 'token matched',
    				 * 'user_id' => $user->id
    				 * ];
    				 * } else {
    				 * return [
    				 * 'boolean' => false,
    				 * 'message' => 'token expired'
    				 * ];
    				 * }
    				 */
    				$user->mobtoken_created_at = date ( 'Y-m-d H:i:s' );
    				$user_model->save ( $user );
    					
    				return [
    						'boolean' => true,
    						'message' => 'token matched',
    						'user_id' => $user->id
    				];
    			}
    }
    
    public function __getCurrentCartId($user_id) {
    	// $session_id = $this->__getSessionId ();
    	// $user_id = $this->__getUserId ();
    	$cart_id = $this->Cart->find ( 'all', [
    			'fields' => [
    					'id'
    			]
    	] )->where ( [
    			'user_id' => $user_id
    	] )->toArray ();
    
    	if (sizeof ( $cart_id ) > 0) {
    		$cart_id = $cart_id [0]->id;
    	} else {
    		$cart_id = null;
    	}
    	return $cart_id;
    }
    
    private function __getToken(){
    	$user_id=$this->Auth->user('id');
    	$um=$this->loadModel('Users');
    	$u=$um->get($user_id);//current logedin user
    	return $u->mobtoken;
    }
    
    public function getAddress() {
    	$token = $this->__getToken();
    	$chck = $this->__checkToken ( $token );
    	if ($chck ['boolean']) {
    			
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    			
    		if ($cart_id) {
    			$shippingModel = $this->loadModel ( 'Shipping' );
    			$shipping = $shippingModel->find ( 'all', [
    					'fields' => [
    							'id',
    							'street_number',
    							'street_address',
    							'city'
    					],
    					'conditions' => [
    							'cart_id' => $cart_id
    					],
    					'order' => [
    							'Shipping.created_at' => 'DESC'
    					]
    			] )->distinct ( [
    					'street_number',
    					'street_address',
    					'city'
    			] )->formatResults ( function ($results) {
    				return $results->combine ( '{n}', function ($row) {
    					return [
    							'id' => $row ['id'],
    							'address' => $row ['street_number'] . ', ' . $row ['street_address'] . ', ' . $row ['city']
    					];
    				} );
    			} )->toArray ();
    			$return ['status'] = 0;
    			$return ['message'] = "Success";
    			$return ['result'] = $shipping;
    		} else {
    			$return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart";
    		}
    	} else {
    		$return ['status'] = 100;
    		$return ['message'] = $chck ['message'];
    	}
    
    	return $return;
    }
    
    public function checkout(){
    	$address_book=$this->getAddress();    	
    	$address_book=$address_book['result'];  
    	//$address_book='';
    	$address_book[]=['id'=>'','address'=>'New Address'];    	
    	$this->set(['address_book'=>$address_book]);
    }

}
