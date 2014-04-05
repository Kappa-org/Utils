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

}

\run(new StringsTest());