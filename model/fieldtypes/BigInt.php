<?php
/**
 * Represents a signed 64 bit big integer field.
 * 
 * @package framework
 * @subpackage model
 */
class BigInt extends Int {

	public function __construct($name = null, $defaultVal = 0) {
		$this->defaultVal = is_int($defaultVal) ? $defaultVal : 0;
		
		parent::__construct($name);
	}

	public function requireField() {
		if(PHP_INT_SIZE >= 8) {
			$type = 'bigint';
		} else {
			$type = 'int';
		}
		$parts=Array(
			'datatype'=>$type,
			'precision'=>20,
			'null'=>'not null',
			'default'=>$this->defaultVal,
			'arrayValue'=>$this->arrayValue);
		
		$values=Array('type'=>$type, 'parts'=>$parts);
		DB::requireField($this->tableName, $this->name, $values);
	}
	
}

