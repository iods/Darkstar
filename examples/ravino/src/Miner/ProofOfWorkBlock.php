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

use Darkstar\Ravino\Block\Block;
use DateTimeImmutable;

/**
 * Class ProofOfWorkBlock
 * @package Darkstar\Ravino
 */
final class ProofOfWorkBlock extends Block implements ProofOfWorkBlockInterface
{
    /** @var integer | null */
    private int|null $nonce;

    /**
     * @param $data
     * @param DateTimeImmutable $time_stamp
     */
    public function __construct($data, DateTimeImmutable $time_stamp)
    {
        parent::__construct($data, $time_stamp);
        $this->nonce = null;
    }

    /**
     * @return integer | null
     */
    public function getNonce(): ?int
    {
        return $this->nonce;
    }

    /**
     * @param integer $nonce
     */
    public function setNonce(int $nonce): void
    {
        $this->nonce = $nonce;
        $this->updateHash();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return parent::__toString() . $this->nonce;
    }
}
