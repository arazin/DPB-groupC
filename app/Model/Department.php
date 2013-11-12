<?php
class Department extends AppModel{
	public $name='Department';

	public $hasMany=array(
		'Student'=> array(
			'className' => 'Student',
			'foreignKey' => 'department_id',
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'department_id'
		)
	);

	public $belongsTo=array(
		'Faculty' => array(
			'className' => 'Faculty',
			'foreignKey' => 'faculty_id'
			)
	);

	}
?>
