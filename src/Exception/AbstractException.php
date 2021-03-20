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

namespace Darkstar\Core\Exception;

use Exception;

/**
 * Class AbstractException
 * @package  Darkstar\Core\Exception
 * @abstract
 */
abstract class AbstractException extends Exception
{
    /**
     * Overrides default SPL exceptions to customize output.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct(string $message, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}