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

use InvalidArgumentException, RuntimeException;

use Darkstar\Ravino\Miner\MinerInterface;
use Darkstar\Ravino\Store\StoreInterface;


final class Blockchain implements BlockchainInterface
{
    /** @var MinerInterface */
    private MinerInterface $miner;

    /** @var StoreInterface */
    private StoreInterface $store;


    public function __construct(MinerInterface $miner, StoreInterface $store, BlockInterface $genesis)
    {
        if (false === $miner->validate($genesis)) {
            throw new InvalidArgumentException(
                sprintf('Genesis block of type "%s" is not a valid type one for this chain', get_class($genesis))
            );
        }

        $this->miner = $miner;
        $this->store = $store;
        $this->store->addBlock($genesis);
    }

    public function addBlock(BlockInterface $block): void
    {
        if (false === $this->miner->validate($block)) {
            throw new InvalidArgumentException(
                sprintf('Block of type "%s" is not supported by this strategy', get_class($block))
            );
        }
        $block->setPreviousHash($this->getBlockLatest()->getHash());

        if (false === $this->miner->mine($block)) {
            throw new RuntimeException(
                sprintf('Could not mine block with hash "%s"', $block->getHash())
            );
        }
        $this->store->addBlock($block);
    }

    public function getBlockLatest(): BlockInterface
    {
        return $this->store->getBlockLatest();
    }

    public function isValid(): bool
    {
        $chainLength = count($this->store);
        for ($i = 0; $i < $chainLength; ++$i) {

            $block = $this->store->getBlock($i);
            if ($block->getHash() !== $block->calculateHash()) {
                return false;
            }
            if (0 === $i) {
                continue;
            }
            $previousBlock = $this->store->getBlock($i-1);
            if ($block->getPreviousHash() !== $previousBlock->getHash()) {
                return false;
            }
        }
        return true;
    }

    public function getIterator(): StoreInterface
    {
        return $this->store;
    }

    public function count()
    {
        return $this->store->count();
    }

    public function getBlock(int $position): BlockInterface
    {
        return $this->store->getBlock($position);
    }
}
