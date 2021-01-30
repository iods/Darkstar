<?php
/**
 * Darkstar PHP Framework
 *
 * A testing and development sandbox for personal projects and GCP work.
 */


if (version_compare(phpversion(), '7.0', '<') === true) {
    exit('Use a supported PHP version.');
}

require '../app/config.php';

include_once '../vendor/autoload.php';

use Darkstar\Http\Request;
use Darkstar\Router\Router;

$temp = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/'));
echo $temp;

echo '<br>';
$uri = substr(rawurldecode($_SERVER['REQUEST_URI']), strlen('/'));
echo $uri;
echo '<br>';

$test = new Router();


$r = new Request();

echo '<pre>';
var_dump($r->getCookies());
echo '</pre>';
echo '<br />';
echo $r->getBody();
echo '<br />';
echo '<pre>';
var_dump($r->getRequestHeaders());
echo '</pre>';
echo '<br />';
if (!$r->isHttps()) {
    echo $r->getRequestUri();
}
