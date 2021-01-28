<?php

namespace Darkstar\Core\Exception;

class HttpException extends \Exception {

    protected $message = 'You were never here. We will keep this between us.';
    protected $code = 404;
}
