<?php
/**
 * This file is part of the Iods PHP SDK.
 *
 * @version 000.1.2 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\App\Container\Facade;

use Iods\App\Container\Container as BaseContainer;
use Iods\App\Container\Scope;

/**
 * @method static get(string $id)
 * @method static getClass(string $key)
 * @method static getConfig(string $key, $default = null)
 * @method static getConfigs()
 * @method static getInstance(string $key)
 * @method static has(string $id)
 * @method static setClass(string $key, $class, string $scope = Scope::SCOPE_PROTOTYPE)
 * @method static setConfig(string $key, $value)
 * @method static setConfigs(array $configs)
 * @method static setInstance(string $key, object $instance)
 * @method static setSingleton(string $key, $class)
 * @method static resolve(string $key)
 * @method static resolveClass(string $class)
 * @see \Iods\App\Container\Container
 */
class Container extends AbstractFacade
{
    protected static function getProcessor(): BaseContainer
    {
        return BaseContainer::instance();
    }
}