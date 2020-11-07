<?php

function my_autoloader($className) {
    include dirname(__FILE__) . '\\' . $className . '.php';
}

spl_autoload_register('my_autoloader');

use Http\Router;

include 'App/routes.php';

Router::run();