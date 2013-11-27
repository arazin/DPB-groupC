<?php
App::uses('Faculty', 'Model');

/**
 * Faculty Test Case
 *
 */
class FacultyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.faculty',
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
		$this->Faculty = ClassRegistry::init('Faculty');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Faculty);

		parent::tearDown();
	}

}
