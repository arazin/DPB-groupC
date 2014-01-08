<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class EventsParticipantsController extends AppController{

	public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');


  //イベント一覧表示
  public function index() {
    
  	$events = $this -> EventsParticipant -> Event -> find('all');
  	$this -> set('events', $events);

	}


	//大学がeventsparticipants追加
	public function add($dataaa = null, $eveid = null) {

    $data = array('EventsParticipant' => array('participant_id' => $dataaa, 'event_id' => $eveid));
 		$fields = array('participant_id', 'event_id');
 
 		if ($this->EventsParticipant->save($data, false, $fields)) {
            $this->Session->setFlash(__('追加しました'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('追加できませんでした'));
  }


  // event_idをクリックするとそのイベントに参加している人の一覧を表示
  public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid'));
    }
  	$participant_ids = $this -> EventsParticipant -> findAllByEvent_id($id);
  	$ids = NULL;
  	foreach ($participant_ids as $participant_id) {
  		$ids[] = $participant_id['EventsParticipant']['participant_id'];
  	}

  	$this->loadmodel('User');
		$participants = NULL;

  	foreach($ids as $idd){
  		$participants[] = $this -> User -> findById($idd);
  	}
  	//$this->set('participants', $participants);
  	$this -> set('participants', Sanitize::clean($participants, array('encode' => false)));
  }


  //大学が参加者情報をもとに検索
  public function search($id = null) {
  	if (!$id) {
      throw new NotFoundException(__('Invalid'));
    }
    $this->set('eveid', $id);
  	$data = NULL;
  	$this->set('data', $data);
  	$this->loadmodel('User');


  	if($this->request->is('post')){
  		$name = $this->request->data['Search']['name'];
  		$nationarity = $this->request->data['Search']['nationarity'];
  		$prefecture = $this->request->data['Search']['prefecture'];
  		$remain = $this->request->data['Search']['remain'];
  		$postcord = $this->request->data['Search']['postcord'];
  		$phonenumber = $this->request->data['Search']['phonenumber'];
  		$job = $this->request->data['Search']['job'];
  		$birthday = $this->request->data['Search']['birthday'];
  		$sex = $this->request->data['Search']['sex'];

  		$opt = array("AND" => array (
  	  	'User.name like' => '%'.$name.'%',
    		'User.nationarity like' => '%'.$nationarity.'%',
 	  		'User.prefecture like' => '%'.$prefecture.'%',
    		'User.remain like' => '%'.$remain.'%',
    		'User.postcord like' => '%'.$postcord.'%',
    		'User.phonenumber like' => '%'.$phonenumber.'%',
    		'User.job like' => '%'.$job.'%',
    		'User.birthday like' => '%'.$birthday.'%',
    		'User.sex like' => '%'.$sex.'%',
  		)); 

  		$data = $this -> User -> find('all', array('conditions' => $opt));
  		$this->set('data', $data);
		}
	}


}
?>

