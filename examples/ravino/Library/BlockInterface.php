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

/**
 * Interface BlockInterface
 * @package Darkstar\Framework\Blockchain
 */
interface BlockInterface
{
    public function setHash();
    public function getHash();
}
