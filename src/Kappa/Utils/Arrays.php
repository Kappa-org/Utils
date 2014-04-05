<?php
/**
 * This file is part of the Kappa package.
 *
 * (c) Ondřej Záruba <zarubaondra@gmail.com>
 *
 * For the full copyright and license information, please view the license.md
 * file that was distributed with this source code.
 */

namespace Kappa\Utils;

use Nette\Object;

/**
 * Class Arrays
 * @package Kappa\Utils
 */
class Arrays extends Object
{
	/**
	 * @param array $arrays
	 * @param string $index
	 * @param bool $revers
	 * @return array
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function sortBySubArray(array $arrays, $index, $revers = false)
	{
		if (!is_bool($revers))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' require bool as last parameter');
		$sort = array();
		foreach ($arrays as $key => $array) {
			if (!is_array($array))
				throw new InvalidArgumentException('Array must have at least 2 levels');
			if (!array_key_exists($index, $array))
				throw new InvalidArgumentException('Index "' . $index . '" wasn\'t been found in your array!');
			if (!is_string($array[$index]) && !is_numeric($array[$index]))
				throw new InvalidArgumentException('Parameter "' . $index . '" isn\'t string or numeric!');
			$sort[$key] = $array[$index];
		}
		if ($revers)
			arsort($sort);
		else
			asort($sort);
		$output = array();
		foreach ($sort as $key => $row) {
			$output[] = $arrays[$key];
		}
		return $output;
	}



	/**
	 * @param array $items
	 * @param null $delimiter
	 * @return string
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function toString(array $items, $delimiter = null)
	{
		if ($delimiter !== null && !is_string($delimiter) && !is_int($delimiter))
			throw new InvalidArgumentException("Class " . __METHOD__ . " required as delimiter string or int type");
		$toString = null;
		if ($delimiter) {
			$i = 0;
			foreach ($items as $item) {
				if (is_string($item)) {
					$toString .= $item;
					if (array_key_exists($i + 1, $items) && is_string($items[$i + 1]))
						$toString .= $delimiter;
					$i++;
				}
			}
		} else {
			$i = 0;
			foreach ($items as $item) {
				if (is_string($item)) {
					$toString .= $item;
					if (array_key_exists($i + 1, $items) && is_string($items[$i + 1]))
						$toString .= ',';
					$i++;
				}
			}
		}
		return trim($toString);
	}



	/**
	 * @param array $items
	 * @param string $key
	 * @param bool $byIndex
	 * @return array
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function getByKey(array $items, $key, $byIndex = false)
	{
		if (!is_string($key) && !is_int($key))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' required string as second parameter!');
		if (!is_bool($byIndex))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' require bool as last parameter');
		foreach ($items as $index => $item) {
			if ($byIndex)
				$data = explode($key, $index);
			else
				$data = explode($key, $item);
			if (!array_key_exists(1, $data))
				unset($items[$index]);
		}
		return $items;
	}

	/**
	 * @param array $items
	 * @param string $key
	 * @return array
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function filterByKey(array $items, $key)
	{
		if(!is_string($key) && !is_numeric($key))
			throw new InvalidArgumentException("Class " . __METHOD__ . "error! Second parameter must be string");
		$output = array();
		foreach($items as $index => $item) {
			if($item == $key) {
				$output[$index] = $item;
			}
		}
		return $output;
	}

	/**
	 * @param array $items
	 * @return array
	 */
	public static function getOnlyFilled(array $items)
	{
		$result = array();
		foreach ($items as $key => $val) {
			if ($val) {
				$result[$key] = $val;
			}
		}

		return $result;
	}
}
