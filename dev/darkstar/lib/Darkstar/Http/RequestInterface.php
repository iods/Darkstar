<?php

namespace Darkstar\Http;

interface RequestInterface {

    public function getUri(): string;

    public function getHeaders(): array;

    public function getRequestAddress(): string;

    public function getRequestHeaders(): array;

    public function getRequestMethod(): string;

    public function getRequestUri(): string;

    public function isHttps(): bool;

    public function getCookies(): array;

    public function getBody(): string;

    public function getJson(): array;
}
