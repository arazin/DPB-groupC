<?php
App::uses('Graduate', 'Model');

/**
 * Graduate Test Case
 *
 */
class GraduateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.graduate',
		'app.user',
		'app.industry',
		'app.career',
		'app.student',
		'app.faculty',
		'app.department',
		'app.group',
		'app.participant',
		'app.curriculum',
		'app.course',
		'app.event',
		'app.type',
		'app.events_participant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Graduate = ClassRegistry::init('Graduate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Graduate);

		parent::tearDown();
	}

}
