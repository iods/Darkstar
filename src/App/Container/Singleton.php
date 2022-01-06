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

namespace Iods;

/**
 * Class Singleton
 * Extending classes must have protected static field $instance
 * @package Iods
 */
abstract class Singleton
{
    protected function __construct() {} // hidden constructor

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        if (!(static::$instance instanceof static)) {
            throw new \RuntimeException('Wrong static instance of a singleton class.');
        }

        return static::$instance;
    }
}