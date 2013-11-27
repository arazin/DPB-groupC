<?php
App::uses('Certificate', 'Model');

/**
 * Certificate Test Case
 *
 */
class CertificateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.certificate',
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
		$this->Certificate = ClassRegistry::init('Certificate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Certificate);

		parent::tearDown();
	}

}
