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

use Countable;

use Darkstar\Ravino\Block\BlockInterface;


/**
 * Interface StoreInterface
 * @package Darkstar\Ravino\Store
 */
interface StoreInterface extends Countable
{
    /**
     * @param BlockInterface $block
     * @return bool
     */
    public function addBlock(BlockInterface $block): bool;

    /**
     * @param int $position
     * @return BlockInterface
     */
    public function getBlock(int $position): BlockInterface;

    /**
     * @return BlockInterface
     */
    public function getBlockLatest(): BlockInterface;
}
