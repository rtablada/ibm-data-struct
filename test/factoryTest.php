<?php

require_once(__DIR__.'/../vendor/autoload.php');

class Factory extends Rtablada\IbmDataStruct\StructFactory
{
	protected static $rules = [
		'name_short' => 22,
		'name_long' => ['length' => 10],
	];

	protected static $structBuilderType = 'Rtablada\\IbmDataStruct\\IbmStructBuilder';
}

$factory = new Factory;

$values = [
	'name_long' => 'Ryan Tablada',
	'name_short' => 'Ryan Tablada',
];

echo $factory->build($values);
