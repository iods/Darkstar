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

namespace Iods\App\Container\Interfaces;

use Iods\App\Container\Scope;

/**
 * Container Interface
 * @package Iods\App\Container\Interfaces
 */
interface ContainerInterface extends \Psr\Container\ContainerInterface
{
    /**
     * @param  string $key
     * @return mixed
     */
    public function getClass(string $key);

    /**
     * Returns an individual config from ...
     * @param  string $key
     * @param  null   $default
     * @return mixed
     */
    public function getConfig(string $key, $default = null);

    /**
     * Returns all configs.
     * @return array
     */
    public function getConfigs(): array;

    /**
     * Registers the Class or Closure (producer).
     * @param  string $key
     * @param  mixed  $class
     * @param  string $scope
     * @return void
     */
    public function setClass(string $key, $class, string $scope = Scope::SCOPE_PROTOTYPE): void;

    /**
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public function setConfig(string $key, $value): void;

    /**
     * @param  array $configs
     * @return void
     */
    public function setConfigs(array $configs): void;

    /**
     * @param  string $key
     * @param  object $instance
     * @return void
     */
    public function setInstance(string $key, object $instance): void;

    /**
     * @param  string $key
     * @param  mixed  $class
     * @return void
     */
    public function setSingleton(string $key, $class): void;

    /**
     * @param  string $key
     * @return mixed
     */
    public function resolve(string $key);

    /**
     * @param  string $class
     * @return mixed
     */
    public function resolveClass(string $class);
}