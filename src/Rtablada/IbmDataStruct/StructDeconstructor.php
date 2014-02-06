<?php namespace Rtablada\IbmDataStruct;

class StructDeconstructor
{

	protected $defaultMutator;

	protected $rules = array();

	protected $original = '';

	protected $attributes = array();

	public function __construct($value, array $rules = array())
	{
		$this->original = $value;

		if (count($rules)) {
			$this->rules = $rules;
		}

		$this->prepareAttributes();
	}

	protected function prepareAttributes()
	{
		$string = $this->original;

		foreach ($this->rules as $key => $rules) {
			$string = $this->deconstructFromRules($string, $key, $rules);
		}
	}

	protected function deconstructFromRules($string, $key, $properties)
	{
		if (!is_array($properties)) {
			$properties = array($this->defaultMutator => $properties);
		}

		$this->attributes[$key] = $this->mutateOnProperties($string, $properties);

		return $string;
	}

	protected function mutateOnProperties(&$string, $properties)
	{
		foreach ($properties as $property => $rule) {
			$mutatorName = 'mutateOn' . ucfirst($property);

			$value = $this->$mutatorName($string, $rule);
		}

		return $value;
	}

	public function getAttributes()
	{
		return $this->attributes;
	}
}
