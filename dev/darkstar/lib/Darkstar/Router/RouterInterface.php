<?php

namespace Darkstar\Router;

interface RouterInterface {

    public function __construct(string $base_path = '');

    public function any(string $methods, string $route, callable|string $handle, array $middleware): void;

    public function dispatch(): void;
}
