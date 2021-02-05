<?php

declare(strict_types=1);

namespace Darkstar\Controller;

class Controller extends ControllerAbstract implements ControllerInterface {

    protected array $_route_params;

    public function __construct(array $_route_params)
    {
        $this->_route_params = $_route_params;
    }

    public function __call($name, $ags)
    {
        $method = $name . "Action";

        if (method_exists($this, $method)) {

            if ($this->pre() !== false) {
                call_user_func_array([$this, $method], $ags);
                $this->post();
            }

        }
    }

    protected function pre() {}

    protected function post() {}
}
