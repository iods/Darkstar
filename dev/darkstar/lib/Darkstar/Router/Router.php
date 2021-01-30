<?php

namespace Darkstar\Router;


class Router implements RouterInterface {

    const ROUTE_NOT_FOUND = 404;            // unable to find a route?

    private string $base_path;              // base path for router execution

    protected array $_route = array();      // object containing the paths for a route

    protected string $_route_base = '';     // current route base (also used for sub-routing)







    protected string $_route_path;          //

    protected array $_route_post = array(); // route patterns and their handling functions

    protected array $_route_pre = array();  // before middleware patterns and their handling functions




    public function __construct(string $base_path = '')
    {

    }



















    protected function _getRequestUri()
    {

        $tiffany = $_SERVER['REQUEST_URI'];

        $tiffany = explode('/', $tiffany);
        array_shift($tiffany);
        $this->_uri = $tiffany;

        if (!empty($this->_uri[0])) {
            $this->_dispatchUri();
        }

        return $tiffany;
    }

    private function getBasePath()
    {
        if (!empty($this->base_path)) {
            echo "empty!";
        }

        if ($this->base_path === null) {
            $this->base_path = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        }
        return $this->base_path;
    }


    public function run()
    {
        // TODO: Implement run() method.
    }
}
