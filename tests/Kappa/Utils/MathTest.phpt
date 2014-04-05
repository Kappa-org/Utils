<?php
/**
 * This file is part of the Kappa\Utils package.
 *
 * (c) Ondřej Záruba <zarubaondra@gmail.com>
 *
 * For the full copyright and license information, please view the license.md
 * file that was distributed with this source code.
 * 
 * @testCase
 */

namespace Kappa\Utils\Tests;

use Kappa\Tester\TestCase;
use Kappa\Utils\Math;
use Tester\Assert;

require_once __DIR__ . '/../bootstrap.php';

class MathTest extends TestCase
{
	public function testModus()
	{
		Assert::same(7, Math::modus(array(1,2,3,4,4,5,6,7,7,7,8)));
	}
}

\run(new MathTest());