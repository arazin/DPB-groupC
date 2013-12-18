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

	
	public $components = array('Security','Paginator');
	//Component:paginatorのoption
	public $paginate;


	//	public function index(){
	//		$this->set('users',$this->User->find('all'));
	//	}
	public function login() {
		if($this->Session->read('Auth.User')){
			$this->Session->setFlash('あなたは既にログイン済です');
			$this->redirect('/',null,false);
		}
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));

      }
    }
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
		/*
		 * 参加者のグループidをセット
		 */
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


	
	
}

?>
