<?php declare(strict_types=1);

namespace Darkstar\Congruence\Bootstrap;

class IntegrationTestBootstrap extends AbstractTestBootstrap
{
    public function returnValue(): string
    {
        return 'hello';
    }
}