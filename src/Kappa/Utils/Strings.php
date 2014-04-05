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
	public static function mb_ucfirst($string, $encoding)
	{
		if (!is_string($string))
			throw new InvalidArgumentException("Class " . __METHOD__ . " required string as first parameter");
		$first = mb_strtoupper(mb_substr($string, 0, 1, $encoding), 'UTF-8');
		$then = mb_substr($string, 1, strlen($string), $encoding);

		return $first . $then;
	}

	/**
	 * @param string $path
	 * @return string
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function repairPathSeparators($path)
	{
		if (!is_string($path))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' requires string as parameter');
		$patterns = array('\\', '/');

		return (string)str_replace($patterns, DIRECTORY_SEPARATOR, $path);
	}
}
