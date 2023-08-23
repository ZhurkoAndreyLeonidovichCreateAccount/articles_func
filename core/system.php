<?php

    function checkControllerName(string $name){
        return !!preg_match('/^[a-zA-Z0-9-\/]+$/', $name);
    }

    function template(string $path, array $vars = []):string  {

        $systemPath = "views/$path.php";
        //var_dump($systemPath . " template");
        extract($vars);
        ob_start();
        include($systemPath);
        return ob_get_clean();

    }

    function extractFields(array $target, array $fields):array{
        $res = [];
        foreach($fields as $field){
            $res[$field] = trim($target[$field]);
        }
        return $res;
    }

    function parseUrl(string $url, array $routes) : array{
        $res = [
            'controller' => 'errors/e404',
            'params' => []
        ];
        foreach($routes as $route){
            $matches = [];
            if(preg_match($route['test'], $url, $matches)){
                
                $res['controller'] = $route['controller'];
                foreach ($route['params'] as $name => $num) {
                   $res['params'][$name] = $matches[$num]; 
                }

                break;
            }
        }

        return $res;
    }
?>