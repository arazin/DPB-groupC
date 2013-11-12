<?php
class Event extends AppModel{
	public $name='Event';

	public $belongsTo=array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id'
		)
	);


	public $hasAndBelongsToMany = array(
    'Joiner' =>
    array(
      'className'              => 'Joiner',
      'joinTable'              => 'events_joiners',
      'foreignKey'             => 'event_id',
      'associationForeignKey'  => 'user_id',
      'unique'                 => true,
      'conditions'             => '',
      'fields'                 => '',
      'order'                  => '',
      'limit'                  => '',
      'offset'                 => '',
      'finderQuery'            => '',
      'deleteQuery'            => '',
      'insertQuery'            => ''
    )
  );
	
}
?>
