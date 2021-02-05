<?php

namespace Darkstar\Http;

class Response implements ResponseInterface {

    protected string $body;

    protected array $cookies;

    protected array $headers;

    protected int $status;

    public function __construct()
    {

    }


    public function buildResponse(array|object|string $body = '', int $status = 200)
    {
        if (is_string($body)) {
            $this->body = $body;
        } elseif (is_array($body) || is_object($body)) {
            $this->body = json_encode($body);
        }
    }






    public function sendResponse(bool $die = true): void
    {
        $new = ($die) ? 'false' : 'true';

        echo $new;
    }




}

