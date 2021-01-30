<?php

namespace Darkstar\Http;

interface RequestInterface {

    public function getUri(): string;

    public function getHeader(string $header): string|null;

    public function getHeaders(): array;

    public function getQueryString(): string;

    public function getQueryStringArray(): array;

    public function getRequestAddress(): string;

    public function getRequestHeaders(): array;

    public function getRequestMethod(): string;

    public function getRequestUri(): string;

    //public function hasHeader(string $header): bool;

    public function isHttps(): bool;

    public function getCookies(): array;

    public function getBody(): string;

    public function getJson(): array;
}
