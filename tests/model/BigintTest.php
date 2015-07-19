<?php
/**
 * @package framework
 * @subpackage tests
 */
class BigIntTest extends SapphireTest {

	protected static $fixture_file = 'BigIntTest.yml';

	protected $testDataObject;
	
	protected $extraDataObjects = array(
		'BigIntTest_DataObject'
	);

	public function setUp() {
		parent::setUp();
		$this->testDataObject = $this->objFromFixture('BigIntTest_DataObject', 'test-dataobject');
	}

	public function testDefaultValue() {
		$this->assertEquals($this->testDataObject->MyBigInt1, 0,
			'Database default for BigInt type is 0');
	}

	public function testInvalidSpecifiedDefaultValue() {
		$this->assertEquals($this->testDataObject->MyBigInt2, 0,
			'Invalid default value for BigInt type is casted to 0');
	}

	public function testSpecifiedDefaultValueInDefaultsArray() {
		$this->assertEquals($this->testDataObject->MyBigInt3, 21474836888,
			'Default value for BigInt type is set to 21474836888');
	}

}

/**
 * @package framework
 * @subpackage tests
 */
class BigIntTest_DataObject extends DataObject implements TestOnly {

	private static $db = array(
		'Name' => 'Varchar',
		'MyBigInt1' => 'BigInt',
		'MyBigInt2' => 'BigInt(4,2,"Invalid default value")',
		'MyBigInt3' => 'BigInt'
	);

	private static $defaults = array(
		'MyBigInt3' => 21474836888
	);

}