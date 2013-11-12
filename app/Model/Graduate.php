<?php
class Graduate extends AppModel{
	public $name='Graduate';

	public $primaryKey='user_id';
	
	public $belongsTo=array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);

	public $hasMany=array(
		'Career' => array(
			'className' => 'Career',
			'foreignKey' => 'graduate_id'
		)
	);
		
}

?>
