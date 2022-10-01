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

namespace Iods\Base\Exception;

use Iods\Exception\AbstractException;
use Iods\Exception\ExceptionInterface;
use Iods\Http\StatusCode;

/**
 * Class BaseException
 * Base or default Exception class for the Iods PHP Framework.
 * @package Iods\Base\Exception
 * @author  Rye Miller <rye@drkstr.dev>
 */
class BaseException extends AbstractException implements ExceptionInterface
{
    protected $code = StatusCode::INTERNAL_SERVER_ERROR;
}