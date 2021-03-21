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

use Darkstar\Congruence\Bootstrap\IntegrationTestBootstrap,
    PHPUnit\Framework\TestCase;

/**
 * Class CongruenceIntegrationTest
 * @package Tests
 */
class CongruenceIntegrationTest extends TestCase
{
    /**
     * @covers ::testReturnAsExpected
     */
    public function testReturnAsExpected(): void
    {
        $test = new IntegrationTestBootstrap;

        $result = $test->returnValue();
        $this->assertEquals('hello', $result);
    }
}