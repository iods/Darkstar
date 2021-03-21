<?php declare(strict_types=1);

namespace Darkstar\Congruence\Bootstrap;

class FunctionalTestBootstrap extends AbstractTestBootstrap
{
    public function addOne(int $number): int
    {
        return $number + 1;
    }
}