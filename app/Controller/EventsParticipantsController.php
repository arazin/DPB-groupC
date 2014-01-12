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
		if($ids != null){
  	foreach($ids as $idd){
  		$participants[] = $this -> User -> findById($idd);
  	}}
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
		$this->loadmodel('Participant');
		$pdata = NULL;
		$participant_ids = NULL;
		$participants = NULL;
		$eps = NULL;

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

		$participants = $this -> Participant -> find('all');
		foreach($participants as $participant){
			$participant_ids[] = $participant['Participant']['user_id'];
		}
		foreach($data as $data2){
			foreach($participant_ids as $participant_id){
				if($data2['User']['id'] == $participant_id){
					$pdata[] = $data2;
				}
			}
		}

		//選択されたイベントに参加している人を探す
		$eps = $this -> EventsParticipant -> find('all', array('conditions' => array('event_id' => $id)));
		$eps_ids = NULL;
		foreach ($eps as $ep) {
  		$eps_ids[] = $ep['EventsParticipant']['participant_id'];
  	}
		
		$this -> set('eps_ids', $eps_ids);
	
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
  	$this->set('data', $pdata);

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
		if($ids != null){
  		foreach($ids as $idd){
  			$events[] = $this -> Event -> findById($idd);
  		}
		}
  	$this -> set('events', Sanitize::clean($events, array('remove_html' => true)));
		
			
	}

	
		//大学用	説明会追加
  public function eventadd() {
		$this -> loadmodel('Event');
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


		//説明会削除
	public function delete($id) {
		$this -> loadmodel('Event');
    if ($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Event->delete($id)) {
      $this->Session->setFlash(__('The gevent with id: %s has been deleted.', h($id)));
      return $this->redirect(array('action' => 'index'));
    }
  }



}
?>

