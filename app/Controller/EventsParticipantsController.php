<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class EventsParticipantsController extends AppController{

	public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');


  public function index() {

  	$eventsparticipants = $this->EventsParticipant->find('all');

  	$user_id = $this->Auth->user('id');
  	//$user_id = 5; //実験用
  	$myparticipants = NULL;


   $myparticipants = $this -> EventsParticipant -> find('all',array(
 'fields'=>array('id', 'participant_id','event_id'),
 'conditions'=>array('participant_id' => $user_id),
 ));

   $this -> set('myparticipants', $myparticipants);
}



	public function form() {
    $this->set('eventsparticipants', $this->EventsParticipant->find('all'));
  }


  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid'));
    }
    $eventsparticipant = $this->EventsParticipant->findById($id);
    if (!$eventsparticipant) {
      throw new NotFoundException(__('Invalid'));
    }
    $this->set('eventsparticipant', $eventsparticipant);
  }


    public function add() {

    $findoption = array(
			'fields' => array('user_id'),
			'recursive' => 0,
		);
		$this->set('participant_ids',$this->EventsParticipant->Participant->find('list',$findoption));

		$findoption = array(
			'fields' => array('id'),
			'recursive' => 0,
		);
		$this->set('event_ids',$this->EventsParticipant->Event->find('list',$findoption));



        if ($this->request->is('post')) {
            $this->EventsParticipant->create();
            if ($this->EventsParticipant->save($this->request->data)) {
                $this->Session->setFlash(__('保存しました'));
                return $this->redirect(array('action' => 'form'));
            }
            $this->Session->setFlash(__('保存できませんでした'));
        }
   }


   public function edit($id = null) {

   	    $findoption = array(
			'fields' => array('user_id'),
			'recursive' => 0,
		);
		$this->set('participant_ids',$this->EventsParticipant->Participant->find('list',$findoption));

		$findoption = array(
			'fields' => array('id'),
			'recursive' => 0,
		);
		$this->set('event_ids',$this->EventsParticipant->Event->find('list',$findoption));

   	
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $eventsparticipant = $this->EventsParticipant->findById($id);
    if (!$eventsparticipant) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
    /*if ($this->request->is(array('post', 'put'))) {*/
        $this->EventsParticipant->id = $id;
        if ($this->EventsParticipant->save($this->request->data)) {
            $this->Session->setFlash(__('保存しました'));
            return $this->redirect(array('action' => 'form'));
        }
        $this->Session->setFlash(__('保存できませんでした'));
    }

    if (!$this->request->data) {
        $this->request->data = $eventsparticipant;
    }
  }


  public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->EventsParticipant->delete($id)) {
        $this->Session->setFlash(__('The gevent with id: %s has been deleted.', h($id)));
        return $this->redirect(array('action' => 'form'));
    }
  }

}
?>

