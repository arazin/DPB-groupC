<?php
App::uses('EventsParticipant', 'Model');

/**
 * EventsParticipant Test Case
 *
 */
class EventsParticipantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.events_participant',
		'app.participant',
		'app.curriculum',
		'app.course',
		'app.event',
		'app.type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventsParticipant = ClassRegistry::init('EventsParticipant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventsParticipant);

		parent::tearDown();
	}

}
