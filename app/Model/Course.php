<?php
class Course extends AppModel{
	public $name='Course';

	public $hasMany=array(
		'Joiner' => array(
			'className' => 'Joiner',
			'foreignKey' => 'course_id'
		)
	);
}
?>
