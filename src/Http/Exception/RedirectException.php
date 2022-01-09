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

use Iods\Http\StatusCode;

class RedirectException extends HttpException
{
    protected $code = StatusCode::FOUND;

    protected string $_url;

    // sets the URL to redirect to
    public function setUrl(string $url): void
    {
        $this->_url = $url;
    }

    public function getUrl(): string
    {
        return $this->_url;
    }
}