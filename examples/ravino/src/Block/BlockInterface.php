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

use DateTimeImmutable;

/**
 * Interface BlockInterface
 * @package Darkstar\Ravino
 */
interface BlockInterface
{
    // return the hash of the current block
    public function getHash(): string;

    /**
     * Returns the a new (immutable), custom timestamp object
     * @return DateTimeImmutable
     */
    public function getTimestamp(): DateTimeImmutable;

    // get the previous block it is linked to hash and store
    public function getPreviousHash(): ?string;

    // return the stored data from within the block
    // @TODO is this an array instead?
    public function getData(): mixed;

    // sets the previous hash linking to the block calling it
    public function setPreviousHash(string $previous_hash): void;

    // update the hash/array of this block
    public function updateHash(): void;

    // calculate the blocks hash using the ravino algorithm
    public function calculateHash(): string;

    /**
     * Returns a string representation of the block for calculating a hash
     * @return string
     */
    public function __toString(): string;
}
