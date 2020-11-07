<?php

namespace App;

use Http\Router;
use App\Controllers\IndexController;
use App\Controllers\ProductsController;

Router::add('/', [IndexController::class, 'index'], 'get');
Router::add('/products', [ProductsController::class, 'index'], 'get');