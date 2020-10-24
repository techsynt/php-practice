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
                //получаем внутренний путь
                $internalPath = preg_replace("~$uriPattern~", $path, $uri);
                //определить какой контроллер и экшн обрабатывают запрос 
                $segments = explode('/', $internalPath);
                $controllerName = ucfirst(array_shift($segments)).'Controller';  
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;
            endif;
        endforeach;
        
        
        //подключаем файл класса контроллера
        $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
        if(file_exists($controllerFile)):
            include_once($controllerFile);
        endif;
        
        
        //создать объект , вызвать метод (экшен)
        $controllerObject = new $controllerName;
        $result = call_user_func_array(array($controllerObject, $actionName), 
            $parameters);
        if($result != null):
            return ;
        endif;
       
        
    }
}

