<?php

namespace Http;

class Router {
    private static $routes = Array();
    
    public static function add($expression, $function, $method) {
        array_push(self::$routes, Array(
            'expression' => $expression, 
            'function' => $function, 
            'method' => $method
        ));
    }
    
    public static function run($basePath = '/') {
        $path = '/';
        $method = 'GET';
        
        // Parse content url
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        
        if(isset($parsed_url['path'])) {
            $path = $parsed_url['path'];
        }
        
        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach(self::$routes as $route) {
            if($basePath != '' && $basePath != '/') {
                $route['expression'] = '('.$basePath.')'.$route['expression'];
            }
            
            $route['expression'] = '^'.$route['expression'].'$';
            
            // If route matches
            if(preg_match('#'.$route['expression'].'#', $path, $matches)) {
                // Check if method match
                if(strtolower($method) == strtolower($route['method'])) {
                    
                    if(is_array($route['function'])){
                        // Instantiate controller
                        $controller = new $route['function'][0];
                        call_user_func_array([$controller, $route['function'][1]], $matches);
                    }
                   
                    break;
                }
            }
        }
    }
}