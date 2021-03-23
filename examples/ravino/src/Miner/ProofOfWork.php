<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino\Miner;

use Darkstar\Ravino\Block\BlockInterface;


/**
 * Class ProofOfWork
 * @package Darkstar\Ravino\Miner
 */
final class ProofOfWork implements MinerInterface
{
    private int $difficulty;

    /**
     * ProofOfWork constructor.
     * @param int $difficulty
     */
    public function __construct(int $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @param BlockInterface $block
     * @return bool
     */
    public function mine(BlockInterface $block): bool
    {
        $prefix = str_repeat('0', $this->difficulty);

        while(substr($block->getHash(), 0, $this->difficulty) != $prefix) {
            $block->setNonce($block->getNonce() + 1);
        }

        return true;
    }

    /**
     * @param BlockInterface $block
     * @return bool
     */
    public function validate(BlockInterface $block): bool
    {
        return $block instanceof ProofOfWorkBlockInterface;
    }
}
