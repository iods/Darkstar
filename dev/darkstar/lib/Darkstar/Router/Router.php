<?php

namespace Darkstar\Router;


use Darkstar\Http\Request;
use Darkstar\Http\ResponseInterface;

class Router implements RouterInterface {


    private string $base_path;              // base path for router execution

    protected string $_exception_handler;

    protected array $_middleware;  //

    protected array $_routes;      // object containing the paths for a route






    public function __construct(string $base_path = '')
    {
        $this->_middleware = [];
        $this->_routes = [];
        $this->_exception_handler = 'This is the exception handler.';
        $this->base_path = $base_path;
    }


    /**
     * @param string          $methods    Request methods to be used with the matched route.
     * @param string          $route      Route path to be executed/matched.
     * @param callable|string $handle     Function handler used for the route path.
     * @param array           $middleware Array of options to be dispatched with the route.
     */
    public function any(string $methods, string $route, callable|string $handle, array $middleware = []): void
    {
        $methods = explode('|', $methods);

        foreach ($methods as $method) {

            if (!isset($this->_routes[strtoupper($method)])) {
                $this->_routes[strtoupper($method)] = [];
            }
            return;
        }



        $routs = [
            $methods,
            $route,
            $handle,
            $middleware
        ];

        echo '<pre>';
        var_dump($routs);
        echo '</pre>';
    }


    public function dispatch(): void
    {
        $request = new Request();
        $method = $request->getRequestMethod();

        echo $method;
    }
}
