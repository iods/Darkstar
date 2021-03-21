<?php declare(strict_types=1);

namespace Darkstar\Congruence\Bootstrap;

class UnitTestBootstrap extends AbstractTestBootstrap
{
    public function addTwo(int $number): int
    {
        return $number + 2;
    }
}