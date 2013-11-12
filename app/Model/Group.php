<?php
class Group extends AppModel{
	public $name='Group';

	public $hasMany=array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'group_id'
		)
	);

	public $belongsTo=array(
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id'
		)
	);
	
}
?>
