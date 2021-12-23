<?php
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\Serializer;

class Decimal implements \JsonSerializable
{
    public ?int $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function fromFloat($value): Decimal
    {
        return new self((int) number_format($value, 2, '', ''));
    }

    public function asFloat(): float
    {
        return $this->value / 100;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}