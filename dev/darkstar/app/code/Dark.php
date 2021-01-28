<?php

$uri = $_SERVER['HTTP_HOST'];

defined('ROOT_DIRECTORY') || define('ROOT_DIRECTORY', __DIR__);  # Root Directory for Application
defined('DARK_APP') || define('DARK_APP', true);                 # State of the application
defined('BASE_URL') || define('BASE_URL', 'http://' . $uri);     # Set the application base url

