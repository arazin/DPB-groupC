<?php
App::uses('AppModel', 'Model');
/**
 * Student Model
 *
 * @property Faculty $Faculty
 * @property Department $Department
 * @property Labo $Labo
 * @property Student $Student
 * @property Student $Student
 */
class Student extends AppModel {

	/**
	 * Primary key field
	 *
	 * @var string
	 */
	public $primaryKey = 'user_id';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'grade' => array(
			'inList' => array(
				'rule' => array('inList',array(1,2,3)),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'faculty_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'department_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'student_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'required' => true,
				'message' => 'error:alphaNumeric',
			),
			'maxLength' => array(
				'rule' => array('maxLength',30),
				'message' => 'error:maxlength',
			),
		),
		
		'guarantor_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',400),
				'message' => 'error:maxlength',
			),
		),
		
		'guarantor_contact' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',20),
				'message' => 'error:maxlength',
			),
			'phone' => array(
				'rule' => array('phone','/\d{2,4}-\d{2,4}-\d{4}/','all'),
				'message' => 'error:phone',
			),
		),
		
		'entrance_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Faculty' => array(
			'className' => 'Faculty',
			'foreignKey' => 'faculty_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Labo' => array(
			'className' => 'Labo',
			'foreignKey' => 'labo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasOne =array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
	);

	

	
	/**
	 * hasMany associations
	 *
	 * @var array


	public $hasMany = array(
	'Student' => array(
	'className' => 'Student',
	'foreignKey' => 'student_id',
	'dependent' => false,
	'conditions' => '',
	'fields' => '',
	'order' => '',
	'limit' => '',
	'offset' => '',
	'exclusive' => '',
	'finderQuery' => '',
	'counterQuery' => ''
	)
	);
	 */
}
