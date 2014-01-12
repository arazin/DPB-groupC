<?php
class UsersController extends AppController {
	public $scaffold;

	public function beforeFilter() {
    parent::beforeFilter();
		 $this->Auth->allow('login','logout'); 
	}
	public function isAuthorized($user) {
    if ($this->action === 'login'||$this->action ==='logout') {
      return true;
    }
	}

	
	//public $components = array('Security','Paginator','Search.Prg');
	//Component:paginatorのoption
	public $paginate;
	//Searchの変数
	public $presetVars = array(
		'name' => array('type'=>'like'),
		'group_id' => array('type'=>'checkbox','empty'=>true),
	);


	/*
	 * アクター:大学 ユーザー検索
	 */
	public function index(){
		/* チェックbox用 */
		/* 検索するgroup名 */
		$searchlist = array('generals','students','graduates');

		/* チェックboxで対応する名前 */
		$wordlist = array(
			'generals' => '一般参加者',
			'students' => '学生',
			'graduates' => '修了生');

		/* Groupテーブルを検索 */
		$findoption=array(
			'conditions' => array('Group.name' => $searchlist),
			'recursive' => 0,
		);
		$groups = $this->User->Group->find('list',$findoption);

		/* 検索結果を、対応する名前で置換 */
		foreach($searchlist as $datas){
			$key=array_search($datas,$groups);
			$groups[$key]=$wordlist[$datas];
		}
		$this->set('groups',$groups);

		/* Searchプラグインのリダイレクト？？ */
		$this->Prg->commonProcess();
		//pr($this->passedArgs);
		pr($this->User->parseCriteria($this->passedArgs));

		/* 検索条件 */
		$this->paginate = array(
			//'conditions' => $this->passedArgs,
			'conditions' => $this->User->parseCriteria($this->passedArgs),
			'recursive' => 0,
		);

		/* 検索条件が指定されない場合 */
		if(empty($this->paginate['conditions'])){
			$i=0;
			$keys=array();
			foreach($wordlist as $datas){
				$keys[$i]=array_search($datas,$groups);
				$i++;
			}
			$this->paginate['conditions']=array(
				'User.group_id' => $keys,
				);
		}
		$this->Paginator->settings = $this->paginate;
		$this->set('users',$this->Paginator->paginate());

		/* 検索の内容をフォームに残す */
		$data=array('User'=>$this->passedArgs);
		$this->request->data=$data;
	}

	/*
	 * アクター:大学 個人情報を表示
   */
	public function view($id = null){
		if(!$id){
			throw new NotFoundException(__('無効なリクエスト'));
		}
		$oneuser = $this->User->findById($id);
		if(!$oneuser){
			throw new NotFoundException(__('無効なリクエスト'));
		}
		$this->set('oneuser',$oneuser);
	}
	
