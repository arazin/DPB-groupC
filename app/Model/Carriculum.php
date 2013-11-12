<?php
class Carriculum extends AppModel{
	public $name='Carriculum';

	public $hasMany=array(
		'Participant' => array(
			'className' => 'Participant',
			'foreignKey' => 'carriculum_id'
		)
	);
}
?>
