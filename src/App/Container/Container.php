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

namespace Iods\App\Container;

use ArrayAccess;
use Closure;
use Countable;

class Container implements ArrayAccess, Countable
{
    protected array $_bind = [];

    protected static ?Container $_instance = null;

    protected array $_instances;

    public function instance(string $bindTag, $instance): void
    {
        if (is_object($instance) && (!$instance instanceof Closure)) {
            $this->_instances[$bindTag] = $instance;
        }
    }

    public static function getInstance(): Container
    {
        if (!static::$_instance instanceof Container) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }


}