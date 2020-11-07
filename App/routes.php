<?php

namespace App;

use Http\Router;
use App\Controllers\Index;

Router::add('/', [Index::class, 'index'], 'get');