<?php
class Industry extends AppModel{
	public $name='Industry';

	public $hasMany=array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'industry_id'
		),
		'Career' => array(
			'className' => 'Career',
			'foreignKey' => 'industry_id'
		)
	);
}
?>
