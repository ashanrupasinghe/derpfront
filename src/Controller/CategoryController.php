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
use Cake\Controller\Component\PaginatorComponent;
use Cake\View\Helper\PaginatorHelper;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class CategoryController extends AppController {
	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		parent::beforeFilter ( $event );
		$this->Auth->allow ();
	}
	public $paginate = [ 
			'limit' => 20,
			'order' => [ 
					'Products.title' => 'asc' 
			] 
	];
	public function initialize() {
		parent::initialize ();
		$this->loadComponent ( 'Paginator' );
	}
	public function index($slug) {
		$return = [ ];
		$conditions = [ 
				'status' => 1 
		]; // enabled broducts
		
		if ($slug != null) {
			// check is a perent
			$cat = $this->Products->Categories->find ( 'all', [ 
					'conditions' => [ 
							'slug' => $slug 
					] 
			] )->first ();
			if (sizeof ( $cat ) > 0) {
				$return ['category'] = $cat;
				if ($cat ['parent_id'] == 0) { // parent
					$sub_cat = $this->Products->Categories->find ( 'list', [ 
							'conditions' => [ 
									'parent_id' => $cat ['id'] 
							] 
					] )->toArray (); // get correct childs
					foreach ( $sub_cat as $key => $val ) {
						$sub_categories [] = $key;
					}
					$conditions = [ 
							'category_id IN ' => $sub_categories 
					];
				} else { // chiled
					$conditions = [ 
							'category_id ' => $cat ['id'] 
					];
				}
				
				$product_list = $this->Products->find ( 'all', [ 
						'conditions' => $conditions,
						'fields' => [ 
								'id',
								'category_id',
								'name',
								'name_si',
								'name_ta',
								'sku',
								'price',
								'package',
								'availability',
								'image',
								'is_new',
								'is_sale' 
						] 
				] )->contain ( [ 
						'packageType' => function ($q) {
							return $q->select ( [ 
									'id',
									'type' 
							] );
						} 
				] );
				
				$return ['status'] = 0;
				if (sizeof ( $product_list ) > 0) {
					$return ['message'] = 'Success';
				} else {
					$return ['message'] = 'products not found';
				}
				$return ['result'] = $product_list;
			} else {
				$return ['status'] = 404;
				$return ['message'] = 'category not found';
				$return ['result'] = [ ];
			}
		} else {
			$return ['status'] = 404;
			$return ['message'] = 'Please supply category id';
			$return ['result'] = [ ];
		}
		$this->set ( 'category', $return ['category'] );
		
		$this->set ( 'products', $this->paginate ( $product_list ) );
		$this->set ( compact ( 'paginateUrl' ) );
		
		// $articles = $this->paginate($product_list);
		$category_list = $this->getCategoryTree ();
		$this->set ( 'category_tree', $category_list);
	}
	
         public function getCategoryTree() {
		
		// Get first level categories
		$categories = TableRegistry::get ( 'Categories' );
		
		$first_level_categories = $categories->find ()->select ( [ 
				'id',
				'title',
				'slug' 
		] )->where ( [ 
				'level' => '0',
                                'status' => '1'
		] )->toArray ();
		
		$second_level_categories = $categories->find ()->select ( [ 
				'id',
				'title',
				'parent_id',
				'slug' 
		] )->where ( [ 
				'level' => '1',
                                'status' => '1' 
		] )->toArray ();
		
		$second_category_array = array ();
		
		foreach ( $second_level_categories as $second_category ) {
			// $second_category_array[$second_category['parent_id']] = array();
			if (! is_array ( $second_category_array [$second_category ['parent_id']] ))
				$second_category_array [$second_category ['parent_id']] = array ();
			$second_category_array [$second_category ['parent_id']] [] = $second_category;
		}
                
                $second_level_categories = $categories->find ()->select ( [ 
				'id',
				'title',
				'parent_id',
				'slug' 
		] )->where ( [ 
				'level' => '2',
                                'status' => '1'
		] )->toArray ();
		
		$third_category_array = array ();
		
		foreach ( $third_level_categories as $third_category ) {
			// $second_category_array[$second_category['parent_id']] = array();
			if (! is_array ( $third_category_array [$third_category ['parent_id']] ))
				$third_category_array [$third_category ['parent_id']] = array ();
			$third_category_array [$third_category ['parent_id']] [] = $third_category;
		}
                
		return [ 
				$first_level_categories,
				$second_category_array,
                                $third_category_array
		];
	}
}
        