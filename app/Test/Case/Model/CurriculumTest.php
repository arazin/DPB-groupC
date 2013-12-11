<?php
App::uses('Curriculum', 'Model');

/**
 * Curriculum Test Case
 *
 */
class CurriculumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.curriculum',
		'app.participant',
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
		$this->Curriculum = ClassRegistry::init('Curriculum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Curriculum);

		parent::tearDown();
	}

}
