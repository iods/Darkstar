<?php declare(strict_types=1);
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v0.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
namespace Darkstar\Framework\Exception;

use Exception;

/**
 * Class AbstractException
 * @package Darkstar\Framework\Exception
 */
abstract class AbstractException extends Exception
{
    public function __construct(string $message, $code = 0, Exception $cause = null)
    {
        parent::__construct($message, (int)$code, $cause);
    }
}