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
use Darkstar\Http\Response;
use Darkstar\Router\Router;


class TestController {

    public function oneAction(): string
    {
        return 'this is one action to list';
    }

    public function twoAction(): string
    {
        return 'this is another action to list.';
    }
}


/*

$route = new Router;

$route->any('/test', 'TestController@oneAction'); // serve anything (default handler?)

$route->get('/test/:id' 'TestController@oneAction', [
    'require' => [ '::id' => '(\w+)', ],
    'default' => [ '::id' => '1', ]
]);

$route->build();

$r = $route->dispatch('/

var_dump($r);

*/

$route = new Router;

$route->any('get|post', '/test/:id/user/:uid','TestController@oneAction', [
    'option' => 'one',
    'another' => 'two'
]);

$route->dispatch();
