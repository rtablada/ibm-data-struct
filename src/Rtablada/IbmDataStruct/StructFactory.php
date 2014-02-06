<?php namespace Rtablada\IbmDataStruct;

abstract class StructFactory
{
	protected static $rules = array();

	protected static $structBuilderType;

	protected static $structDeconstructorType;

	public function __construct(array $rules = array())
	{
		if (count($rules)) {
			static::$rules = $rules;
		}
	}

	public static function build(array $values = array(), array $rules = array())
	{
		$rules = count($rules) ? $rules : static::$rules;
		$builderType = static::$structBuilderType;
		$builder = new $builderType($values, $rules);

		return $builder->__toString();
	}

	public static function deconstruct($string, array $rules = array())
	{
		$rules = count($rules) ? $rules : static::$rules;
		$builderType = static::$structDeconstructorType;
		$builder = new $builderType($string, $rules);

		return $builder->getAttributes();
	}
}
