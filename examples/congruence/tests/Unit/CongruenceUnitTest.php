<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Tests;

use Darkstar\Congruence\Bootstrap\UnitTestBootstrap,
    PHPUnit\Framework\TestCase;

/**
 * Class CongruenceUnitTest
 * @package Tests
 */
class CongruenceUnitTest extends TestCase
{
    /**
     * @covers ::testAddTwoToInteger
     */
    public function testAddTwoToInteger(): void
    {
        $test = new UnitTestBootstrap();

        $num = rand(1, 100);
        $result = $test->addTwo($num);
        $this->assertEquals($num + 2, $result);
    }
}