<?php
App::uses('Industry', 'Model');

/**
 * Industry Test Case
 *
 */
class IndustryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.industry',
		'app.user',
		'app.student',
		'app.faculty',
		'app.department',
		'app.group',
		'app.graduate',
		'app.career',
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
		$this->Industry = ClassRegistry::init('Industry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Industry);

		parent::tearDown();
	}

}
