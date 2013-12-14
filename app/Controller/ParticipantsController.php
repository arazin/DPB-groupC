<?php
class ParticipantsController extends AppController{
	public $scaffold;
	/*
	 * public $component
	 * Security:悪質なリクエストを防ぐ Paginator:便利な一覧表示
	 */
	public $components = array('Security','Paginator');
	
	//paginatorのoption
	public $paginate=array(
		'contain' => array(''),
		'condition' => array('Group.group_name'=>'unapprove'),
		'limit' => 25,
		'order' => array('User.created'=>'asc'),
		'recursive' => '2',
	);
	
	/*
	 * アクター:大学 未認証の参加者一覧
	 */
	public function uapplist(){
		$this->Paginator->settings = $this->paginate;
		$this->set('data',$this->Paginator->paginate());
	}

	
	/*
	 * アクター:大学 未認証の参加者を認証
	 */
	public function approve($id=NULL){
		$this->request->onlyAllow('post');
		
    $this->Participant->User->id = $id;
    if (!$this->Participant->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
		/*
		 * 参加者のグループidをセット
		 */
		$findoption = array(
			'conditions' => array('Group.name'=>'participants'),
			'fields' => array('id'),
			'recursive' => 0,
		);
		$tmp=$this->Participant->User->Group->find('first',$findoption);
		$this->request->data['User']['group_id']=$tmp['Group']['id'];
		if($this->Participant->User->save($this->request->data)){
			$this->Session->setFlash(__('参加者が認証されました'));
			$this->redirect(array('action'=>'uapplist'));
		}
	}
	
	/*
	 * アクター:誰でも 未認証として登録
	 */
	public function add(){
		//業種
		$findoption = array(
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Participant->User->Industry->find('list',$findoption));
		
		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする
		
		$findoption = array(
			'fields' => array('id','curriculum_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('curriculums',$this->Participant->Curriculum->find('list',$findoption));
		
		$findoption = array(
			'fields' => array('id','course_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('courses',$this->Participant->Course->find('list',$findoption));

		/*
		 * 登録ロジック
		 */
		if($this->request->is('post')){
			/*
			 * 参加者(未認証)のグループidをセット
			 */
			$findoption = array(
				'conditions' => array('Group.name'=>'unapprove'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Participant->User->Group->find('first',$findoption);
			$this->request->data['User']['group_id']=$tmp['Group']['id'];

			/*
			 * 登録
			 */
			$this->Participant->User->create();
			//まず値の正当性チェックのみ
			if($this->Participant->User->saveAll($this->request->data,array('validate'=>'only'))){
				//userテーブルの登録
				if($this->Participant->User->save($this->request->data)){
					//登録したユーザーのIDで、参加者情報を保存
					$this->request->data['Participant']['user_id']=$this->Participant->User->id;
					$this->Participant->create();				
					if($this->Participant->save($this->request->data)){
						$this->Session->setFlash(__('保存されました'));
						return $this->redirect(array('action'=>'index'));
					}
				}
			}
		}
		
	}
	
}

?>
