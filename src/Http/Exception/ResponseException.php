<?php
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v000.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\Http\Exception;

use Iods\Http\StatusCode;

class ResponseException extends HttpException
{
    private StatusCode $_statusCode;

    private $_response;

    public function setHttpStatusCode($status)
    {
        $this->_statusCode = $status;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message
        ];
    }
}