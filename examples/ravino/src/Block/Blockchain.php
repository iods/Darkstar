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

final class Blockchain implements BlockchainInterface
{
    public function __construct(BlockInterface $genesis)
    {
        if (!$genesis) {
            echo "Does not exist bro.";
        }
    }
}
