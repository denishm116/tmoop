<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

//Получаем строку запроса
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');

        }
    }

    public function run()
    {
        //Получить строку запроса
        $uri = $this->getUri();

        //Проврить, есть ли она в Routes.php
        foreach ($this->routes as $uriPattern => $path) {

            //Сравниваем UriPattern and $uri
            if (preg_match("~$uriPattern~", $uri)) {

                //Получаем внутренний путь
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Определение контроллера,  Actionа, параметров
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments) . 'Controller');


                $actionName = 'action' . ucfirst(array_shift($segments));



                $parameters = $segments;


                //Подключаем файл класса контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';


                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                //Создаем объект, вызываем метод action
                $controllerObject = new $controllerName;
//                $result = call_user_func(array($controllerObject, $actionName));
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }

            }

        }
    }
}