<?php
class StudentsController extends AppController{
	public $scaffold;
	public $helpers =array('Form','Html','Js','Time');

	public function editone(){
		$this->request->data = $this->Student->User->findById($this->Auth->user('id'),array('recursive'=>0));
			
														
	}

	public function compadd(){
		/*
		 * アクター:学生 ユースケース:修了生を登録する
		 * 
		 */
		//ここは仮 ACLが動くまでの辛抱
		if($this->request->is('post')){
			if($this->Auth->user('Group.name')!='students'){
				return $this->redirect(array('action'=>'add'));
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
	
	public function add(){
		/*
		 * アクター:大学 ユースケース: 学生を登録する
		 * findで検索し、viewでselectの選択肢とする
		 */
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

		
		if($this->request->is('post')){
			$findoption = array(
				'conditions' => array('Group.name'=>'students'),
				'fields' => array('id'),
				'recursive' => 0,
			);
			$tmp=$this->Student->User->Group->find('first',$findoption);
			$this->request->data['User']['group_id']=$tmp['Group']['id'];
			$this->Student->User->create();
			if($this->Student->User->saveAll($this->request->data,array('validate'=>'only'))){
				if($this->Student->User->save($this->request->data)){
					$this->request->data['Student']['user_id']=$this->Student->User->id;
					$this->Student->create();				
					if($this->Student->save($this->request->data)){
						$this->Session->setFlash(__('保存されました'));
						return $this->redirect(array('action'=>'index'));
					}
				}
			}
			$this->Session->setFlash(__('記述に間違いがあります'));
		}
	}
}

?>
