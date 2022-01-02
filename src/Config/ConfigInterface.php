<?php
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v000.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\Config;

interface ConfigInterface
{
    public function set(string $key, $value): ConfigInterface; // sets a config value

    public function get(string $key, $default = null); // gets a config value
}