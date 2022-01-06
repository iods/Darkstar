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

trait AbstractContainer
{
    // container of elements
    protected array $_container = [];

    public function toArray(): array
    {
        return $this->_container;
    }

    public function setFromArray(array $data): void
    {
        foreach ($data as $k => $v) {
            $this->_container[$k] = $v;
        }
    }

    public function resetArray(): void
    {
        foreach ($this->_container as &$value) {
            $value = null;
        }
    }

    protected function _doGetContainer(string $key)
    {
        if ($this->_doContainsContainer($key)) {
            return $this->_container[$key];
        }
        return null;
    }

    protected function _doSetContainer(string $key, $value): void
    {
        $this->_container[$key] = $value;
    }

    protected function _doRemoveContainer(string $key): void
    {
        unset($this->_container[$key]);
    }

    protected function _doContainsContainer(string $key): bool
    {
        return array_key_exists($key, $this->_container);
    }
}