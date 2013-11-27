<?php
/**
 * ParticipantFixture
 *
 */
class ParticipantFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'curriculum_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'teacher_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'entranced' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'entrance_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'user_id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'curriculum_id' => array('column' => 'curriculum_id', 'unique' => 0),
			'course_id' => array('column' => 'course_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_id' => 1,
			'curriculum_id' => 1,
			'course_id' => 1,
			'teacher_name' => 'Lorem ipsum dolor sit amet',
			'entranced' => 1,
			'entrance_date' => '2013-11-27'
		),
	);

}
