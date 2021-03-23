<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino\Block;

use Countable, IteratorAggregate;

use Darkstar\Ravino\Store\StoreInterface;


interface BlockchainInterface extends IteratorAggregate, Countable
{
    // add a new block to the chain
    public function addBlock(BlockInterface $block): void;

    // returns a block at the position specified
    public function getBlock(int $position): BlockInterface;

    // returns the latest block within the chain
    public function getBlockLatest(): BlockInterface;

    // checks if the blockchain is in valid state
    public function isValid(): bool;

    // returns an iterator to iterate through the blocks
    public function getIterator(): StoreInterface;
}
