<?php
class CareersController extends AppController {
//	public $scaffold;
	
	public function beforeFilter(){
		parent::beforeFilter();
		}
    public function index() {
        $this->Careers->recursive = 0;
        $this->set('careers', $this->paginate());
    }

	
    public function add() {
        if ($this->request->is('post')) {
            $this->Career->create();
            if ($this->Career->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
	
	
}
?>
