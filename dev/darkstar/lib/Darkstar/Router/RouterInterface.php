<?php

namespace Darkstar\Router;

interface RouterInterface {

    /** @param string $base_path */
    public function __construct(string $base_path = '');

}
