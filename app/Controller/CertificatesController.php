<?php
class CertificatesController extends AppController {
//	public $scaffold;
	
	public function beforeFilter(){
		parent::beforeFilter();
		}
    public function index() {
        $this->Certificate->recursive = 0;
        $this->set('certificates', $this->paginate());
    }

    public function view($id = null) {
       // $this->Certificate->graduate_id = $id;
        if (!$this->Certificate->exists($id)) {
            throw new NotFoundException(__('Invalid certificate'));
        }
				$options = array('conditions' => array('Certificate.' . $this->Certificate->primarykey => id));
				$this -> set('certificate',$this->Certificate->find('first',$options));
       // $this->set(certificate', $this->Certificate->read(null, $id));
    }

	
    public function add() {
    			$userId=$this->Auth->user('id');
					$this->request->data['Certificate']['graduate_id']=$userId;
					$Issue=0;
					$this->request->data['Certificate']['issued']=$Issue;
        if ($this->request->is('post')) {
            $this->Certificate->create();
            if ($this->Certificate->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => '/'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
	
	
}
?>
