<?php

namespace Darkstar\Http;

interface ResponseInterface {


    public function sendResponse(bool $die = true) : void;

}
