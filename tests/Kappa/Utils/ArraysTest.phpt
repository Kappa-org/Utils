<?php
/**
 * This file is part of the Kappa package.
 *
 * (c) Ondřej Záruba <zarubaondra@gmail.com>
 *
 * For the full copyright and license information, please view the license.md
 * file that was distributed with this source code.
 *
 * @testCase
 */

namespace Kappa\Tests\Arrays;

use Kappa\Tester\TestCase;
use Kappa\Utils\Arrays;
use Nette;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class ArraysTest
 * @package Kappa\Tests\Arrays
 */
class ArraysTest extends TestCase
{
	/**
	 * @param array $input
	 * @param array $sortByName
	 * @param array $sortByNameReverse
	 * @dataProvider providerSortBySubArray
	 */
	public function testSortBySubArray(array $input, array $sortByName, array $sortByNameReverse)
	{
		Assert::same($sortByName, Arrays::sortBySubArray($input, 'name'));
		Assert::same($sortByNameReverse, Arrays::sortBySubArray($input, 'name'), 'true');
		Assert::throws(function () use ($input) {
			$sortBySubArray = Arrays::sortBySubArray($input, 'data');
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () use ($input) {
			$sortBySubArray = Arrays::sortBySubArray($input, 'name', 5);
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () use ($input) {
			$sortBySubArray = Arrays::sortBySubArray($input, 5);
		}, '\Kappa\Utils\InvalidArgumentException');
	}

	/**
	 * @param array $input
	 * @param array $byIndex
	 * @param array $byValues
	 * @dataProvider providerGetByKey
	 */
	public function testGetByKey(array $input, array $byIndex, array $byValues)
	{
		Assert::same($byIndex, Arrays::getByKey($input, "Tests", true));
		Assert::same($byValues, Arrays::getByKey($input, "D:"));
		Assert::same(array(), Arrays::getByKey($input, 0, true));
		Assert::throws(function () use ($input) {
			$betByKey = Arrays::getByKey($input, "D:", "test");
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () use ($input) {
			$betByKey = Arrays::getByKey($input, array("X"));
		}, '\Kappa\Utils\InvalidArgumentException');
	}

	/**
	 * @return array
	 */
	public function providerSortBySubArray()
	{
		return array(
			array(
				array(
					0 => array(
						'name' => 'John',
						'age' => 20,
						'data' => array('name' => 'John')
					),
					1 => array(
						'name' => 'Budry',
						'age' => 12,
						'data' => array('name' => 'Budry')
					),
					2 => array(
						'name' => 'Zavak',
						'age' => 96,
						'data' => array('name' => 'Zavak')
					)
				),

				array(
					0 => array(
						'name' => 'Budry',
						'age' => 12,
						'data' => array('name' => 'Budry')
					),
					1 => array(
						'name' => 'John',
						'age' => 20,
						'data' => array('name' => 'John')
					),
					2 => array(
						'name' => 'Zavak',
						'age' => 96,
						'data' => array('name' => 'Zavak')
					)
				),

				array(
					0 => array(
						'name' => 'Budry',
						'age' => 12,
						'data' => array('name' => 'Budry')
					),
					1 => array(
						'name' => 'John',
						'age' => 20,
						'data' => array('name' => 'John')
					),
					2 => array(
						'name' => 'Zavak',
						'age' => 96,
						'data' => array('name' => 'Zavak')
					)
				)
			)
		);
	}

	/**
	 * @return array
	 */
	public function providerGetByKey()
	{
		return array(
			array(
				array(
					"Kappa\\Tests\\One" => "D:/Kappa/Tests/One.php",
					"Kappa\\Tests\\Two" => "D:/Kappa/Tests/Two.php",
					"Kappa\\Tests\\Three\\One" => "D:/Kappa/Test/Three/One.php",
					"Kappa\\Test\\Four" => "D:/Kappa/Test/Four.php",
					"Kappa\\Tests\\Four" => "C:/Kappa/Tests/Four.php"
				),

				array(
					"Kappa\\Tests\\One" => "D:/Kappa/Tests/One.php",
					"Kappa\\Tests\\Two" => "D:/Kappa/Tests/Two.php",
					"Kappa\\Tests\\Three\\One" => "D:/Kappa/Test/Three/One.php",
					"Kappa\\Tests\\Four" => "C:/Kappa/Tests/Four.php"
				),

				array(
					"Kappa\\Tests\\One" => "D:/Kappa/Tests/One.php",
					"Kappa\\Tests\\Two" => "D:/Kappa/Tests/Two.php",
					"Kappa\\Tests\\Three\\One" => "D:/Kappa/Test/Three/One.php",
					"Kappa\\Test\\Four" => "D:/Kappa/Test/Four.php",
				),
			)
		);
	}
}

\run(new ArraysTest());