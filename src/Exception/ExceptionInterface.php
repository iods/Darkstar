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
 * Interface ExceptionInterface
 * @package Darkstar\Core\Exception
 */
interface ExceptionInterface {

    // protected methods inherited from \Exception
    public function getCode();           // the User-defined Exception code
    public function getFile();           // the Source filename
    public function getLine();           // the Source line
    public function getMessage();        // the Exception Message
    public function getTrace();          // an array of the backtrace()
    public function getTraceAsString();  // a formatted string of the trace

    public function __toString();
    public function __construct($message = null, $code = 0, Exception $previous = null);
}