<?php

namespace Darkstar\Exception;

use Exception;
use Throwable;

class CustomException extends Exception implements ExceptionInterface {

    protected $message = 'Unknown Exception.';  // the Exception Message
    private string $debug_message;              // the User-defined string of something
    protected $code = 0;                        // the User-defined Exception Code
    protected $file;                            // the Source filename of the Exception
    private $trace;                             // the

    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown ' . get_class($this));
        }
        parent::__construct($message, $code);
    }
}
