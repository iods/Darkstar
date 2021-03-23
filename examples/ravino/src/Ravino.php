<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Ravino;

// main class of the blockchain
// builder class, hiding complexity behind SDK/framework
// merge data to block, pass it to the chain

use Darkstar\Framework\Blockchain\Block;
use Darkstar\Framework\Blockchain\Blockchain;

final class Ravino
{
    private Blockchain $ledger;

    private Block $genesis;

    public function __construct()
    {
        $this->ledger = new Blockchain();
        $this->genesis = new Block();

        $this->ledger->addTransaction($this->genesis->getBlock());
    }
}
