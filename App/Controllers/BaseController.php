<?php

namespace App\Controllers;

class BaseController {
    protected static function render($view, $data) {
        extract($data);
        require('App\\Views\\' . $view . '.php');
    }
}