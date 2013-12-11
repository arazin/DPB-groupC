<?php
class UsersController extends AppController {
	public $scaffold;

	public function beforeFilter() {
    parent::beforeFilter();
		/* $this->Auth->allow('add'); // ユーザーに自身で登録させる */
	}
	
//	public function index(){
//		$this->set('users',$this->User->find('all'));
//	}
	
	public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
	}

	public function logout() {
    $this->redirect($this->Auth->logout());
	}

	public function top() {

	}

}

?>
