<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino\Store\Platform;

use OutOfBoundsException;

use Darkstar\Ravino\Store\AbstractStore;
use Darkstar\Ravino\Block\BlockInterface;


/**
 * Class StoreInMemory
 * @package Darkstar\Ravino
 */
final class StoreInMemory extends AbstractStore
{
    /** @var array */
    private array $chain;

    /**
     * @param BlockInterface $block
     * @return boolean
     */
    public function addBlock(BlockInterface $block): bool
    {
        $this->chain[] = $block;
        return true;
    }

    /**
     * @param int $position
     * @return BlockInterface
     * @throws OutOfBoundsException
     */
    public function getBlock(int $position): BlockInterface
    {
        if (false === $this->isPositionValid($position)) {
            throw new OutOfBoundsException("Block no exist", $position);
        }
        return $this->chain[$position];
    }

    /**
     * @return BlockInterface
     */
    public function getBlockLatest(): BlockInterface
    {
        return end($this->chain);
    }

    /**
     * Returns total count of elements in an object
     * @return integer Total count as integer, return value cast to integer
     */
    public function count(): int
    {
        return count($this->chain);
    }

    /**
     * @param int $position
     * @return bool
     */
    protected function isPositionValid(int $position): bool
    {
        return isset($this->chain[$position]);
    }
}
