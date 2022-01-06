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

use Iods\Http\Exception\ResponseException;

/**
 * Class Response
 * @package Iods\Http
 * @author  Rye Miller <rye@drkstr.dev>
 */
class Response implements ResponseInterface
{
    /** @var string */
    private string $_body;

    /** @var int */
    private int $_errorCode;

    /** @var string */
    private string $_errorMessage;

    /** @var array */
    private array $_headers = [];

    /** @var string */
    private string $_reasonPhrase;

    /** @var StatusCode */
    private StatusCode $_statusCode;

    public function __construct(
        StatusCode $statusCode,
        string $body,
        int $code,
        array $headers,
        int $errorCode = 0,
        string $errorMessage = ""
    ) {
        $this->_body = $body;
        $this->_errorCode = $errorCode;
        $this->_errorMessage = $errorMessage;
        $this->_headers = $headers;
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

    public function json(array $config = array())
    {
        $json = json_decode(
            $this->_body,
            !isset($config['object']) || !$config['object'],
            512,
            $config['options'] ?? 0
        );
        $err = json_last_error();
        if ($err !== JSON_ERROR_NONE) {
            throw new ResponseException();
        }
        return $json;
    }
}