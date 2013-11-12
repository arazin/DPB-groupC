<?php
class Course extends AppModel{
	public $name='Course';

	public $hasMany=array(
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'course_id'
		)
	);
}
?>
