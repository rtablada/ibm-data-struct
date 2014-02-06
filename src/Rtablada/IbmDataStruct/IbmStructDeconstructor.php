<?php namespace Rtablada\IbmDataStruct;

class IbmStructDeconstructor extends StructDeconstructor
{
	protected $defaultMutator = 'length';

	/**
	 * Takes value and trims it, then fills
	 * remaining length with whitespace.
	 *
	 * @param  string $value
	 * @param  integer $length
	 * @return string
	 */
	protected function mutateOnLength(&$string, $length)
	{
		$value = substr($string, 0, $length);
		$string = substr($string, $length);
		return $value;
	}
}
