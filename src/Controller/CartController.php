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
use Cake\I18n\Time;

class CartController extends AppController {
	public function isAuthorized($user) {
		if (in_array ( $this->request->action, [
				/* 'getcart', */
				'getAddress',
				'updateAddress',
				'addAddress',
				'updateDeliveryTime',
				'completeCheckout',
				'getCheckout',
				'checkout',
				'dashboard',
				'getcart'
				
		] )) {
			if (isset ( $user ['user_type'] ) && $user ['user_type'] == 5) {
				return true;
			}
		}
		return parent::isAuthorized ( $user );
	}
	
	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		parent::beforeFilter($event);
		$this->Auth->allow (['addproduct','deleteproduct']);
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
                $return ['status'] = 888;
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

    public function updateAddress() {
    	$this->request->allowMethod ( [
    			'post'
    	] );
    	header ( 'Content-type: application/json' );
    
    	$token = $this->__getToken();
    	$address_id = $this->request->data ( 'address_id' );
    	// print_r($address_id);
    
    	$chck = $this->__checkToken ( $token );
    	if ($chck ['boolean']) {
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    			
    		if ($cart_id) {
    			$shippingModel = $this->loadModel ( 'Shipping' );
    			$address = $shippingModel->get ( $address_id ); // selected address
    			/*
    			 * print '<pre>';
    			 * print_r($cart_id);
    			 * die();
    			*/
    			$currrent_shipping_details = $shippingModel->find ( 'all', [
    					'conditions' => [
    							'cart_id' => $cart_id,
    							'order_id' => 0
    					]
    			] )->toArray ();
    					if (sizeof ( $currrent_shipping_details ) > 0) {
    						$currrent_shipping = $shippingModel->get ( $currrent_shipping_details [0]->id );
    						$currrent_shipping->street_number = $address->street_number;
    						$currrent_shipping->street_address = $address->street_address;
    						$currrent_shipping->city = $address->city;
    						$currrent_shipping->country = $address->country;
    					} else {
    						$data = [
    								'cart_id' => $cart_id,
    								'street_number' => $address->street_number,
    								'street_address' => $address->street_address,
    								'city' => $address->city,
    								'country' => $address->country,
    								'phone_number' => $address->phone_number
    						];
    						$currrent_shipping = $shippingModel->newEntity ( $data );
    					}
    					if ($shippingModel->save ( $currrent_shipping )) {
    							
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
    						$return ['message'] = "success";
    						$return ['result'] = $shipping;
    					} else {
    						$return ['status'] = 912;
    						$return ['message'] = "Culd not update address";
    					}
    		} else {
    			$return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart";
    		}
    	} else {
    		$return ['status'] = 100;
    		$return ['message'] = $chck ['message'];
    	}
    
    	echo json_encode ( $return );
    	die ();
    }    
    
    public function addAddress() {
    	$this->request->allowMethod ( [
    			'post'
    	] );
    	header ( 'Content-type: application/json' );
    
    	$token = $this->__getToken();
    	$phone_number = $this->request->data ( 'phone_number' );
    	$street_number = $this->request->data ( 'street_number' );
    	$street_address = $this->request->data ( 'street_address' );
    	$city = $this->request->data ( 'city' );
    	$country = $this->request->data ( 'country' );
    
    	$chck = $this->__checkToken ( $token );
    	if ($chck ['boolean']) {
    			
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    		$data = [
    				'cart_id' => $cart_id,
    				'street_number' => $street_number,
    				'street_address' => $street_address,
    				'city' => $city,
    				'country' => $country,
    				'phone_number' => $phone_number
    		];
    		if ($cart_id) {
    			$shippingModel = $this->loadModel ( 'Shipping' );
    			$currrent_shipping_details = $shippingModel->find ( 'all', [
    					'conditions' => [
    							'cart_id' => $cart_id,
    							'order_id' => 0
    					]
    			] )->toArray ();
    					if (sizeof ( $currrent_shipping_details ) > 0) {
    						$currrent_shipping = $shippingModel->get ( $currrent_shipping_details [0]->id );
    						$currrent_shipping->street_number = $data ['street_number'];
    						$currrent_shipping->street_address = $data ['street_address'];
    						$currrent_shipping->city = $data ['city'];
    						$currrent_shipping->country = $data ['country'];
    						$currrent_shipping->phone_number = $data ['phone_number'];
    						if ($shippingModel->save ( $currrent_shipping )) {
    							
    							$return ['status'] = 0;
    							$return ['message'] = "Success";
    							$return ['result']=$this->__getAddress($cart_id);
    						} else {
    							$return ['status'] = 912;
    							$return ['message'] = "Address not saved";
    						}
    					} else {
    						$shippingEntity = $shippingModel->newEntity ( $data );
    						if ($shippingModel->save ( $shippingEntity )) {
    							$return ['status'] = 0;
    							$return ['message'] = "Success";
    							$return ['result']=$this->__getAddress($cart_id);
    						} else {
    							$return ['status'] = 912;
    							$return ['message'] = "Address not saved";
    						}
    					}
    		} else {
    			$return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart";
    		}
    	} else {
    		$return ['status'] = 100;
    		$return ['message'] = $chck ['message'];
    	}
    
    	echo json_encode ( $return );
    	die ();
    }
    
