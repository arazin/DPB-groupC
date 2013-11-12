<?php
class Faculty extends AppModel{
	public $name='Faculty';

	public $hasMany=array(
		'Student'=> array(
			'classname' => 'Student',
			'foreignKey' => 'faculty_id',
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'faculty_id'
		)
	);
	
	}
?>
