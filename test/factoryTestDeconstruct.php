<?php

require_once(__DIR__.'/../vendor/autoload.php');

class Factory extends Rtablada\IbmDataStruct\StructFactory
{
	protected static $rules = [
		'name_short' => 12,
		'name_long' => ['length' => 12],
	];

	protected static $structBuilderType = 'Rtablada\\IbmDataStruct\\IbmStructBuilder';
	protected static $structDeconstructorType = 'Rtablada\\IbmDataStruct\\IbmStructDeconstructor';
}

$factory = new Factory;

$string = 'Ryan TabladaRyan Forall';

var_dump($factory->deconstruct($string));
