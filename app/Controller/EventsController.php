<?php
class EventsController extends AppController{
	/*public $scaffold;*/
 public $helpers = array('Html', 'Form');

    public function events() {
         $this->set('events', $this->Event->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->set('event', $event);
    }
}

?>
