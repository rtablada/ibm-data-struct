<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Rtablada\IbmDataStruct\IbmStructDeconstructor;

$string = 'Ryan TabladaRyan Forall';

$rules = [
	'name_short' => 12,
	'name_long' => ['length' => 12],
];

$builder = new IbmStructDeconstructor($string, $rules);

var_dump($builder->getAttributes());
