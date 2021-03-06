<?php
class CareersController extends AppController {
	//	public $scaffold;
	public $components = array(
		'Recaptcha.Recaptcha' => array('actions' => array('add'))
	);
	
	public function beforeFilter(){
		parent::beforeFilter();
	}

	
 	public function add() {
		$userId=$this->Auth->user('id');
		$this->request->data['Career']['graduate_id']=$userId;

 	  $findoption = array(
      // 'conditions'=> array('industry_name' => '? o'),
      'fields' => array('id','industry_name'),//?a?e?o?・?R?≪
      'recursive' => 0,//??A?e?[?u???c?c???? ?￠
    );
    $this->set('industries',$this->Career->Industry->find('list',$findoption));
    if ($this->request->is('post')) {
      $this->Career->create();
      if ($this->Career->save($this->request->data)) {
        $this->Session->setFlash(__('進路変更を記録しました'),
																 'alert',
																 array(
						'plugin' => 'BoostCake',
						'class' => 'alert-succsess',
					));
        $this->redirect('/');
      } else {
        $this->Session->setFlash(__('進路を保存できませんでした'),
																 'alert',
																 array(
						'plugin' => 'BoostCake',
						'class' => 'alert-danger',
					));
      }
    }
  }

	
}
?>
