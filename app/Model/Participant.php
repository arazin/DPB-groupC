<?php
class Participant extends AppModel{
	public $name='Participant';

	public $belongsTo=array(
		'Curriculum' => array(
			'className' => 'Curriculum',
			'foreignKey' => 'curriculum_id'
		),
		'Course' => array(
			'className' => 'Course',
			'foreitnKey' => 'course_id'
		)
	);

		public $hasAndBelongsToMany = array(
    'Event' =>
    array(
      'className'              => 'Event',
      'joinTable'              => 'events_participants',
      'foreignKey'             => 'participant_id',
      'associationForeignKey'  => 'event_id',
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
