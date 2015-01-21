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
 * Class Validators
 *
 * @package Kappa\Utils
 * @author Ondřej Záruba <http://zaruba-ondrej.cz>
 */
class Validators extends \Nette\Utils\Validators
{
	/** @var array */
	private static $imageMimeTypes = array(
		'image/bmp',
		'image/gif',
		'image/jpeg',
		'image/png',
	);

	/**
	 * @param string $image
	 * @return bool
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function isImage($image)
	{
		if (!is_string($image))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' require argument in string format');
		if (!file_exists($image))
			throw new InvalidArgumentException('Class ' . __METHOD__ . ' required path to exist file');
		try {
			$imageInfo = @getimagesize($image);
		} catch (\Exception $e) {
			return false;
		}
		if (in_array($imageInfo['mime'], self::$imageMimeTypes)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param string $url
	 * @param integer|array $codes
	 * @return bool
	 * @throws \Kappa\Utils\InvalidArgumentException
	 */
	public static function checkHttpStatus($url, $codes)
	{
		if (!is_string($url))
			throw new InvalidArgumentException("Class " . __METHOD__ . " error! Required string as parameter");
		if (!is_integer($codes) && !is_array($codes))
			throw new InvalidArgumentException("Class " . __METHOD__ . " requires array, string or numeric as second parameter");
		$header = @get_headers($url);
		preg_match('#HTTP/\d.\d ([0-9]*)#', $header[0], $code);
		if (isset($code[1])) {
			if (is_array($codes) && in_array($code[1], $codes)) {
				return true;
			} else {
				if ($code[1] == $codes) {
					return true;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	/**
	 * @param string $url
	 * @return bool
	 */
	public static function isConnected($url)
	{
		return self::checkHttpStatus($url, array(200, 301, 302));
	}
}
