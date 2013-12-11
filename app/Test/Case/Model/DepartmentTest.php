<?php
App::uses('Department', 'Model');

/**
 * Department Test Case
 *
 */
class DepartmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department',
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
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Department = ClassRegistry::init('Department');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Department);

		parent::tearDown();
	}

}
