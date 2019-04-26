<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    //Функция для получения строки запроса
    public function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //записываем в $uri строку запроса
        $uri = $this->getUri();

        //Проверяем, есть ли $uri в routes.php, проходя по нему циклом
        foreach ($this->routes as $uriPattern => $path) {

            //Сравниваем UriPattern (запись  в роуте) и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                //Получаем внутренний путь
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Разделяем путь на части, для того чтоб использовать их.
                $segments = explode('/', $internalRoute);

                //Формируем имя контрллера
                $controllerName = ucfirst(array_shift($segments) . 'Controller');

                //Формируем имя метода (экшена)
                $actionName = 'action' . ucfirst(array_shift($segments));

                //Добавляем параметр, при наличии
                $parameters = $segments;

                //Подключаем файл класса контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                //Создаем объект, вызываем метод action
                $controllerObject = new $controllerName;

                //$result = call_user_func(array($controllerObject, $actionName));

                //Используем функцию обратного вызова для инициализации контроллера, экшена и параметров, при наличии
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                //Останавливаем цикл
                if ($result != null) {
                    break;
                }
            }
        }
    }
}