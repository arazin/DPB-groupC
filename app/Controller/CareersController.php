<?php
class CareersController extends AppController {
//	public $scaffold;

	
	public function beforeFilter(){
		parent::beforeFilter();
		}
    public function index() {
       // $this->Careers->recursive = 0;
        $this->set('careers', $this->paginate());
    }

	
 	 public function add() {
			$userId=$this->Auth->user('id');
			$this->request->data['Career']['graduate_id']=$userId;

 	  $findoption = array(
                       // 'conditions'=> array('industry_name' => '������'),
                        'fields' => array('id','industry_name'),//���o������
                        'recursive' => 0,//�֘A�e�[�u������͌������Ȃ�
                );
                $this->set('industries',$this->Career->Industry->find('list',$findoption));
        if ($this->request->is('post')) {
            $this->Career->create();
            if ($this->Career->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => '/'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
	
	
}
?>
