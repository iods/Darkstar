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

use Darkstar\Congruence\Bootstrap\FunctionalTestBootstrap,
    PHPUnit\Framework\TestCase;

/**
 * Class CongruenceFunctionalTest
 * @package Tests
 */
class CongruenceFunctionalTest extends TestCase
{
    /**
     * @covers ::testAddOneToInteger
     */
    public function testAddOneToInteger(): void
    {
        $test = new FunctionalTestBootstrap;

        $num = rand(1, 100);
        $result = $test->addOne($num);
        $this->assertEquals($num + 1, $result);
    }
}