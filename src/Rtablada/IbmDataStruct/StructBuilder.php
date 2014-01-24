<?php namespace Rtablada\IbmDataStruct;

abstract class StructBuilder
{

	protected $rules = array();

	protected $string = '';

	public function __construct(array $values = array(), array $rules = array())
	{
		if (count($rules)) {
			$this->rules = $rules;
		}

		$this->setStruct($values);
	}

	public function setStruct(array $values = array())
	{
		foreach ($this->rules as $key => $properties) {
			$this->addValue($values[$key], $properties);
		}
	}

	protected function addValue($value, $properties)
	{
		if (!is_array($properties)) {
			$properties = array('length' => $properties);
		}

		$this->string .= $this->mutateOnProperties($value, $properties);
	}

	protected function mutateOnProperties($value, $properties)
	{
		foreach ($properties as $property => $rule) {
			$mutatorName = 'mutateOn' . ucfirst($property);

			$value = $this->$mutatorName($value, $rule);
		}

		return $value;
	}

	public function __toString()
	{
		return $this->getString();
	}

	public function getString()
	{
		return $this->string;
	}
}
