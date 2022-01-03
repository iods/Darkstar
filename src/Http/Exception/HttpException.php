<?php
/**
 * This file is part of the Darkstar PHP SDK.
 *
 * @version v000.1.0 Initial Release
 * @license The MIT License, http://opensource.org/licenses/MIT
 *
 * @filesource
 */
declare(strict_types=1);

namespace Iods\Http\Exception;

use Iods\Base\Exception\BaseException;
use Iods\Http\StatusCode;

class HttpException extends BaseException
{
    public function getStatus(): string
    {
        return StatusCode::$codes[$this->code];
    }
}