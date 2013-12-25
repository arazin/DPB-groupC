<?php
class ParticipantsController extends AppController{
	public $scaffold;
	/*
	 * public $component
	 * Security:悪質なリクエストを防ぐ Paginator:便利な一覧表示
	 */
	public $components = array('Security','Paginator');

	public function beforeFilter() {
    parent::beforeFilter();
		 $this->Auth->allow('preadd'); // ユーザーに自身で登録させる 
	}

	/*
	 * アクター:参加者 自身の情報を参照
   */
	public function index(){
		$id=$this->Auth->user('id');
		$this->set('data',$this->Participant->User->findById($id));
	}

		/*
	 * アクター:参加者 本人の情報を編集
   */
	public function editone(){
		$id=$this->Auth->user('id');

		//最初に更新であることを宣言
		$this->Participant->id=$id;
		$this->Participant->User->id=$id;

		/* ユーザーのデータ取出し */
		$editdata = $this->Participant->User->findById($id);

		//例外処理
		if (!$editdata) {
      throw new NotFoundException(__('Invalid user'));
    }

		/* selectフォームに値をセット */
		//業種
		$findoption = array(
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Participant->User->Industry->find('list',$findoption));

		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする

		//課程
		$findoption = array(
			'fields' => array('id','curriculum_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('curriculums',$this->Participant->Curriculum->find('list',$findoption));

		//コース
		$findoption = array(
			'fields' => array('id','course_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('courses',$this->Participant->Course->find('list',$findoption));

		$flag=false;
		/* データ送信時 */
		if($this->request->is('put')){
			pr('1\n');
			if($this->Participant->User->save($this->request->data,array('validate'=>'only'))){
				if($this->Participant->save($this->request->data,array('validate'=>'only'))){
					pr('2\n');

					/* ログイン情報に変更あり */
					if(!empty($this->request->data['User']['new_username'])){
						$this->request->data['User']['username']=$this->request->data['User']['new_username'];
						$flag=true;
					}
					if(!empty($this->request->data['User']['new_password'])){
						$this->request->data['User']['password']=$this->request->data['User']['new_password'];
						$flag=true;
					}

					/* 保存 */
					if($this->Participant->User->save($this->request->data)){
						pr('3\n');
						if($this->Participant->save($this->request->data)){
							pr('4\n');
							if($flag){
								$this->Session->setFlash(__('ログイン情報が更新されました。認証しなおしてください'));
								$this->redirect('/users/logout');
							} else {
								$this->Session->setFlash(__('情報が更新されました。'));
								$this->redirect('/');
							}
						}
					}
					$this->Session->setFlash(__('更新されませんでした'));
				}
			}
		}else{
			pr('5\n');
			//通常アクセス フォームにdataをセット
			$this->request->data=$editdata;
			pr($editdata);
			unset($this->request->data['User']['password']);			
		}
	}
	
	/*
	 * アクター:誰でも 未認証として登録
	 */
	public function preadd(){
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
						$this->Session->setFlash(__('保存されました。認証されるまでお待ちください。'));
						return $this->redirect('/users/login');
					}
				}
			}
		}
		
	}
	
}

?>
