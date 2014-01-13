<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class EventsController extends AppController {
  
  public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');

  public function index() {
		$events = $this->Event->find('all');
    $this->set('events', $this -> paginate(), Sanitize::clean($events, array('remove_html' => true)));
  }


	//大学用	説明会追加
  public function add() {
		$findoption = array(
			'fields' => array('id','type_name'),
			'recursive' => 0,
		);
		$this->set('types',$this->Event->Type->find('list',$findoption));
    if ($this->request->is('post')) {
      $this->Event->create();
      if ($this->Event->save($this->request->data)) {
        $this->Session->setFlash(__('保存しました'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('保存できませんでした'));
    }
  }
	//イベント削除
	public function delete($id) {
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Event->delete($id)) {
      $this->Session->setFlash(__('The gevent with id: %s has been deleted.', h($id)));
      return $this->redirect(array('action' => 'index'));
    }
  }
	
	public function events() {
		$this->set('events', $this->Event->find('all'));
	}

}
?>
