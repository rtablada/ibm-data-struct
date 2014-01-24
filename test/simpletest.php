<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Rtablada\IbmDataStruct\IbmStructBuilder;

$values = [
	'name_long' => 'Ryan Tablada',
	'name_short' => 'Ryan Tablada',
];

$rules = [
	'name_short' => 22,
	'name_long' => ['length' => 10],
];

$builder = new IbmStructBuilder($values, $rules);

var_dump($builder);
