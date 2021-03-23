<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino\Store;


/**
 * Class AbstractStore
 * @package Darkstar\Ravino
 */
abstract class AbstractStore implements StoreInterface
{
    /**
     * @param int $position
     * @return bool
     */
    abstract protected function isPositionValid(int $position): bool;
}
