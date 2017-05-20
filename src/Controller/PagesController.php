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
use Cake\View\Helper\SessionHelper;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
	
	public function beforeFilter(\Cake\Event\Event $event) {
		// allow all action
		parent::beforeFilter ( $event );
		$this->Auth->allow ();
	}

    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        
        $session = $this->request->session();
        $this->loadModel('Products');
        
        if(!($session->read('d2d_session_id'))){
            $session->write('d2d_session_id', md5(time()));
        }
        
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        
        //Get the latest products
        $latest_products = $this->Products->find('all', [
                    'conditions' => [
                        'status' => '1'
                    ]
                ])->order(['created' =>'DESC'])->limit(10);
        
        $this->set(compact('page', 'subpage'));
        $this->set('category_tree',$this->getCategoryTree());
        $this->set('latest_products',$latest_products);
        
        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    
    public function getCategoryTree() {
		
		// Get first level categories
		$categories = TableRegistry::get ( 'Categories' );
		
		$first_level_categories = $categories->find ()->select ( [ 
				'id',
				'title',
				'slug',
                                'image'
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
