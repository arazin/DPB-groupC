<?php
App::uses('AppModel', 'Model');
/**
 * Certificate Model
 *
 * @property Graduate $Graduate
 */
class Certificate extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
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
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxLength', '20'),
				'message' => '内容が長過ぎます'
			),

		),
		'graduate_year' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'issue_num' => array(
			'numeric' => array(
				'rule' => array('range',0,15),
				'message' => '15枚以下の範囲の自然数を入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'purpose' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxlength' => array(
				'rule' => array('maxLength', '200'),
				'message' => '内容が長過ぎます'
			),
		),
		'address' => array(
			'maxlength' => array(
				'rule' => array('maxLength', '200'),
				'message' => '内容が長過ぎます',
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
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'graduate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		/*		'Graduate' => array(
		'className' => 'Graduate',
		'foreignKey' => 'graduate_date',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		)*/
	);

}
