<?php

namespace Darkstar\Exception;

interface ExceptionInterface {

    // protected methods inherited from \Exception
    public function getCode();           // the User-defined Exception code
    public function getFile();           // the Source filename
    public function getLine();           // the Source line
    public function getMessage();        // the Exception Message
    public function getTrace();          // an array of the backtrace()
    public function getTraceAsString();  // a formatted string of the trace

    public function __toString();
    public function __construct($message = null, $code = 0);
}
