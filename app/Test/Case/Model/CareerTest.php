<?php
App::uses('Career', 'Model');

/**
 * Career Test Case
 *
 */
class CareerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.career',
		'app.graduate',
		'app.user',
		'app.industry',
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
		$this->Career = ClassRegistry::init('Career');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Career);

		parent::tearDown();
	}

}
