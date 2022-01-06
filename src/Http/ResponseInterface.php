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

/**
 * Interface ResponseInterface
 * Represents an outgoing, server-side response to a request.
 * @package Iods\Http
 * @author  Rye Miller <rye@drkstr.dev>
 */
interface ResponseInterface
{
    /**
     * Returns the body of the message.
     * @return string
     */
    public function getBody(): string;

    /**
     * Returns the headers of the request.
     * @return array
     */
    // public function getHeaders(): array;

    /**
     * @param array $config
     * @return mixed
     */
    public function json(array $config = array());

    /**
     * Returns the result (status code) for satisfying a request.
     * @return StatusCode The status code.
     */
    public function getStatusCode(): StatusCode;

    /**
     * Returns the phrase associated with the status codes response.
     * @return string Status code phrase; empty if none present.
     */
    public function getStatusCodePhrase(): string;
}