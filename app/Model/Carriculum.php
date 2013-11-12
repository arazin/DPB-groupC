<?php
class Carriculum extends AppModel{
	public $name='Carriculum';

	public $hasMany=array(
		'Joiner' => array(
			'className' => 'Joiner',
			'foreignKey' => 'carriculum_id'
		)
	);
}
?>
