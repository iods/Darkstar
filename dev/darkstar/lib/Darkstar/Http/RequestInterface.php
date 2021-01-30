<?php

namespace Darkstar\Http;

interface RequestInterface {

    public function getUri(): string;

    public function getRequestUri(): string;

    public function getHeaders(): array;

    public function getRequestHeaders(): array;

    public function getRequestAddress(): string;

    public function isHttps(): bool;

    public function getCookies(): array;

    public function getBody(): string;

    public function getJson(): array;
}
