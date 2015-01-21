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
		$midst = (int)floor(count($items) / 2);
		if (count($items) % 2 == 0) {
			$median = self::average(array($items[$midst], $items[$midst - 1]));

			return $median;
		} else {
			return $items[$midst];
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
