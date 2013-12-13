<?php
App::uses('AppModel', 'Model');


/**
 * User Model
 *
 * @property Industry $Industry
 * @property Graduate $Graduate
 * @property Participant $Participant
 * @property Student $Student
 */
class User extends AppModel {
	public $name = 'User';

	/*
	 * Hash化
	 */
  public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}

	/*
	 * ACL
	 */
  public $actsAs = array('Acl' => array('type' => 'requester'));
  public function parentNode() {
    if (!$this->id && empty($this->data)) {
      return null;
    }
    if (isset($this->data['User']['group_id'])) {
      $groupId = $this->data['User']['group_id'];
    } else {
      $groupId = $this->field('group_id');
    }
    if (!$groupId) {
      return null;
    } else {
      return array('Group' => array('id' => $groupId));
    }
  }

	/*
	 * 同値チェック
	 */
	public function sameCheck($check,$field){
		$str1 = array_shift($check);
		$str2 = $this->data[$this->name][$field];
		return $str1 == $str2;
	}

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error:notempty', 
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'error:alphaNumeric',
			),
			'between' => array(
				'rule' => array('between',5,15),
				'message' => 'error:between',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'error:isUnique',
				'on' => 'create', // Limit validation to 'create' or 'update' operations

			),
		),
		
		'new_username' => array(
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'error:alphaNumeric',
				'allowEmpty' => true,
				'required' => false,
			),
			'between' => array(
				'rule' => array('between',5,15),
				'message' => 'error:between',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'error:isUnique',
				'on' => 'create',
			),
		),

		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error:notempty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength',8),
				'message' => 'error:minlength',
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:maxlength',
			),
		),
		
		'password2' => array(
			'sameCheck' => array(
				'rule' => array('sameCheck','password'),
				'message' => 'パスワードが一致しません'
			),
		),
		
		'new_password' => array(
			'minLength' => array(
				'rule' => array('minLength',8),
				'message' => 'error:minlength',
				'allowEmpty' => true,
				'required' => false,
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:maxlength',
			),
		),

		
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			
		),
		
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',100),
				'message' => 'error:maxlength',
			),
		),
		'nationarity' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:maxlength',
			),
		),
		'prefecture' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:maxlength',
			),
		),
		'remain' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',100),
				'message' => 'error:maxlength',
			),	
		),
		
		'postcord' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'custom' => array(
				'rule' => array('custom','/^[0-9]{3}\-[0-9]{4}$/'),
				'messeage' => 'error:please NNN-NNNN',
			),
			'maxLength' => array(
				'rule' => array('maxLength',20),
				'message' => 'error:maxlength',
			),	
		),
		
		'phonenumber' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'phone' => array(
				'rule' => array('phone','/\d{2,4}-\d{2,4}-\d{4}/','all'),
				'message' => 'error:phone',
			),
		),
		
		'job' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:maxlength',
			),	
		),
		
		'industry_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error:notenmpty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'error:numeric',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birthday' => array(
			'date' => array(
				'rule' => array('date','ymd'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sex' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'error:numeric',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'error:notempty',
			),
			'range' => array(
				'rule' => array('range',-1,2),
				'message' => 'error:range',
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
		'Industry' => array(
			'className' => 'Industry',
			'foreignKey' => 'industry_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

	/**
	 * hasOne associations
	 *
	 * @var array
	 */
	public $hasOne = array(
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);

}
