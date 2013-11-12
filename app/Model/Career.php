<?php
class Career extends AppModel{
	public $name='Career';

	public $belongsTo=array(
		'Graduate' => array(
			'className' => 'Graduate',
			'foreignKey' => 'user_id'
		),
		'Industry' => array(
			'className' => 'Industry',
			'foreignKey' => 'industry_id'
		)
	);
}
?>
