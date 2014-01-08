<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
 
class GeventsController extends AppController {
  
  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');


  public $uses = array('Gevent', 'Graduate');


	//修了生用	イベント一覧ページ
  public function index() {

    $gevents = $this->Gevent->find('all');
    $graduates = $this->Graduate->find('all');
    $newgevents = NULL;
    $oldgevents = NULL;

		//ログインしている人のID
		$user_id = $this->Auth->user('id');
    //$user_id = 4; //実験用
	
	$login_graduate = $this -> Graduate-> findByUser_id($user_id);


if($login_graduate != NULL){

	//geventsを見た修了生のlasteventviewを更新
	$data = array('Graduate' => array('user_id' => $user_id, 'lasteventview' => date('Y-m-d H:i:s'), 'modified' => false));
	$fields = array('lasteventview');
	$this -> Graduate -> save($data, false, $fields);

	//新着記事と既読記事を$newgeventsと$oldGeventsへ
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
		
    	$this -> set('newgevents', Sanitize::clean($newgevents, array('remove_html' => true)));		
   		$this -> set('oldgevents', Sanitize::clean($oldgevents,array('remove_html' => true)));
		/**********新着と既読イベントわけるとpaginateがうまくいかない**********/
  }

	//大学用	修了生用イベント一覧表示
  public function form() {
		$gevents = $this->Gevent->find('all');
    $this->set('gevents', $this -> paginate(), Sanitize::clean($gevents, array('remove_html' => true)));
		
  }

	//修了生向けイベント詳細表示
  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid'));
    }
    $gevent = $this->Gevent->findById($id);
    if (!$gevent) {
      throw new NotFoundException(__('Invalid'));
    }
		 	//$this -> set('gevent', Sanitize::clean($gevent, array('encode' => false)));
			$this -> set('gevent', Sanitize::clean($gevent, array('remove_html' => true)));
			//Sanitize::clean($this->data, array('remove_html' => true));
  }

	//大学用	修了生向けイベント追加
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

	//大学用	修了生向けイベント編集
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

	//大学用	修了生向けイベント削除
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
