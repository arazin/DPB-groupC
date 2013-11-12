<?php
class Type extends AppModel{
	public $name='Type';

	public $hasMany=array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'type_id'
		)
	);
}
?>
