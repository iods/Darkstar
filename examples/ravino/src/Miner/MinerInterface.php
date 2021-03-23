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
 * Interface ProtocolInterface
 * @package Darkstar\Ravino
 */
interface MinerInterface
{
    /**
     * @param BlockInterface $block
     * @return boolean
     */
    public function validate(BlockInterface $block): bool;

    /**
     * @param BlockInterface $block
     * @return boolean
     */
    public function mine(BlockInterface $block): bool;
}
