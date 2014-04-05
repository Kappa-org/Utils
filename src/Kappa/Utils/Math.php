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
 * Class Math
 * @package Kappa\Utils
 */
class Math extends Object
{
	/**
	 * @param array $items
	 * @return float
	 */
	public static function average(array $items)
	{
		return array_sum($items) / count($items);
	}

	/**
	 * @param array $items
	 * @return float
	 */
	public static function median(array $items)
	{
		sort($items);
		if (count($items) % 2 == 0) {
			$middle = count($items) / 2;
			$median = self::average(array($items[$middle], $items[$middle - 1]));

			return $median;
		} else {
			$median = floor(count($items) / 2);

			return $median;
		}
	}

	/**
	 * @param array $items
	 * @return mixed
	 */
	public static function modus(array $items)
	{
		$counted = array_count_values($items);
		$max = max($counted);

		return array_search($max, $counted);
	}
}
