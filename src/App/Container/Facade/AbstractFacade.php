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

namespace Iods\App\Container\Facade;

use RuntimeException;
use Iods\App\Container\Container;
use ReflectionException;

abstract class AbstractFacade
{
    private static $_processor = null;

    /**
     * @throws ReflectionException
     */
    public static function __callStatic(string $method, array $parameters)
    {
        $processor = static::getProcessor();
        if (!static::$_processor) {
            static::$_processor = is_object($processor) ? $processor : Container::instance()->getInstance($processor);
        }

        if (!static::$_processor) {
            throw new RuntimeException("Processor {$processor} not exists!");
        }

        return static::$_processor->{$method}(...$parameters);
    }

    abstract protected static function getProcessor();
}