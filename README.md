# Kappa\Utils [![Build Status](https://travis-ci.org/Kappa-org/Utils.svg?branch=master)](https://travis-ci.org/Kappa-org/Utils)

Collection of utilities

## Requirements:

* PHP 5.4 or higher
* [Nette\Uitls](https://github.com/nette/utils) 2.2.*

## Installation:

The best way to install Kappa\Utils is using [Composer](https://getcomposer.org):

```bash
$ composer require kappa/utils:@dev
```

## Usages

### Math

* `average(array)` - returns average of array
* `median(array)` - returns median of array
* `mode(array)` - returns array of mode

### Strings

* `mb_ucfirst(string, string)` - ucfirst with encoding, returns string

### Arrays

Input array example

* `sortBySubArray(array, index, reverse = false)` - returns sorted array by sub array. Example: 
```php
<?php
$data = [
	0 => [
		'name' => 'John',
		'age' => 20,
		'data' => array['name' => 'John']
	],
	1 => [
		'name' => 'Budry',
		'age' => 12,
		'data' => array['name' => 'Budry']
	],
	2 => [
		'name' => 'Zavak',
		'age' => 96,
		'data' => array['name' => 'Zavak']
	]
]

$output = Arrays::sortBySubArray($data, "name");

// Result will be
[
	0 => [
    		'name' => 'Budry',
    		'age' => 12,
    		'data' => array['name' => 'Budry']
    	],
	1 => [
		'name' => 'John',
		'age' => 20,
		'data' => array['name' => 'John']
	],
	2 => [
		'name' => 'Zavak',
		'age' => 96,
		'data' => array['name' => 'Zavak']
	]
]
```

