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


		//すでに追加済みの人は登録できないようにする
		$eventsparticipants = $this -> EventsParticipant -> find('all');
		$this->loadmodel('User');
 
		foreach($eventsparticipants as $eventsparticipant){
				if($eventsparticipant['EventsParticipant']['event_id'] == $eveid && $eventsparticipant['EventsParticipant']['participant_id'] == $dataaa){
					$this->Session->setFlash(__('この人は追加済みです'));
					return $this->redirect(array('action' => 'index'));
				}
		}


 		if ($this->EventsParticipant->save($data, false, $fields)) {
					
            $this->Session->setFlash(__('追加しました'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('追加できませんでした'));
  }


  // event_idをクリックするとそのイベントに参加している人の一覧を表示（大学が過去の参加履歴を参照）
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
  	$this -> set('participants', Sanitize::clean($participants, array('remove_html' => true)));
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
		//検索に当てはまった人の情報
  	$data = $this -> User -> find('all', array('conditions' => $opt));

//array_splice
		
/*
 //うまくいかない
		$eventsparticipant = $this -> EventsParticipant -> find('all');

		foreach($eventsparticipant as $ep){
			foreach($data as $dataa){
				if($ep['EventsParticipant']['event_id'] == $id && $ep['EventsParticipant']['participant_id'] == $dataa['User']['id']){
					$data2[] = $dataa;
				}
			}
		}
		$data = array_diff($data, $data2);*/
  	$this->set('data', $data);
		}
	}

	//参加者が過去の参加履歴を参照する
	public function reference(){
		
		$this->loadmodel('Participant');
		$user_id = $this->Auth->user('id');
		//$user_id = 5; //実験用
		$login_user = $this -> Participant -> findByUser_id($user_id);

		$event_ids = $this -> EventsParticipant -> findAllByParticipant_id($user_id);
		
		
		$ids = NULL;
  	foreach ($event_ids as $event_id) {
  		$ids[] = $event_id['EventsParticipant']['event_id'];
  	}

  	$this->loadmodel('Event');
		$events = NULL;

  	foreach($ids as $idd){
  		$events[] = $this -> Event -> findById($idd);
  	}

  	$this -> set('events', Sanitize::clean($events, array('remove_html' => true)));
		
			
	}

}
?>

