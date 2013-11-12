<?php
class Joiner extends AppModel{
	public $name='Joiner';

	public $belongsTo=array(
		'Curriculum' => array(
			'className' => 'Curriculum',
			'foreignKey' => 'curruculum_id'
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
      'joinTable'              => 'events_joiners',
      'foreignKey'             => 'user_id',
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
