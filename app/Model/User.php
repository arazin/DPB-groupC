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
	public $actsAs = array(
		'Search.Searchable',
		'Containable',
		'Acl' => array('type' => 'requester'),
	);

	/* 検索条件 */
	public $filterArgs = array(
		'User.name' => array(
			'type' => 'like',
			'field' => 'User.name',
			'name' => 'name',
			'empty' => true,
		),
		'User.group_id' => array(
			'type' => 'value',
			'field' => 'User.group_id',
			'name' => 'group_id',
			'empty' => true,
		),
		'User.nationarity' => array(
			'type' => 'like',
			'field' => 'User.nationarity',
			'name' => 'nationarity',
			'empty' => true,
		),
		'User.prefecture' => array(
			'type' => 'like',
			'field' => 'User.prefecture',
			'name' => 'prefecture',
			'empty' => true,
		),
		'User.remain' => array(
			'type' => 'like',
			'field' => 'User.remain',
			'name' => 'remain',
			'empty' => true,
		),

		'User.birthday' => array(
			'type' => 'between',
			'field' => 'User.birthday',
			'name' => 'birthday',
			'empty' => true,
		),
			
	);

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
			'between' => array(
				'rule' => array('between',5,20),
				'message' => 'IDは5文字以上20文字以内で入力してください',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'そのIDは使用できません',
				'on' => 'create', // Limit validation to 'create' or 'update' operations

			),
		),
		
		'new_username' => array(
			'between' => array(
				'rule' => array('between',5,20),
				'message' => 'IDは5文字以上20文字以内で入力してください',
				'on' => 'create'
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'そのIDは使用できません',
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
				'message' => 'パスワードは8文字以上入力してください',
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => 'error:入力が長すぎます',
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
				'message' => 'パスワードは8文字以上入力してください',
				'allowEmpty' => true,
				'required' => false,
			),
			'maxLength' => array(
				'rule' => array('maxLength',50),
				'message' => '入力が長すぎます',
			),
		),
		
		'password3' => array(
			'sameCheck' => array(
				'rule' => array('sameCheck','new_password'),
				'message' => 'パスワードが一致しません'
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
				'message' =>'内容が長過ぎます',
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
				'message' => '入力が長過ぎます',
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
				'message' => '入力が長過ぎます',
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
				'message' => 'NNN-NNNNの形式で入力してください',
			),
			'maxLength' => array(
				'rule' => array('maxLength',20),
				'message' => '入力が長過ぎます',
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
				'message' => '電話番号は"-"で区切ってください',
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
				'message' => '',
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
