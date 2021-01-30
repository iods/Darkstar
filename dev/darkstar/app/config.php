<?php

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('PS') || define('PS', PATH_SEPARATOR);
defined('ROOT') || define('ROOT', dirname(dirname(__FILE__)));
defined('APP_URL') || define('APP_URL', 'darkstar.local');
defined('APP_ENV') || define('APP_ENV', 'development'); // @TODO add staging, production environments

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

if (APP_ENV == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', ROOT . DS . 'data/log' . DS . 'error.log');
}


$root = $_SERVER['DOCUMENT_ROOT'];

$path = str_replace('\\', '', getcwd());

$base_paths = str_replace($root, '', $path);


return array(
    'base_url' => (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $base_paths . '/',
    'default_method' => 'index',
    'default_project' => 'page',
    'default_project_controller' => 'home',
    'default_project_method' => 'index',
    'application_key' => 123456789,
    'allowed_origin' => '*'
);
