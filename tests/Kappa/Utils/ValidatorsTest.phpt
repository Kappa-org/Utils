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

namespace Kappa\Tests\Validators;

use Kappa\Utils\Validators;
use Nette;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class ValidatorsTest
 *
 * @package Kappa\Tests\Validators
 * @author Ondřej Záruba <http://zaruba-ondrej.cz>
 */
class ValidatorsTest extends TestCase
{
	public function testIsImage()
	{
		$image = __DIR__ . '/../../data/images/PHP-logo.png';
		$file = __DIR__ . '/../../data/files/test.php';
		$brokenImage = __DIR__ . '/../../data/images/broken-img.jpg';
		Assert::true(Validators::isImage($image));
		Assert::false(Validators::isImage($file));
		Assert::false(Validators::isImage($brokenImage));
		Assert::throws(function () {
			Validators::isImage('test');
		}, '\Kappa\Utils\InvalidArgumentException');
	}

	public function testIsConnected()
	{
		Assert::true(Validators::isConnected("http://google.com"));
		Assert::true(Validators::isConnected("http://example.com"));
		Assert::false(Validators::isConnected("http://..com"));
		Assert::throws(function () {
			Validators::isConnected(5);
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () {
			Validators::isConnected(array("http://google.com"));
		}, '\Kappa\Utils\InvalidArgumentException');
	}

	public function testCheckHttpStatus()
	{
		Assert::false(Validators::checkHttpStatus("http://google.com", 404));
		Assert::false(Validators::checkHttpStatus("http://google.com", array(404, 500, 505)));
		Assert::true(Validators::checkHttpStatus("http://google.com", array(200, 301, 302, 304)));
		Assert::throws(function () {
			Validators::checkHttpStatus(5, 200);
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () {
			Validators::checkHttpStatus(array('test'), 200);
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () {
			Validators::checkHttpStatus("http://google.com", "Hello");
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () {
			Validators::checkHttpStatus("http://google.com", "300");
		}, '\Kappa\Utils\InvalidArgumentException');
	}
}

\run(new ValidatorsTest());
