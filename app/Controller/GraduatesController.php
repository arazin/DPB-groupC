<?php
class GraduatesController extends AppController{
	public $components = array(
		'Recaptcha.Recaptcha' => array('actions' => array('preadd'))
	);

	
	public function beforeFilter() {
    parent::beforeFilter();
		$this->Auth->allow('preadd'); // ユーザーに自身で登録させる 
	}


	/*
	 * アクター:修了生 本人の情報を参照
	 */
	public function index(){
		$id=$this->Auth->user('id');
		$this->set('data',$this->Graduate->User->findById($id));
		$findoption = array(
			'conditions' => array('Career.graduate_id' => $id),
			'contain' => array('Industry'),
			'order' => array('Career.modified' => 'desc'),
		);
		$this->set('data2',$this->Graduate->Career->find('first',$findoption));
	}
	
	/*
	 * アクター:修了生 本人の情報を編集
   */
	public function editone(){
		$id=$this->Auth->user('id');

		//最初に更新であることを宣言
		$this->Graduate->id=$id;
		$this->Graduate->User->id=$id;

		/* ユーザーのデータ取出し */
		$editdata = $this->Graduate->User->findById($id);

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
		$this->set('industries',$this->Graduate->User->Industry->find('list',$findoption));

		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする
		
		$flag=false;
		/* データ送信時 */
		if($this->request->is('put')){
			if($this->Graduate->User->save($this->request->data,array('validate'=>'only'))){
				if($this->Graduate->save($this->request->data,array('validate'=>'only'))){
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
					if($this->Graduate->User->save($this->request->data)){
						if($this->Graduate->save($this->request->data)){
							if($flag){
								$this->Session->setFlash(__('ログイン情報が更新されました。認証しなおしてください'),
																				 'alert',
																				 array(
										'plugin' => 'BoostCake',
										'class' => 'alert-info',
									));
								$this->redirect('/users/logout');
							} else {
								$this->Session->setFlash(__('情報が更新されました。'),
																				 'alert',
																				 array(
										'plugin' => 'BoostCake',
										'class' => 'alert-success',
									));
								$this->redirect('/');
							}
						}
					}
					$this->Session->setFlash(__('更新されませんでした'),
																	 'alert',
																	 array(
							'plugin' => 'BoostCake',
							'class' => 'alert-danger',
						));
				}
			}
		}else{
			//通常アクセス フォームにdataをセット
			$this->request->data=$editdata;
			pr($editdata);
			unset($this->request->data['User']['password']);			
		}
	}
	

	/*
	 * アクター:誰でも 修了生の情報を登録 未認証
	 */
	public function preadd(){
		//業種
		$findoption = array(
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Graduate->User->Industry->find('list',$findoption));
		
		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする

		//学部
		$findoption = array(
			'fields' => array('Faculty.id'),
			'contain' => array('Department'),
			'recursive' => 2,
		);
		$this->set('faculties',$this->Graduate->User->Student->Faculty->find('all',$findoption));
		/*
		 * 登録ロジック
		 */
		if($this->request->is('post')){
			/*
			 * 修了生(未認証)のグループidをセット
			 */
			$findoption = array(
				'conditions' => array('Group.name'=>'pregraduates'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Graduate->User->Group->find('first',$findoption);
			$this->request->data['User']['group_id']=$tmp['Group']['id'];

			/*
			 * 登録
			 */
			$this->Graduate->User->create();
			//まず値の正当性チェックのみ
			if($this->Graduate->User->saveAll($this->request->data,array('validate'=>'only'))){
				//userテーブルの登録
				if($this->Graduate->User->save($this->request->data)){
					//登録したユーザーのIDで、情報を保存
					$this->request->data['Graduate']['user_id']=$this->Graduate->User->id;
					$this->Graduate->create();				
					if($this->Graduate->save($this->request->data)){
						$this->Session->setFlash(__('保存されました。認証されるまでお待ちください。'),
																		 'alert',
																		 array(
								'plugin' => 'BoostCake',
								'class' => 'alert-succsess',
							));
						return $this->redirect('/users/login');
					}
				}
			}
		}
	}
	
	/*
	 * アクター:大学 修了生の情報を登録 
	 */
	public function add(){
		//業種
		$findoption = array(
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Graduate->User->Industry->find('list',$findoption));
		
		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする

		//学部
		$findoption = array(
			'fields' => array('Faculty.id'),
			'contain' => array('Department'),
			'recursive' => 2,
		);
		$this->set('faculties',$this->Graduate->User->Student->Faculty->find('all',$findoption));
		/*
		 * 登録ロジック
		 */
		if($this->request->is('post')){
			/*
			 * 修了生(未認証)のグループidをセット
			 */
			$findoption = array(
				'conditions' => array('Group.name'=>'graduates'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Graduate->User->Group->find('first',$findoption);
			$this->request->data['User']['group_id']=$tmp['Group']['id'];

			/*
			 * 登録
			 */
			$this->Graduate->User->create();
			//まず値の正当性チェックのみ
			if($this->Graduate->User->saveAll($this->request->data,array('validate'=>'only'))){
				//userテーブルの登録
				if($this->Graduate->User->save($this->request->data)){
					//登録したユーザーのIDで、情報を保存
					$this->request->data['Graduate']['user_id']=$this->Graduate->User->id;
					$this->Graduate->create();				
					if($this->Graduate->save($this->request->data)){
						$this->Session->setFlash(__('登録されました。'),
																		 'alert',
																		 array(
								'plugin' => 'BoostCake',
								'class' => 'alert-succsess',
							));
						return $this->redirect('/graduates/add');
					}
				}
			}
		}
	}

}
?>
