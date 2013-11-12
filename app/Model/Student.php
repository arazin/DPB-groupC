<?php
class Student extends AppModel{
	public $name='Student';


	
	public $belongsTo=array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Faculty' => array(
			'className'=> 'Faculty',
			'foreignKey' => 'faculty_id'
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id'
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id'
		),
	);
}
?>

