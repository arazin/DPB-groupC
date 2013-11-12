<?php
class Graduate extends AppModel{
	public $name='Graduate';

	public $belongsTo=array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);

	public $hasMany=array(
		'Career' => array(
			'className' => 'Career',
			'foreignKey' => 'user_id'
		)
	);
		
}

?>
