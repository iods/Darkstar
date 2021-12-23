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

use DateTime;
use DateTimeInterface;

class Date implements \JsonSerializable
{
    public ?string $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function fromDateTime(DateTime $value): Date
    {
        return new self($value->format(DateTimeInterface::ISO8601));
    }

    public function asDateTime(): DateTime
    {
        return DateTime::createFromFormat(DateTimeInterface::ISO8601, $this->value);
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}