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

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Model\Table\CartProductsTable;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');        
		//$this->loadComponent('Auth');
        $this->loadComponent('Auth',['authorize' => ['Controller']]);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        $this->set('authUser', $this->Auth->user());//set a variable for view, for check userloged in or not
        $this->set('payment_status',[
        		1=>'pending',2=>'informed to supplier',
        		3=>'products_ready',4=>'delivery tookover',
				5=>'delivered',6=>'completed',
        		7=>'driver informed', 9=>'cancelled'
        		
        ]);
    }
    
    public function beforeFilter(\Cake\Event\Event $event) {
    	
    	
    	if(0){//$this->Auth->loggedIn()
    		echo 'under dev';
    		die();
    
    	}else{
    		$session = $this->request->session();
    		 
    		if ($session->check('cart_id')){
    			$cart_id= $session->read('cart_id');
    			$cart_products=CartProductsTable::getCart($cart_id, 1);
    			$cart_size=sizeof($cart_products);
    			$total=( new CartController)->__getTotal ( $cart_id );
    			
    			$wishlist_products=CartProductsTable::getCart($cart_id, 0);
    			$wishlist_size=sizeof($wishlist_products);
    		}else {
    			$cart_size=0;
    			$cart_products=[];
    			$total=0;
    			
    			$wishlist_size=0;
    			$wishlist_products=[];
    			
    		}
    		
    		/* if($this->Session->check('fbid')){
    		 $cart_products=$this->Notification->getNotificationCount($this->Auth->user('id'));
    		 $cart_size=$this->Notification->getNotificationCount($this->Auth->user('id'));
    		} */
    	}
    	
    	$this->set('cart_size', $cart_size);
    	$this->set('cart_products', $cart_products);
    	$this->set('total', $total);
    	
    	$this->set('wishlist_size', $wishlist_size);
    	$this->set('wishlist_products', $wishlist_products);
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    

}

