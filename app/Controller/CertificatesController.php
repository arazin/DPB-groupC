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

	
    public function add() {
        if ($this->request->is('post')) {
            $this->Certificate->create();
            if ($this->Certificate->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
	
	
}
?>
