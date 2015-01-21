<?php
/**
 * This file is part of the Kappa\Utils package.
 *
 * (c) Ondřej Záruba <zarubaondra@gmail.com>
 *
 * For the full copyright and license information, please view the license.md
 * file that was distributed with this source code.
 */

namespace Kappa\Utils;

/**
 * Class Arrays
 *
 * @package Kappa\Utils
 * @author Ondřej Záruba <http://zaruba-ondrej.cz>
 */
class Arrays extends \Nette\Utils\Arrays
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
}
