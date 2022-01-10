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

namespace Iods\App\Container;

use Iods\App\Container\Exception\ContainerException;
use Iods\App\Container\Interfaces\ContainerInterface;
use ReflectionClass;
use ReflectionException;

/**
 * Container Class
 * @package Iods\App\Container
 */
class Container implements ContainerInterface
{
    /** @var array */
    private array $_classes;

    /** @var array */
    private array $_configs = [];

    /** @var Container|null $this |null */
    private static ?self $_instance = null;

    /** @var array */
    private array $_instances;

    /** @var array */
    private array $_singletonClasses;

    /**
     * Class Constructor
     */
    private function __construct() { /* Constructor of Container */ }

    /**
     * @return Container
     */
    public static function instance(): Container
    {
        if (!isset(static::$_instance)) {
            static::$_instance = new Container();
            static::$_instance->setInstance(ContainerInterface::class, static::$_instance);
            static::$_instance->setInstance(\Psr\Container\ContainerInterface::class, static::$_instance);
        }
        return static::$_instance;
    }

    /**
     * @param  string $id
     * @return mixed
     * @throws ReflectionException
     */
    public function get(string $id): mixed
    {
        return $this->getInstance($id);
    }

    /**
     * @inheritdoc
     */
    public function getClass(string $key)
    {
        return $this->_classes[$key] ?? null;
    }

    /**
     * @inheritdoc
     */
    public function getConfig(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $config = $this->_configs;
        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                return $default;
            }
            $config = $config[$key];
        }
        return $config;
    }

    /**
     * @inheritdoc
     */
    public function getConfigs(): array
    {
        return $this->_configs;
    }

    /**
     * @param  string $key
     * @return mixed
     * @throws ReflectionException
     */
    public function getInstance(string $key)
    {
        if (isset($this->_instances[$key]))
            return $this->_instances[$key];
        $instance = $this->resolve($key);
        if ($instance && isset($this->_singletonClasses[$key]) && $this->_singletonClasses[$key]) {
            $this->setInstance($key, $instance);
        }
        return $instance;
    }

    /**
     * @param  string $id
     * @return bool
     * @throws ReflectionException
     */
    public function has(string $id): bool
    {
        return !empty($this->getInstance($id));
    }

    /**
     * @inheritdoc
     * @throws ReflectionException
     */
    public function resolve(string $key)
    {
        $class = $this->getClass($key);

        if (!$class) return $this->resolveClass($key);

        if ($class == $key) {
            $instance = $this->resolveClass($key);
            if ($instance) return $instance;
            throw new ContainerException("The {$key} class is itself!.");
        }

        if (is_callable($class)) {

            $instance = $class($this);
            if (!$instance) return null;

            if ($instance == $key) throw new ContainerException("The {$key} class returned itself!");

            if (is_object($instance)) return $instance;

            $class = $instance;
        }

        return $this->getInstance($class);
    }

    /**
     * @inheritdoc
     * @throws ReflectionException
     */
    public function resolveClass(string $class)
    {
        if (!class_exists($class)) return null;

        $reflector = new ReflectionClass($class);

        if (!$reflector->isInstantiable()) throw new ContainerException("Class {$class} is not instantiable!");

        $constructor = $reflector->getConstructor();

        if (!$constructor) return new $class;

        $constructorParams = [];
        $params = $constructor->getParameters();

        foreach ($params as $param) {

            $type = $param->getType();
            if (is_null($type) || (!class_exists($type->getName()) && !interface_exists($type->getName()))) {
                if ($param->isDefaultValueAvailable()) {
                    break;
                }
                return null;
            }

            if ($type->getName() == $class) throw new ContainerException("Class {$class} depends on itself!");

            $instance = $this->getInstance($type->getName());
            if (!$instance) {
                if ($param->isDefaultValueAvailable()) {
                    break;
                }
                return null;
            }

            $constructorParams = $instance;
        }

        return $reflector->newInstanceArgs($constructorParams);
    }

    /**
     * @inheritdoc
     */
    public function setClass(string $key, $class, string $scope = Scope::SCOPE_PROTOTYPE): void
    {
        if (!$class) return;
        $this->_classes[$key] = $class;

        $scope == Scope::SCOPE_SINGLETON && $this->_singletonClasses[$key] = true;
    }

    /**
     * @inheritdoc
     */
    public function setConfig(string $key, $value): void
    {
        $keys = explode('.', $key);
        $duplicates = [];
        $config = &$this->_configs;

        foreach ($keys as $key) {

            if (!is_array($config)) {
                $key = implode('.', $duplicates);
                throw new ContainerException("Config key ({$key}) already exists!");
            }

            if (array_key_exists($key, $config)) {
                $duplicates[] = $key;

                if (is_null($config[$key])) {
                    $key = implode('.', $duplicates);
                    throw new ContainerException("Config key ({$key}) already exists!");
                }

            } else {
                $config[$key] = [];
            }
            $config = &$config[$key];
        }
        $config = $value;
    }

    /**
     * @inheritdoc
     */
    public function setConfigs(array $configs): void
    {
        $this->_configs = $configs;
    }

    /**
     * @inheritdoc
     */
    public function setInstance(string $key, object $instance): void
    {
        $this->_instances[$key] = $instance;
    }

    /**
     * @inheritdoc
     */
    public function setSingleton(string $key, $class): void
    {
        $this->setClass($key, $class, Scope::SCOPE_SINGLETON);
    }
}