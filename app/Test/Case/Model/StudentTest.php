<?php
App::uses('Student', 'Model');

/**
 * Student Test Case
 *
 */
class StudentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student',
		'app.user',
		'app.industry',
		'app.career',
		'app.graduate',
		'app.participant',
		'app.curriculum',
		'app.course',
		'app.event',
		'app.type',
		'app.events_participant',
		'app.faculty',
		'app.department',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Student = ClassRegistry::init('Student');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Student);

		parent::tearDown();
	}

}
