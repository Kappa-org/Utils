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

namespace Kappa\Tests\Utils\Strings;

use Kappa\Tester\TestCase;
use Kappa\Utils\Strings;
use Nette;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class StringsTest
 * @package Kappa\Tests\Utils\Strings
 */
class StringsTest extends TestCase
{
	public function testRepairPathSeparators()
	{
		Assert::same("D:" . DIRECTORY_SEPARATOR . "Some" . DIRECTORY_SEPARATOR . "Path" . DIRECTORY_SEPARATOR . "With" . DIRECTORY_SEPARATOR . "Some" . DIRECTORY_SEPARATOR . "File" . DIRECTORY_SEPARATOR . "Other" . DIRECTORY_SEPARATOR . "file.txt", Strings::repairPathSeparators("D:/Some\\Path/With\\Some\\File/Other/file.txt"));
		Assert::throws(function () {
			Strings::repairPathSeparators(array());
		}, '\Kappa\Utils\InvalidArgumentException');
		Assert::throws(function () {
			Strings::repairPathSeparators(new \stdClass());
		}, '\Kappa\Utils\InvalidArgumentException');
	}
}

\run(new StringsTest());