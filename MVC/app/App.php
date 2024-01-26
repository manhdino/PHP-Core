<?php
class App
{
    private $__controller, $__action, $__params, $__routes;
    static public $app;
    function __construct()
    {
        global $routes;
        self::$app = $this;
        $this->__routes = new Route();

        if (!empty($routes['default__controller'])) {
            $this->__controller = $routes['default__controller'];
        }
        if (!empty($routes['default__action'])) {
            $this->__action = $routes['default__action'];
        }
        $this->__params = [];
        $this->handleUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url);
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);
        $urlCheck = '';
        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $value) {
                $urlCheck .= $value . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);
                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/controllers/' . $fileCheck . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
        }
        $urlArr = array_values($urlArr); //Chứ duy nhất 3 phần tử: 0: tên file,1: tên method,2: params truyền vào method đó
        //echo $urlCheck; //đường dẫn đến tên file ở trên
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
            $this->__controller = ucfirst($this->__controller);
        }
        if (empty($urlCheck)) {
            $urlCheck = ucfirst($this->__controller);
        }
        if (file_exists('app/controllers/' . $urlCheck . '.php')) {
            require_once 'controllers/' . $urlCheck . '.php';
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            } else {

                $this->loadErrors();
            }
        } else {

            $this->loadErrors();
        }

        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        $this->__params = array_values($urlArr);

        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadErrors();
        }
    }

    function loadErrors($name = '404', $data = [])
    {
        extract($data);
        require_once 'errors/' . $name . '.php';
    }
}
