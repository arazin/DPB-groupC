// app/Model/User.php
<?php
App::uses('AuthComponent', 'Controller/Component');

class Certificate extends AppModel {
// app/Model/User.php

// ...

public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

	public $validate = array(
		'graduate_id' => array(
			'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
			//'required' => false,
				//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'issued' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
	),

		'certificate_type' => array(
			'valid' => array(
			'rule' => array('inList', array('学士','博士前期','博士後期',)),
			'message' => 'A certificate_type is required',
			//'allowEmpty' =>'false'
			)
			),
		'graduate_year' => array(
				'date' => array(
					'rule' => array('date'),
					)
					),
					'issue_num' =>array(
						'required' => array(
						'rule' => array('notEmpty'),
							'message' => 'A username is required'
							)
							),
			'purpose' => array(
				'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A purpose is required'
				)
				),
				'address' => array(
					'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'A address is required'
					)
					),
			);
-	//The Associations below have been created with all possible keys, those that are not needed can be removed
-
-/**
- * belongsTo associations
- *
- * @var array
- */
	public $belongsTo = array(
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'graduate_id',
		'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>