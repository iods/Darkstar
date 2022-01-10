<?php
/**
 * This file is part of the Iods PHP SDK.
 *
 * @version 000.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\Tests;

use Iods\App\Container\Container;
use Iods\App\Container\Exception\ContainerException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

abstract class Alpha {}

class Beta extends Alpha {}

class A {}

class B {
    public function __construct(A $a) {}
}

class C {
    public function __construct(B $b, int $a = 123) {}
}

class D {
    public function __construct(A $a, Alpha $b) {}
}

class ContainerTest extends TestCase
{
    /**
     * @covers \Iods\App\Container\Container::setClass
     * @covers \Iods\App\Container\Container::get
     * @throws ReflectionException
     */
    public function testGet()
    {
        $container = Container::instance();
        $container->setClass('a_class', A::class);
        $this->assertInstanceOf(A::class, $container->get('a_class'));
    }

    /**
     * @covers \Iods\App\Container\Container::setClass
     * @covers \Iods\App\Container\Container::getClass
     */
    public function testGetClass()
    {
        $container = Container::instance();
        $container->setClass(A::class, A::class);
        $container->setClass('b_class', fn() => B::class);
        $this->assertEquals(A::class, $container->getClass(A::class));
        $this->assertIsCallable($container->getClass('b_class'));
    }

    /**
     * @covers \Iods\App\Container\Container::setConfig
     * @covers \Iods\App\Container\Container::getConfigs
     */
    public function testGetConfigs()
    {
        $container = Container::instance();
        $container->setConfig('a', 'b');

        $this->assertEquals(['a' => 'b'], $container->getConfigs());
    }

    /**
     * @covers \Iods\App\Container\Container::setClass
     * @covers \Iods\App\Container\Container::has
     * @throws ReflectionException
     */
    public function testHas()
    {
        $container = Container::instance();
        $container->setClass('a_class', A::class);
        $this->assertTrue($container->has('a_class'));
    }

    /**
     * @covers \Iods\App\Container\Container::setClass
     * @covers \Iods\App\Container\Container::resolve
     * @throws ReflectionException
     */
    public function testResolve()
    {
        $container = Container::instance();
        $container->setClass('a', function () {
            return new A();
        });
        $this->assertInstanceOf(A::class, $container->resolve('a'));
        $this->assertInstanceOf(A::class, $container->resolve(A::class));
        $this->assertInstanceOf(C::class, $container->resolve(C::class));
        $this->assertInstanceOf(A::class, \Iods\App\Container\Facade\Container::resolve('a'));
        $this->assertInstanceOf(A::class, \Iods\App\Container\Facade\Container::resolve(A::class));
        $this->assertInstanceOf(C::class, \Iods\App\Container\Facade\Container::resolve(C::class));
        $this->expectException(ContainerException::class);
        $container->resolve(D::class);
    }

    /**
     * @covers \Iods\App\Container\Container::resolveClass
     * @covers \Iods\App\Container\Container::setInstance
     * @covers \Iods\App\Container\Container::resolve
     * @throws ReflectionException
     */
    public function testResolveClass()
    {
        $container = Container::instance();
        $container->setInstance(Alpha::class, $container->resolveClass(Beta::class));
        $this->assertInstanceOf(D::class, $container->resolve(D::class));
    }

    /**
     * @covers \Iods\App\Container\Container::setClass
     * @covers \Iods\App\Container\Container::getInstance
     * @covers \Iods\App\Container\Container::resolve
     * @throws ReflectionException
     */
    public function testSetClass()
    {
        $container = Container::instance();
        $container->setClass('a', function () {
            return new A();
        });
        $container->setClass('a', fn() => 'b');
        $container->setClass('b', 'c');
        $container->setClass('c', A::class);
        $this->assertInstanceOf(A::class, $container->getInstance('a'));
        $this->assertInstanceOf(B::class, $container->getInstance('b'));
        $this->assertInstanceOf(B::class, $container->resolve(B::class));
    }

    /**
     * @covers \Iods\App\Container\Container::setConfig
     * @covers \Iods\App\Container\Container::getConfig
     */
    public function testSetConfig()
    {
        $container = Container::instance();
        $container->setConfig('a', 'b');
        $container->setConfig('b.c.d', 'e');
        $this->assertEquals('b', $container->getConfig('a'));
        $this->assertEquals('e', $container->getConfig('b.c.d'));
        $this->assertEquals(['c' => ['d' => 'e']], $container->getConfig('b'));
    }

    /**
     * @covers \Iods\App\Container\Container::setConfigs
     * @covers \Iods\App\Container\Container::getConfig
     */
    public function testSetConfigs()
    {
        $container = Container::instance();
        $container->setConfigs(['a' => 'b']);
        $this->assertEquals('b', $container->getConfig('a'));
        $this->assertEquals(null, $container->getConfig('b'));
    }

    /**
     * @covers \Iods\App\Container\Container::setInstance
     * @covers \Iods\App\Container\Container::getInstance
     * @throws ReflectionException
     */
    public function testSetInstance()
    {
        $container = Container::instance();
        $container->setInstance('a', new A());
        $this->assertInstanceOf(A::class, $container->getInstance('a'));
        $this->assertInstanceOf(A::class, \Iods\App\Container\Facade\Container::getInstance('a'));
    }

    /**
     * @covers \Iods\App\Container\Container::setSingleton
     * @covers \Iods\App\Container\Container::getInstance
     * @throws ReflectionException
     */
    public function testSetSingleton()
    {
        $container = Container::instance();
        $container->setSingleton('b_class', fn() => new B(new A()));
        $this->assertEquals(spl_object_hash($container->getInstance('b_class')), spl_object_hash($container->getInstance('b_class')));
    }
}