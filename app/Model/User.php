<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{
	public $name='User';

	public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A username is required'
      )
    ),
    'password' => array(
      'required' => array(
        'rule' => array('notEmpty'),
        'message' => 'A password is required'
      )
    ),
    'role' => array(
      'valid' => array(
        'rule' => array('inList', array('admin', 'general','student','garaduate')),
        'message' => 'Please enter a valid role',
        'allowEmpty' => false
      )
    )
  );
	
	public $belongsTo=array(
		'Industry' => array(
			'className' => 'Industry',
			'foreignKey' => 'industry_id'
		)
	);

	public $hasOne=array(
		'Student' => array(
			'classNsme' => 'Student',
			'foreignKey' => 'user_id'
		),
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'user_id'
		),
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'user_id'
		)
	);

	
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {      //$this->alias???User???
																								 $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
																								 }
		return true;
	}

	
}
?>
