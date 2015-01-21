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

use Kappa\Utils\Strings;
use Nette;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class StringsTest
 *
 * @package Kappa\Tests\Utils\Strings
 * @author Ondřej Záruba <http://zaruba-ondrej.cz>
 */
class StringsTest extends TestCase
{
	public function testMb_ucfirst()
	{
		Assert::same('Černobyl', Strings::mb_ucfirst('černobyl'));
		Assert::same('Prague', Strings::mb_ucfirst('prague'));
		Assert::throws(function() {
			Strings::mb_ucfirst(array());
		}, 'Kappa\Utils\InvalidArgumentException');
	}
}

\run(new StringsTest());
