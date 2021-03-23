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

interface StoreInterface extends Countable
{
    public function addBlock(BlockInterface $block): bool;

    public function getBlock(int $pos): BlockInterface;

    public function getBlockLatest(): BlockInterface;
}
