<?php

namespace Darkstar\Http;

interface RequestInterface {

    public function getBody(): string;

    public function getCookie(string $cookie): string|null;

    public function getCookies(): array;

    public function getHeader(string $header): string|null;

    public function getHeaders(): array;

    public function getJson(): array;

    public function getQuery(string $query): string|null;

    public function getQueryString(): string;

    public function getQueryStringArray(): array;

    public function getRequestAddress(): string;

    public function getRequestHeaders(): array;

    public function getRequestMethod(): string;

    public function getRequestUri(): string;

    public function getUri(): string;

    public function getUriEncoded(): array;

    //public function hasHeader(string $header): bool;

    public function isCookie(string $cookie): bool;

    public function isHttps(): bool;

    public function isHeader(string $header): bool;

    public function isQuery(string $query): bool;
}
