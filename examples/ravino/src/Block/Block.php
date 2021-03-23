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
use JsonSerializable;

abstract class Block implements BlockInterface, JsonSerializable
{
    const BLOCK_DATA_LIMIT = 50000;
    const ERROR_LOCKED     = 'No more additional data can be added. Add a new block?';
    const ERROR_FULL       = 'No more space left to store any data. Add a new block?';
    const HASH_ALGORITHM   = 'sha256';
    const LOCKED_FALSE     = false;
    const LOCKED_TRUE      = true;

    /** @var integer */
    private int $difficulty;

    /** @var string */
    private string $hash;

    /** @var integer */
    private int $index;

    /** @var boolean */
    private bool $is_locked = self::LOCKED_FALSE;

    /** @var integer */
    private int $nonce;

    /** @var string */
    private string $previous_hash;

    /** @var integer */
    private int $size_current;

    /** @var integer */
    private int $size_maximum = 300;

    /** @var DateTimeImmutable */
    private DateTimeImmutable $time_stamp;

    /** @var array | []Transactions */
    private array $transactions;

    /** @var mixed */
    protected mixed $_data;


    public function __construct($data, DateTimeImmutable $time_stamp)
    {
        $this->_data = $data;
        $this->time_stamp = $time_stamp;
    }

    /*
     * Constructor
     *
     * 1.
     *
     *
     */







    public static function genesis(): self
    {

    }


    public static function calculateBlockHash(
        int $index, string
    ): string
    {

    }

    public function jsonSerialize(): array
    {
        return [
            $this->_data,
            $this->time_stamp,
            $this->previous_hash,
            $this->hash,
            $this->index,
            $this->difficulty,
            $this->nonce
        ];
    }

    // what is better ?

    /**
     * @return string
     */
    public function __toString(): string
    {
        return serialize($this->_data)
    }
}
