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
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Utility\Security;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{

	 public function initialize(){
		parent::initialize();
        $this->set('model',$this->modelClass);
    }
	
	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		//$this->Auth->allow(['login','add', 'logout','index']);
	}
	
	/**
     * Function to logout a user
     *
     * @param null
     * 
     * @return void
     */
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}
	
    /**
     * Displays a list of users
     *
     * @param null
     * 
     * @return void
     */
    public function index(){
		$result = $this->{$this->modelClass}->find('all',array('conditions' => array('id !=' => '1')));
		$this->set('users',$result);
	}
	
	/**
     * Add a new user
     *
     * @param null
     * 
     * @return void
     */	
	public function add(){
		$user = $this->Users->newEntity($this->request->data);
        if ($this->request->is('post')) {
			if ($user->errors()) {
				$this->Flash->error(__('Unable to add new user.'));
				$errors[$this->modelClass]		=		$user->errors();
				pr($errors); 
			}else{
				$this->request->data[$this->modelClass]['password']	= 	Security::hash($this->request->data[$this->modelClass]['password'], 'sha1', true);
				pr($this->request->data); die;
				$user = $this->Users->patchEntity($user, $this->request->data);
				if ($this->Users->save($user)) {
					$this->Flash->success(__('User successfully added.'));
					return $this->redirect(['action' => 'index']);
				}else{
					$this->Flash->error(__('Unable to add user.'));
				}
			}
		}
        $this->set('user', $user);    
	}// end add()
	
	/**
     * Edit a particular user
     *
     * @param $id as User Id
     * 
     * @return void
     */	
	public function edit($id = null){
		$user = $this->Users->get($id);
		if ($this->request->is('post')) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) { 
				$this->Flash->success(__('User has been updated.'));
				return $this->redirect(['action' => 'index']);
			}else{ 
				$errors[$this->modelClass]	=	$user->errors();
				pr($errors);
				$this->Flash->error(__('Unable to update user.'));
			}
		}
		$this->set('user', $user);
		$this->request->data[$this->modelClass]		=	$user;
	}// end edit()
	
	/**
     * View a particular user
     *
     * @param $id as User Id
     * 
     * @return void
     */	
	 public function view($id = null){
        $user = $this->{$this->modelClass}->get($id);
        $this->set(compact('user'));
    }// end view()
	
	/**
     * Delete a particular user
     *
     * @param $id as User Id
     * 
     * @return void
     */	
	public function delete($id){
		//$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}// end delete()
}
