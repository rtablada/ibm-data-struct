<?php namespace Rtablada\IbmDataStruct;

abstract class StructBuilder
{

	protected $defaultMutator;

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
			if (isset($values[$key])) {
				$this->addValue($values[$key], $properties);
			} else {
				$this->addValue('', $properties);
			}
		}
	}

	protected function addValue($value, $properties)
	{
		if (!is_array($properties)) {
			$properties = array($this->defaultMutator => $properties);
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
