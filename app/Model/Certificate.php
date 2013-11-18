<?php
class Certificate extends AppModel{
	public $name='Certificate';

	public $belongsTo=array(
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'graduate_id'
		)
	);
}
?>
