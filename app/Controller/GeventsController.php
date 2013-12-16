<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
 
class GeventsController extends AppController {
  
  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');


  public $uses = array('Gevent', 'Graduate');


  public function index() {

    $gevents = $this->Gevent->find('all');
    $graduates = $this->Graduate->find('all');
    $newgevents = NULL;
    $oldgevents = NULL;


		$user_id = $this->Auth->user('id');
    //$user_id = 4; //実験用
	
	$login_graduate = $this -> Graduate-> findByUser_id($user_id);


if($login_graduate != NULL){

  $newgevents = $this -> Gevent -> find('all',array(
 'fields'=>array('id', 'title','gevent_date','place', 'detail', 'created', 'modified'),
 'conditions'=>array('created >' => $login_graduate['Graduate']['lasteventview']),
 ));

  $oldgevents = $this -> Gevent -> find('all',array(
  'fields'=>array('id','title','gevent_date','place', 'detail', 'created', 'modified'),
  'conditions'=>array('created <=' => $login_graduate['Graduate']['lasteventview']),
 ));

	}


  /*  $this -> set('gevents', $this->Gevent->find('all'));*/
    $this -> set('newgevents', $newgevents);
    $this -> set('oldgevents', $oldgevents);
		
  }


  public function form() {
    $this->set('gevents', $this->Gevent->find('all'));
  }

 
  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid'));
    }
    $gevent = $this->Gevent->findById($id);
    if (!$gevent) {
      throw new NotFoundException(__('Invalid'));
    }
    $this->set('gevent', $gevent);
  }


  public function add() {
        if ($this->request->is('post')) {
            $this->Gevent->create();
            if ($this->Gevent->save($this->request->data)) {
                $this->Session->setFlash(__('保存しました'));
                return $this->redirect(array('action' => 'form'));
            }
            $this->Session->setFlash(__('保存できませんでした'));
        }
   }


   public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $gevent = $this->Gevent->findById($id);
    if (!$gevent) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
    /*if ($this->request->is(array('post', 'put'))) {*/
        $this->Gevent->id = $id;
        if ($this->Gevent->save($this->request->data)) {
            $this->Session->setFlash(__('保存しました'));
            return $this->redirect(array('action' => 'form'));
        }
        $this->Session->setFlash(__('保存できませんでした'));
    }

    if (!$this->request->data) {
        $this->request->data = $gevent;
    }
  }


  public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Gevent->delete($id)) {
        $this->Session->setFlash(__('The gevent with id: %s has been deleted.', h($id)));
        return $this->redirect(array('action' => 'form'));
    }
  }


}
