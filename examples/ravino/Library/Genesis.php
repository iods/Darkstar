<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Framework\Blockchain;

final class Genesis implements BlockInterface
{
    private Block $block;

    public function __construct()
    {
        $this->block = new Block;
    }

    public function setHash()
    {
        $this->block->hash = Block::HASH_ALGORITHM;
    }

    public function getHash(): Block
    {
        return $this->block;
    }
}
