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

class CartController extends AppController {

    public function addproduct() {
        //header('Content-type: application/json');
        //if ($this->request->is('post')) {
        // $data=$this->request->data();//cart_id,product_id,qty,type[default-1]
        $product_id = $this->request->query('product_id');
        $product_qty = $this->request->query('qty');
        $session = $this->request->session();
        $phpsessid = $session->read('d2d_session_id');
        $phpsessid = '123456';

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
                    $return ['status'] = 0;
                    $return ['message'] = 'Product has been added to cart';
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
            $new_qty = $product['qty'] + $product_qty;
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
            return $result['qty'];
        }
        return false;
    }

}
