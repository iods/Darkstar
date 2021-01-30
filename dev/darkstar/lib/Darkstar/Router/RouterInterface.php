<?php

namespace Darkstar\Router;

interface RouterInterface {

    /**
     * RouterInterface constructor.
     * @param string $base_path
     */
    public function __construct(string $base_path = '');
}
