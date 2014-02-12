<?php namespace Rtablada\IbmDataStruct;

abstract class IbmStructFactory extends StructFactory
{
	protected static $structBuilderType = 'Rtablada\\IbmDataStruct\\IbmStructBuilder';

	protected static $structDeconstructorType = 'Rtablada\\IbmDataStruct\\IbmStructDeconstructor';
}
