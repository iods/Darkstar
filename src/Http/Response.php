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

namespace Iods\Http;

class Response implements ResponseInterface
{
    private string $_body;

    private string $_reasonPhrase;

    private StatusCode $_statusCode;

    public function __construct(
        string $body,
        int $code,
        StatusCode $statusCode
    ) {
        $this->_body = $body;
        $this->_statusCode = $statusCode;

        if (isset($this->_statusCode[$code])) {
            $this->_reasonPhrase = $this->_statusCode[$code];
        } else {
            $this->_reasonPhrase = '';
        }
    }

    public function getBody(): string
    {
        return $this->_body;
    }

    public function getStatusCode(): StatusCode
    {
        return $this->_statusCode;
    }

    public function getStatusCodePhrase(): string
    {
        return $this->_reasonPhrase;
    }
}