    public function updateDeliveryTime() {
    	$this->request->allowMethod ( [
    			'post'
    	] );
    	header ( 'Content-type: application/json' );
    
    	$token = $this->__getToken();
    	$delivery_time = $this->request->data ( 'delivery_time' );
    	$delivery_date = $this->request->data ( 'delivery_date' );
    	
    	
    	//
    
    	$delivery_time_string = strtotime ( "$delivery_date $delivery_time" ); // new Time($delivery_time);//$delivery_time->i18nFormat('yyyy-MM-dd HH:mm:ss');
    	
    	$delivery_time_formated = date ( 'Y-m-d h:m:s', $delivery_time_string );
    	//echo $delivery_time_string.'--|||--'.$delivery_time_formated;
    	//die();
    	$chck = $this->__checkToken ( $token );
    	if ($chck ['boolean']) {
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    			
    		if ($cart_id) {
    			$shippingModel = $this->loadModel ( 'Shipping' );
    			$currrent_shipping_details = $shippingModel->find ( 'all', [
    					'conditions' => [
    							'cart_id' => $cart_id,
    							'order_id' => 0
    					]
    			] )->toArray ();
    
    					if (sizeof ( $currrent_shipping_details ) > 0) {
    						$currrent_shipping = $shippingModel->get ( $currrent_shipping_details [0]->id );
    						$currrent_shipping->delivery_date_time = $delivery_time_formated;
    							
    						if ($shippingModel->save ( $currrent_shipping )) {
    							$return ['status'] = 0;
    							$return ['message'] = "success";
    						} else {
    							$return ['status'] = 916;
    							$return ['message'] = "Culd not save delivery time";
    						}
    					} else {
    						$last_shipping = $shippingModel->find ( 'all', [
    								'fields' => [
    										'id',
    										'street_number',
    										'street_address',
    										'city',
    										'country',
    										'phone_number'
    								],
    								'conditions' => [
    										'cart_id' => $cart_id
    								],
    								'order' => [
    										'Shipping.created_at' => 'DESC'
    								],
    								'limit' => 1
    						] )->toArray ();
    						/*
    						 * print '<pre>';
    						 * print_r($last_shipping);
    						 * die();
    					 */
    						if(sizeof($last_shipping)>0){
    							$data = [
    									'cart_id' => $cart_id,
    									'street_number' => $last_shipping [0]->street_number,
    									'street_address' => $last_shipping [0]->street_address,
    									'city' => $last_shipping [0]->city,
    									'country' => $last_shipping [0]->country,
    									'phone_number' => $last_shipping [0]->phone_number,
    									'delivery_date_time' => $delivery_time_formated
    							];
    								
    							$shippingEntity = $shippingModel->newEntity ( $data );
    							if ($shippingModel->save ( $shippingEntity )) {
    								$return ['status'] = 0;
    								$return ['message'] = "Success";
    							} else {
    								$return ['status'] = 911;
    								$return ['message'] = "Address and time not saved";
    							}
    								
    						}else{
    							$return ['status'] = 910;
    							$return ['message'] = "please fille delivery address first";
    						}
    					}
    		} else {
    			$return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart";
    		}
    	} else {
    		$return ['status'] = 100;
    		$return ['message'] = $chck ['message'];
    	}
    
    	echo json_encode ( $return );
    	die ();
    }
    public function completeCheckout() {
    	$this->request->allowMethod ( [
    			'post'
    	] );
    	header ( 'Content-type: application/json' );
    
    	$token = $this->__getToken();
    	$chck = $this->__checkToken ( $token );
    	if ($chck ['boolean']) {
    			
    		$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
    			
    		if ($cart_id) {
    			if ($this->__iscartEmpty ( $cart_id )) {
    				$return ['status'] = 522;
    				$return ['message'] = "you cart is empty";
    			} else {
    				// add shipping details
    				// echo 'ssss';
    				$order_id = $this->__addOrder ( $cart_id, $chck ['user_id'] );
    				if ($order_id) {
    					$addOrderProducts = $this->__addOrderProducts ( $cart_id, $order_id );
    					if ($addOrderProducts) {
    						// update shipping order id
    						$this->__updateShippingOrderId ( $cart_id, $order_id );
    						if ($this->__clearCart ( $cart_id )) {
    							$return ['status'] = 0;
    							$return ['message'] = "success";
    						} else {
    							$return ['status'] = 906;
    							$return ['message'] = "something went wrong, cart not clear";
    						}
    					} else {
    						$return ['status'] = 907;
    						$return ['message'] = "something went wrong, order products not saved";
    					}
    				} else {
    					$return ['status'] = 908;
    					$return ['message'] = "something went wrong, order data not saved";
    				}
    					
    				$return ['status'] = 0;
    				$return ['message'] = "success";
    			}
    		} else {
    			$return ['status'] = 444;
    			$return ['message'] = "you haven't create a cart";
    		}
    	} else {
    		$return ['status'] = 100;
    		$return ['message'] = $chck ['message'];
    	}
    
    	echo json_encode ( $return );
    	die ();
    } 
    function __iscartEmpty($cartID) {
    	$cart_products = $this->loadModel ( 'CartProducts' );
    	$cart_products->find ( 'all', [
    			'conditions' => [
    					'cart_id' => $cartID
    			]
    	] )->toArray ();
    			if (sizeof ( $cartID > 0 )) {
    				return false;
    			}
    			return true;
    }
    function __clearCart($cart_id) {
    	if ($cart_id) {
    		$cart_product_model = $this->loadModel ( 'CartProducts' );
    		if ($cart_product_model->deleteAll ( [
    				'cart_id' => $cart_id,
    				'type' => 1
    		] )) {
    			return true;
    		} else {
    			return false;
    		}
    	}
    }
    function __updateShippingOrderId($cart_id, $order_id) {
    	$shippingModel = $this->loadModel ( 'Shipping' );
    	$currrent_shipping_details = $shippingModel->find ( 'all', [
    			'conditions' => [
    					'cart_id' => $cart_id,
    					'order_id' => 0
    			]
    	] )->toArray ();
    			$currrent_shipping = $shippingModel->get ( $currrent_shipping_details [0]->id );
    			$currrent_shipping->order_id = $order_id;
    			$update_shipping_order_id = $shippingModel->save ( $currrent_shipping );
    }
    function __addOrder($cart_id, $user_id) {
    	$shippingModel = $this->loadModel ( 'Shipping' );
    	$currrent_shipping_details = $shippingModel->find ( 'all', [
    			'conditions' => [
    					'cart_id' => $cart_id,
    					'order_id' => 0
    			]
    	] )->toArray ();
    			$currrent_shipping = $shippingModel->get ( $currrent_shipping_details [0]->id );
    			$total = $this->__getTotal ( $cart_id );
    			$delivery_date_time = $currrent_shipping->delivery_date_time;
    			$delivery_date_time = strtotime ( $delivery_date_time );
    
    			$delivery_date = date ( 'Y-m-d', $delivery_date_time );
    			$delivery_time = date ( 'H:i:s', $delivery_date_time );
    			$order = [
    					'customerId' => $user_id,
    					'address' => $currrent_shipping->street_number . ' ' . $currrent_shipping->street_address . ' ' . $currrent_shipping->city . ' ' . $currrent_shipping->country,
    					'city' => $this->__getCityID ( $currrent_shipping->city ), // city id
    					'callcenterId' => 11, // have to null
    					'deliveryId' => 7, // default
    					'subTotal' => $total ['sub_total'],
    					'tax' => $total ['tax'],
    					'discount' => $total ['discount'],
    					'couponCode' => $total ['counpon_value'],
    					'total' => $total ['grand_total'],
    					'deliveryDate' => $delivery_date,
    					'deliveryTime' => $delivery_time,
    					'note' => $currrent_shipping->note,
    					'supplier_note' => '',
    					'paymentStatus' => 1,
    					'status' => 2,
    					'deleted' => 0
    			];
    
    			$orderModel = $this->loadModel ( 'Orders' );
    			$orderEntity = $orderModel->newEntity ( $order );
    
    			$orderSaved = $orderModel->save ( $orderEntity );
    			if ($orderSaved) {
    				return $orderSaved->id;
    			}
    			return false;
    }
    function __addOrderProducts($cart_id, $order_id = 1) {
    	// cart products
    	$productModel = $this->loadModel ( 'Products' );
    	$cartproductsModel = $this->loadModel ( 'CartProducts' );
    	$cartProducts = $cartproductsModel->find ( 'all', [
    			'conditions' => [
    					'cart_id' => $cart_id,
    					'type' => 1
    			]
    	] )->toArray ();
    			/*
    			 * $cartProductsArray = array_reduce($cartProducts, function ($result, $item) {
    			 * $item = (array) $item;
    			 * $result[] = $item;
    			 * return $result;
    			 * }, array());
    		 */
    
    			// order products
    			$ordeProducts = [ ];
    			$i = 0;
    			foreach ( $cartProducts as $prduct ) {
    				$product = $productModel->get ( $prduct->product_id, [
    						'contain' => [
    								'productSuppliers',
    								'productSuppliers.Suppliers' => [
    										'conditions' => [
    												'status' => 1
    										]
    								]
    						]
    				] )->toArray ();
    							
    						$ordeProducts [$i] ['order_id'] = $order_id;
    						$ordeProducts [$i] ['product_id'] = $prduct->product_id;
    						$ordeProducts [$i] ['product_quantity'] = $prduct->qty;
    						$ordeProducts [$i] ['product_price'] = $product ['price'];
    						$ordeProducts [$i] ['supplier_id'] = $product ['product_suppliers'] [0] ['supplier_id'];
    						$ordeProducts [$i] ['status_s'] = 1;
    						$ordeProducts [$i] ['status_d'] = 0;
    						$ordeProducts [$i] ['deleted'] = 0;
    						$i ++;
    			}
    			$orderProductsModel = $this->loadModel ( 'OrderProducts' );
    			$entitiies = $orderProductsModel->newEntities ( $ordeProducts );
    			$savedOrderProducts = $orderProductsModel->saveMany ( $entitiies );
    
    			if ($savedOrderProducts) {
    				return true;
    			}
    			return false;
    }   
    
