<?php

class Router {
    public $routes;
    
    public function __construct() {
        $routesPath =  ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    
     // метод получает строку запроса
     private function getUri() {
        if( !empty($_SERVER['REQUEST_URI'])):
            return trim($_SERVER['REQUEST_URI'], '/');
        endif;
     }
     public function run() {
       
        $uri = $this->getUri();
        // проверить наличие строки запроса в routes.php
        foreach($this->routes as $uriPattern => $path):
            // сравниваем uri и urlPattern
            if (preg_match("~$uriPattern~", $uri)):
                //определить какой контроллер и экшн обрабатывают запрос 

                $segments = explode('/', $path);
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                echo $controllerName;
                $actionName = 'action'.ucfirst(array_shift($segments));
                echo $actionName.'<br>';
            endif;
        endforeach;
        //подключаем файл класса контроллера
        $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
        if(file_exists($controllerFile)):
            include_once($controllerFile);
        endif;
        //создать объект , вызвать метод (экшен)
        $controllerObject = new $controllerName;
        print_r($controllerObject);
        $result = $controllerObject->$actionName();
        if($result != null):
            return print_r($result);
        endif;
       
        
    }
}

