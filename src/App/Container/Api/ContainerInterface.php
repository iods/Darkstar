<?php
/**
 * This file is part of the Iods PHP SDK.
 *
 * @version 000.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\App\Container\Api;

use Iods\App\Constant;
use Psr\Container\ContainerInterface as PsrContainerInterface;

interface ContainerInterface extends PsrContainerInterface
{
    public function registerProducer(string $key, $producer, string $scope = Constant::SCOPE_PROTOTYPE): void;
}