    function __getCityID($cityName) {
    	$cityModel = $this->loadModel ( 'City' );
    	$city = $cityModel->find ( 'all', [
    			'conditions' => [
    					'cname' => $cityName
    			]
    	] )->toArray ();
    			if (sizeof ( $city ) > 0) {
    				return $city [0]->cid;
    			} else {
    				$cityEntity = $cityModel->newEntity ( [
    						'cname' => $cityName
    				] );
    				if ($cityModel->save ( $cityEntity )) {
    					return $cityEntity->cid;
    				} else {
    					return 0;
    				}
    			}
    }
public function getCheckout() {
		$token = $this->__getToken();
		$chck = $this->__checkToken ( $token );
		if ($chck ['boolean']) {
			
			$cart_id = $this->__getCurrentCartId ( $chck ['user_id'] );
			
			if ($cart_id) {
				// $now=Time::now();
				$return ['status'] = 0;
				$return ['message'] = "success";
				$return ['delivery_time'] = $this->__getDeliveryTime ( $cart_id );
				$return ['delay_time'] = 240;
				$return ['delivery_address'] = $this->__getLastAddress ( $cart_id );
				$return ['unavailable_date'] = $this->__getUnavailableDates ();
				$return ['delivery_start_time'] = new Time ( '06:00:00' );
				$return ['delivery_end_time'] = new Time ( '18:00:00' );
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
    
    function __getDeliveryTime($cart_id) {
    	$shippingModel = $this->loadModel ( 'Shipping' );
    
    	$current_shipping = $shippingModel->find ( 'all', [
    			'fields' => [
    					'delivery_date_time'
    			],
    			'conditions' => [
    					'cart_id' => $cart_id,
    					'order_id' => 0
    			],
    			'order' => [
    					'Shipping.created_at' => 'DESC'
    			]
    	] )->toArray ();
    	if (sizeof ( $current_shipping ) > 0) {
    		if ($current_shipping [0]->delivery_date_time != null) {
    			$delevery_date_time=$current_shipping [0]->delivery_date_time;
    			$delevery_date_time_format_changed=new Time($delevery_date_time);
    
    			if ($delevery_date_time_format_changed->wasWithinLast('5 years') || $delevery_date_time_format_changed->isWithinNext('210 minutes')){
    				return '';
    			}else{
    				return $delevery_date_time;
    			}
    
    			/* $now=new Time();
    			 $now_plus_3h=$now->modify('+3 hours'); */
    			//echo 'past'.$delevery_date_time_format_changed->wasWithinLast(1000).'<br>';
    			//echo 'next'.$delevery_date_time_format_changed->isWithinNext('210 minutes');
    			//$now_with_3_hrs=$now->addMonth(3);
    			/* print_r($now);
    				echo '<br>';
    				print_r($now_with_3_hrs); */
    
    			//$currrent_date_time=$now->i18nFormat();
    			//$currrent_date_time_with_3_hrs=$now_with_3_hrs->i18nFormat();
    		}
    		return '';
    	} else {
    		return '';
    	}
    }
    function __getLastAddress($cart_id) {
    	$shippingModel = $this->loadModel ( 'Shipping' );
    	/*
    	 * $last_shipping = $shippingModel->find ( 'all', [
    	 * 'conditions' => [
    	 * 'cart_id' => $cart_id
    	 * ],
    	 * 'order' => [
    	 * 'Shipping.created_at' => 'DESC'
    	 * ]
    	 * ] )->toArray ();
    	*/
    	$last_shipping = $shippingModel->find ( 'all', [
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
    	] )->formatResults ( function ($results) {
    		return $results->combine ( '{n}', function ($row) {
    			return [
    					'id' => $row ['id'],
    					'address' => $row ['street_number'] . ', ' . $row ['street_address'] . ', ' . $row ['city']
    			];
    		} );
    	} )->toArray ();
    
    	$current_shipping = $shippingModel->find ( 'all', [
    			'fields' => [
    					'id',
    					'street_number',
    					'street_address',
    					'city'
    			],
    			'conditions' => [
    					'cart_id' => $cart_id,
    					'order_id' => 0
    			],
    			'order' => [
    					'Shipping.created_at' => 'DESC'
    			]
    	] )->formatResults ( function ($results) {
    		return $results->combine ( '{n}', function ($row) {
    			return [
    					'id' => $row ['id'],
    					'address' => $row ['street_number'] . ', ' . $row ['street_address'] . ', ' . $row ['city']
    			];
    		} );
    	} )->toArray ();
    	/*
    	 * print '<pre>';
    	 * print_r($current_shipping[0]);
    	 * die();
    	*/
    	if (sizeof ( $current_shipping ) <= 0) {
    		if (sizeof ( $last_shipping ) > 0) {
    			return $last_shipping [0];
    		} else {
    			return null;
    		}
    	} else {
    		return $current_shipping [0];
    	}
    }
    function __getUnavailableDates() {
    	$unavailableModel = $this->loadModel ( 'Unavailabledate' );
    	/*
    	 * $result = $unavailableModel->find ( 'list', [
    	 * 'keyField' => 'id',
    	 * 'valueField' => 'date'
    	 * ] )->toArray ();
    	 * return array_values ( $result );
    	*/
    	$result = $unavailableModel->find ( 'all', [
    			'fields' => [
    					'date'
    			]
    	] )->toArray ();
    	return array_map ( function ($result) {
    		return $result;
    	}, $result );
    }
    public function checkout(){
    	$address_book=$this->getAddress();    	
    	$address_book=$address_book['result'];  
    	//$address_book='';
    	$address_book[]=['id'=>'','address'=>'New Address'];
    	$get_checkout=$this->getCheckout();
    	
    	$this->set(['address_book'=>$address_book,'get_checkout'=>$get_checkout]);
    }
	public function __getAddress($cart_id){
		$shippingModel=$this->loadModel('Shipping');
		
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
		
		return  $shipping;
	}
	
	public function dashboard(){
		$user_id=$this->Auth->user('id');	
		//$customers_model=$this->loadModel('');	
		$user=$this->Cart->find('all',['fields'=>['Customers.id','Customers.user_id','Customers.firstName','Customers.lastName','Customers.newsLetter','Customers.address','Customers.city','Customers.email','Customers.mobileNo'],'contain'=>['users','users.Customers'],'conditions'=>['Users.id'=>$user_id]])->toArray();
		$orders=(new OrdersController())->getOrderList();
		/* print '<pre>';
		print_r($order['result']);
		die();	 */	
		$this->set(['user'=>$user[0]->customers,'orders'=>$orders['result']]);
	}
	
	
	public function deleteproduct() {
		
		$this->request->allowMethod ( [
				'post',
				'delete'
		] );
	
		header ( 'Content-type: application/json' );
		if ($this->request->is ( 'post' )) {
			$product_id = $this->request->data ( 'product_id' );			
			//$token = $this->__getToken();
			//$chck = $this->__checkToken ( $token );
			//if ($chck ['boolean']) {
				if ($product_id != null) {
					$session = $this->request->session();
					$cart_id = $session->read('cart_id');					
					if ($cart_id) {
						$cart_product_model = $this->loadModel ( 'CartProducts' );
	
						$product = $cart_product_model->find ( 'all', [
								'fields' => [
										'id'
								],
								'conditions' => [
										'cart_id' => $cart_id,
										'product_id' => $product_id,
										'type' => 1
								]
						] )->toArray ();
								if (sizeof ( $product ) > 0) {
									if ($cart_product_model->delete ( $cart_product_model->get ( $product [sizeof ( $product ) - 1]->id ) )) {
										$return ['status'] = 0;
										$return ['message'] = 'Pruduct deleted successfully';
										$return ['result'] = $this->__getcartIn ( $cart_id );
									} else {
										$return ['status'] = 914;
										$return ['message'] = 'Culd not delete the product';
									}
								} else {
									$return ['status'] = 411;
									$return ['message'] = 'The product not found in the cart';
								}
					} else {
						$return ['status'] = 444;
						$return ['message'] = 'you havent create a cart';
					}
				} else {
					$return ['status'] = 410;
					$return ['message'] = 'please select product id';
				}
			/* } else {
				$return ['status'] = 100;
				$return ['message'] = $chck ['message'];
			} */
		} else {
			$return ['status'] = 500;
			$return ['message'] = "Unauthorized acess";
		}
		echo json_encode ( $return );
		die ();
	}
	
	public function __getcartIn($cart_id) {
		$this->request->allowMethod ( [
				'post',
				'get'
		] );
		header ( 'Content-type: application/json' );
		//$cart_id = $this->__getCurrentCartId ( $user_id );
	
		if ($cart_id) {
				
			$total = $this->__getTotal ( $cart_id );
			$cart_products = CartProductsTable::getCart ( $cart_id, 1 );
			// $cart_products = $this->__getProductList ( $cart_id, 1 );
				
			if (sizeof ( $cart_products ) > 0) {
				$return ['status'] = 0;
				$return ['message'] = 'success';
				$return ['result'] ['product_list'] = $cart_products;
				$return ['result'] ['cart_size'] = sizeof($cart_products);
				$return ['result'] ['total'] = $total;
			} else {
				$return ['status'] = 0;
				$return ['message'] = 'your cart is empty';
				$return ['result'] ['product_list'] = $cart_products;
				$return ['result'] ['cart_size'] = sizeof($cart_products);
				$return ['result'] ['total'] = $total;
			}
		} else {
			$return ['status'] = 444;
			$return ['message'] = "you haven't create a cart";
		}
		return $return;
		die ();
	}
}
