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

interface BlockInterface
{
    // getHash
    // getTimestamp

    /**
     * Returns the a new (immutable), custom timestamp object
     * @return \DateTimeImmutable
     */
    //public function getTimestamp(): \DateTimeImmutable;

    // getPreviousHash
    // getData
    // setPreviousHash
    // updateHash
    // calculateHash

    /**
     * Returns a string representation of the block for calculating a hash
     * @return string
     */
    public function __toString(): string;
}
