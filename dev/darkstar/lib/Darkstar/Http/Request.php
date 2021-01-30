<?php

namespace Darkstar\Http;

class Request implements RequestInterface {

    private string $base_path = '';

    protected string $body;

    protected array $cookies;

    protected array $headers;


    protected string $uri_one;

    protected string $uri_two;

    protected string $uri_three;


    protected string $uri;





    public function __construct()
    {

    }






    /*
     * One way
     */
    public function getUri(): string
    {
        // TODO: pick what option to use.
        $one = $_SERVER['REQUEST_URI'];
        $two = substr(rawurldecode($_SERVER['REQUEST_URI']), strlen('/'));
        $three = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
        if ($one) {
            $this->uri = $one;
        }
        return $this->uri;
    }


    public function getRequestUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        if ($this->base_path == '') {
            $uri = str_replace($this->base_path, '', $uri);
        }
        return $uri;
    }



    public function getRequestMethod(): string
    {
        $request_method = $_SERVER['REQUEST_METHOD'];

        if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
            ob_start();
            $request_method = 'GET';
        }

        return $request_method;
    }


    /*
     * Way One
     */
    public function getHeaders(): array
    {
        $headers = apache_request_headers() === false ? [] : apache_request_headers();
        if ($headers) {
            $this->headers = $headers;
        }
        return $this->headers;
    }

    /*
     * Way Two
     */
    public function getRequestHeaders(): array
    {
        $headers = [];

        if (function_exists('getallheaders')) {
            $headers = getallheaders() === false ? [] : getallheaders();
            if ($headers) {
                return $headers;
            }
        }

        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }

        return $headers;
    }




    public function getRequestAddress(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }


    public function getCookies(): array
    {
        $cookies = $_COOKIE;
        if ($cookies) {
            $this->cookies = $cookies;
        }
        return $cookies;
    }









    public function getBody(): string
    {
        // php://input returns all the raw data after the HTTP-headers of
        // the request, regardless of the content type
        // allows you to use the special php://input address to retrieve JSON data as a string.
        $input = file_get_contents('php://input');
        if ($input) {
            $this->body = $input;
        } else {
            $this->body = '';
        }
        return $this->body;
    }


    public function isHttps(): bool
    {
        return !empty($_SERVER['HTTPS']);
    }


    public function getJson(): array {
        // from getBody() you use json_decode to turn the JSON string into a workable object/array.
        return json_decode($this->body, true);
    }

}
