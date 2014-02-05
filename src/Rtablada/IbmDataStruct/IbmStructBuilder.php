<?php namespace Rtablada\IbmDataStruct;

class IbmStructBuilder extends StructBuilder
{
	protected $defaultMutator = 'length';
	
	protected $padString = ' ';

	/**
	 * Takes value and trims it, then fills
	 * remaining length with whitespace.
	 *
	 * @param  string $value
	 * @param  integer $length
	 * @return string
	 */
	protected function mutateOnLength($value, $length)
	{
		$value = substr($value, 0, $length);

		return str_pad($value, $length, $this->padString);
	}
}
