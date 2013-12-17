<?php
class GraduatesController extends AppController{
	public $scaffold;
	public function beforeFilter() {
    parent::beforeFilter();
		$this->Auth->allow('preadd'); // ユーザーに自身で登録させる 
	}

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
						$this->Session->setFlash(__('保存されました。認証されるまでお待ちください。'));
						return $this->redirect('/users/login');
					}
				}
			}
		}
	}
}
?>