	public function login() {
		if($this->Session->read('Auth.User')){
			$this->Session->setFlash('Why!?');
			$this->redirect('/',null,false);
		}
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('ID または パスワード が 間違っています'));

      }
    }
	}

	public function delete($id = null){
		$this->request->onlyAllow('post');
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException(__('無効なリクエスト'));
		}
		if($this->User->delete()){
			$this->Session->setFlash(__('ユーザーが削除されました'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('ユーザーを削除できませんでした'));
    $this->redirect(array('action' => 'index'));
	}

	public function logout() {
    $this->redirect($this->Auth->logout());
	}

	public function top() {
		$this->set('acllist',$this->User->Group->find('list',array('recursive'=> -1)));
		$this->set('groupId',$this->Auth->user('group_id'));
	}

	
	/*
	 * アクター:大学 未認証の参加者一覧
	 */
	public function uapplist(){
		//unapproveグループの検索
		$findoption = array(
			'conditions' => array('Group.name'=>'unapprove'),
			'fields' => array('id'),
			'recursive' => '-1',
		);
		$tmp=$this->User->Group->find('first',$findoption);
		//paginatorの検索オプション
		$this->paginate=array(
		'conditions' => array('User.group_id'=>$tmp['Group']['id']),
		'limit' => 25,
		'order' => array('User.created'=>'asc'),
		'recursive' => '-1',
		);
		$this->Paginator->settings = $this->paginate;
		$this->set('data',$this->Paginator->paginate());
	}

	
	/*
	 * アクター:大学 未認証の参加者を認証
	 */
	public function approve($id=NULL){
		$this->request->onlyAllow('post');
		
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
		/* 参加者のグループidをセット */
		$findoption = array(
			'conditions' => array('Group.name'=>'generals'),
			'fields' => array('id'),
			'recursive' => '-1',
		);
		$tmp=$this->User->Group->find('first',$findoption);
		pr($tmp);
		$this->request->data['User']['group_id']=$tmp['Group']['id'];
		if($this->User->save($this->request->data)){
			$this->Session->setFlash(__('参加者が認証されました'));
			$this->redirect(array('action'=>'uapplist'));
		}
	}

	/*
	 * アクター:大学 未認証の修了生一覧
	 */
	public function gapplist(){
		//unapproveグループの検索
		$findoption = array(
			'conditions' => array('Group.name'=>'pregraduates'),
			'fields' => array('id'),
			'recursive' => '-1',
		);
		$tmp=$this->User->Group->find('first',$findoption);
		//paginatorの検索オプション
		$this->paginate=array(
		'conditions' => array('User.group_id'=>$tmp['Group']['id']),
		'limit' => 25,
		'order' => array('User.created'=>'asc'),
		'recursive' => '-1',
		);
		$this->Paginator->settings = $this->paginate;
		$this->set('data',$this->Paginator->paginate());
	}

	/*
	 * アクター:大学 未認証の参加者を認証
	 */
	public function gapprove($id=NULL){
		$this->request->onlyAllow('post');
		
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
		
		/*
		 * 修了生のグループidをセット
		 */
		$findoption = array(
			'conditions' => array('Group.name'=>'graduates'),
			'fields' => array('id'),
			'recursive' => '-1',
		);
		$tmp=$this->User->Group->find('first',$findoption);
		pr($tmp);
		$this->request->data['User']['group_id']=$tmp['Group']['id'];
		if($this->User->save($this->request->data)){
			$this->Session->setFlash(__('修了生が認証されました'));
			$this->redirect(array('action'=>'gapplist'));
		}
	}

	/*
	 * 大学のアカウント管理
	 */
	public function edit(){
		$id = $this->Auth->user('id');
		$this->User->id = $id;
		$editdata = $this->User->findById($id);

		if (!$editdata){
			throw new NotFoundException(__('Invalid user'));
		}

		$flag = false;
		if($this->request->is('put')){
			if($this->User->save($this->request->data,array('validate' => 'only'))){
				if(!empty($this->request->data['User']['new_password'])){
					$this->request->data['User']['password']=$this->request->data['User']['new_password'];
					$flag=true;
				}
				
				if($this->User->save($this->request->data)){
					if($flag){
						$this->Session->setFlash(__('ログイン情報が更新されました。認証しなおしてください'),
																		 'alert',
																		 array(
								'plugin' => 'BoostCake',
								'class' => 'alert-danger',
							)
																		 );
						$this->redirect('/users/logout');
					} else {
						$this->Session->setFlash(__('情報が更新されました'),
																		 'alert',
																		 array(
								'plugin' => 'BoostCake',
								'class' => 'alert-danger',
							)
																		 
																		 );
						$this->redirect('/');
					}
				}
				$this->Session->setFlash(__('更新されませんでした'),
																 'alert',
																 array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger',
					)
																 );
			}
		} else {
			$this->request->data=$editdata;
			unset($this->request->data['User']['password']);			
		}
	}

	
	
}

?>
