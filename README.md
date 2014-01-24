IBM Data Struct Library
---

When communicating with IBM based web services you may be required to create data structures represented by strings of varied lengths.
This can be a bit tedious to have to remember string lengths and various requirements and create these data structures from varied inputs.

This library gives you a simple API for creating these structures in a manageable and configurable way.

## Installation

This library can be installed using composer and requiring `rtablada/ibm-data-struct`.

## Use

To create a data structure and get the string representation you just need to pass a set of input values and rules to create the structure.
The rules will be parsed in order to create the string.
If a rule is not defined as a map, then the default mutation of length will be used.

```php
$values = [
	'name_long' => 'Ryan Tablada',
	'name_short' => 'Ryan Tablada',
];

$rules = [
	'name_short' => 22, // Pad length to take up 22 chars
	'name_long' => ['length' => 10], // Trim to 10 chars
];

$structure = new Rtablada\IbmDataStruct\IbmStructBuilder($values, $rules);

$stringValue = (string) $structure;
$stringValue = $structure->getString();
```
