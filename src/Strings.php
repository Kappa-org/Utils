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
 * Class Strings
 * @package Kappa\Utils
 */
class Strings extends \Nette\Utils\Strings
{
	/**
	 * @param string $string
	 * @param string $encoding
	 * @return string
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function mb_ucfirst($string, $encoding = 'UTF-8')
	{
		if (!is_string($string)) {
			throw new InvalidArgumentException("Class " . __METHOD__ . " required string as first parameter");
		}
		$first = mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding);
		$then = mb_substr($string, 1, strlen($string), $encoding);

		return $first . $then;
	}
}
