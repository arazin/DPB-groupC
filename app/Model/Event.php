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
    'Participant' =>
    array(
      'className'              => 'Participant',
      'joinTable'              => 'events_participants',
      'foreignKey'             => 'event_id',
      'associationForeignKey'  => 'participant_id',
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
