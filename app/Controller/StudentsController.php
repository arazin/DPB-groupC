<?php
App::uses('Sanitize', 'Utility');

class StudentsController extends AppController{
	/**
	 * Components
	 *
	 * @var array
	 */
  //public $components = array('Security');//悪質なポストを防ぐ
	public $scaffold;

	
	/*
	 * アクター:学生 学生本人の情報を参照
	 */
	public function index(){
		$id=$this->Auth->user('id');
		$findoption1 = array(
			'conditions' => array('User.id' => $id),
			'contain' => array('Industry'),
		);
		$findoption2 = array(
			'conditions' => array('Student.user_id' => $id),
			'contain' => array('Faculty','Department','Labo',),
		);
		
		$this->set('userdata',$this->Student->User->find('first',$findoption1));
		$this->set('studentdata',$this->Student->find('first',$findoption2));

	}

	/*
   * アクター:学生 学生本人の情報を編集
	 */
	public function editone(){
		$id=$this->Auth->user('id');

		//最初に更新であることを宣言
		$this->Student->id=$id;
		$this->Student->User->id=$id;

		/* ユーザーのデータ取出し */
		$editdata= $this->Student->User->findById($id);

		//例外処理
		if (!$editdata) {
      throw new NotFoundException(__('Invalid user'));
    }

		/* selectフォームに値をセット */
		$findoption = array(
			'conditions'=> array('industry_name' => '学生'),
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Student->User->Industry->find('list',$findoption));
		
		//学部
		$findoption = array(
			'fields' => array('id','faculty_name'),
			'recursive' => 0,
		);
		$this->set('faculties',$this->Student->Faculty->find('list',$findoption));
		
		//学科
		$findoption = array(
			'fields' => array('id','department_name'),
			'recursive' => 0,
		);
		$this->set('departments',$this->Student->Department->find('list',$findoption));

		
		//研究室
		$findoption = array(
			'fields' => array('id','labo_name'),
			'recursive' => 0,
		);
		$this->set('labos',$this->Student->Labo->find('list',$findoption));
		
		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする
		//学年
		$this->set('grades',array(1,2,3,4,5));//viewでselectフォームにする

		//更新ロジック
		$flag=false;
		if($this->request->is('put')){
			$this->Student->recaptcha = true;
			pr('0\n');
			//データ送信時
			//値の正当性のみチェック
			if($this->Student->User->save($this->request->data,array('validate'=>'only'))){
				pr('1\n');
				if($this->Student->save($this->request->data,array('validate'=>'only'))){
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
					
  				//保存
					if($this->Student->User->save($this->request->data)){
						pr('3\n');
						if($this->Student->save($this->request->data)){
							pr('4\n');
							if($flag){
								$this->Session->setFlash(__('ログイン情報が更新されました。認証しなおしてください'),
																				 'alert',
																				 array(
										'plugin' => 'BoostCake',
										'class' => 'alert-info',
									)
																				 );
								$this->redirect('/users/logout');
							} else {
								$this->Session->setFlash(__('情報が更新されました。'),
																				 'alert',
																				 array(
										'plugin' => 'BoostCake',
										'class' => 'alert-success',
									)
																				 );
								$this->redirect('/');
							}
						}
					}
					$this->Session->setFlash(__('更新できませんでした'),
																	 'alert',
																	 array(
							'plugin' => 'BoostCake',
							'class' => 'alert-danger',
						)
																	 );
				}
			}
			pr($this->Student->invalidFields());
			pr($this->Student->User->invalidFields());
		}else{ //通常アクセス 
					pr('5\n');
					//フォームにdataをセット
					$this->request->data=$editdata;
					unset($this->request->data['User']['password']);			
					}
	}
	/*
	 * アクター:学生 ユースケース:修了生を登録する
	 * 
	 */
	public function compadd(){
		//ここは仮 ACLが動くまでの辛抱
		if($this->request->is('post')){
			if($this->Auth->user('Group.name')!='students'){
				return $this->redirect(array('action'=>''));
			}
			//修了情報の登録
			$userId=$this->Auth->user('id');
			$this->request->data['Graduate']['user_id']=$userId;
			$this->Student->User->Graduate->save($this->request->data);

			//グループをgraduatesに。ゆくゆくはcompstudentsに
			$findoption = array(
				'conditions' => array('Group.name'=>'graduates'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Student->User->Group->find('first',$findoption);
			$this->Student->User->id=$userId;
			$sdata=$this->Student->User->findById($userId,array('recursive'=>0));
			$sdata['User']['id']=$userId;
			$sdata['User']['group_id']=$tmp['Group']['id'];
			unset($sdata['User']['password']);
			$this->Student->User->save($sdata);
			return $this->redirect(array('controller'=>'users','action'=>'logout'));
		}
	}


	
	/*
	 * アクター:大学 ユースケース: 学生を登録する
	 * findで検索し、viewでselectの選択肢とする
	 */
	public function add(){
		//業種
		$findoption = array(
			'conditions'=> array('industry_name' => '学生'),
			'fields' => array('id','industry_name'),//取り出す属性
			'recursive' => 0,//関連テーブルからは検索しない
		);
		$this->set('industries',$this->Student->User->Industry->find('list',$findoption));

		//学部
		$findoption = array(
			'fields' => array('id','faculty_name'),
			'recursive' => 0,
		);
		$this->set('faculties',$this->Student->Faculty->find('list',$findoption));

		//学科
		$findoption = array(
			'fields' => array('id','department_name'),
			'recursive' => 0,
		);
		$this->set('departments',$this->Student->Department->find('list',$findoption));

		//学科(動的select用)
		$findoption = array(
			'fields' => array('id','Department.department_name','Faculty.id'),
			'recursive' => 2,
		);
		$this->set('depSets',$this->Student->Department->find('list',$findoption));

		//研究室
		$findoption = array(
			'fields' => array('id','labo_name'),
			'recursive' => 0,
		);
		$this->set('labos',$this->Student->Labo->find('list',$findoption));

		//研究室(動的select用)
		$findoption = array(
			'fields' => array('id','Labo.labo_name','Department.id'),
			'recursive' => 2,
		);
		$this->set('labSets',$this->Student->Labo->find('list',$findoption));

		//性別
		$this->set('sexes',array(0=>'男',1=>'女'));//viewでselectフォームにする
		//学年
		$this->set('grades',array(1,2,3,4,5));//viewでselectフォームにする

		
		if($this->request->is('post')){
			/*
			 *学生のグループidをセット
			 */
			$findoption = array(
				'conditions' => array('Group.name'=>'students'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Student->User->Group->find('first',$findoption);
			$this->request->data['User']['group_id']=$tmp['Group']['id'];
			
			/*
			 *登録ロジック
			 */
			$this->Student->User->create();
			//まず値の正当性チェックのみ
			if($this->Student->User->saveAll($this->request->data,array('validate'=>'only'))){
				//userテーブルの登録
				if($this->Student->User->save($this->request->data)){
					//登録したユーザーのIDで、学生情報を保存
					$this->request->data['Student']['user_id']=$this->Student->User->id;
					$this->Student->create();				
					if($this->Student->save($this->request->data)){
						$this->Session->setFlash(__('保存されました'),
																		 'alert',
																		 array(
								'plugin' => 'BoostCake',
								'class' => 'alert-success',
							));
						return $this->redirect('/Students/add');
					}
				}
			}
			$this->Session->setFlash(__('記述に間違いがあります'),
															 'alert',
															 array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger',
				));
		}
	}
}

?>
