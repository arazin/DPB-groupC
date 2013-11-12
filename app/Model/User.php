<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{
	public $name='User';
	
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
		'Joiner' => array(
			'className' => 'Joiner',
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
