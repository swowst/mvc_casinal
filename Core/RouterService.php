<?php

namespace Core;


class RouterService
{
    const TYPE_GET = 'get';
    const TYPE_POST = 'post';
    protected static array $get = [];
    protected static array $post = [];
    protected string $uri;
    protected string $method;
    protected string $path;
    protected array $segments;

    public function parsePath(string $path): void
    {
        $path = str_replace('path=', '', strtolower($path));
        $this->segments = explode('/', $path);
        $this->path = $path;
    }

    protected static function preparePathToRegex($path): string
    {
        $segments = explode('/', $path);
        $regexPath = '';
        foreach ($segments as $segment) {
            if (preg_match('/^{[a-zA-Z-_]+}$/', $segment)) {
                $regexPath .= '\/([ a-zA-Z-\d]+)';
            } else {
                $regexPath .= "\/$segment";
            }
        }
        return ltrim($regexPath, '\/',);
    }

    public function __construct()
    {
        $this->uri = strtolower($_SERVER['REQUEST_URI']);
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->parsePath($_SERVER['QUERY_STRING']);
    }

    protected static function addRoute($type, $path, array|callable $action): void
    {
        $regexPath = self::preparePathToRegex($path);
        $routeParams = [
            'action' => $action,
            'path' => $path,
            'regex' => $regexPath,
        ];
        if ($type == self::TYPE_GET) {
            static::$get[$path] = $routeParams;
        } else if ($type == self::TYPE_POST) {
            static::$post[$path] = $routeParams;
        }
    }

    public static function get(string $path, array|callable $action): void
    {
        self::addRoute(self::TYPE_GET, $path, $action);
    }

    public static function post(string $path, array|callable $action): void
    {
        self::addRoute(self::TYPE_POST, $path, $action);
    }


    public function handleRoute() : void
    {
        foreach (self::${$this->method} as $routeItem) {
            if (preg_match("/^" . $routeItem['regex'] . "$/", urldecode($this->path), $params)) {
                array_shift($params);
                if(is_callable($routeItem['action'])){
                    call_user_func_array($routeItem['action'],$params);
                    die();
                }else{
                    $class = $routeItem['action'][0];
                    $method = $routeItem['action'][1];
                    call_user_func([new $class(),$method],...$params);
                    die();
                }
            }
        }
    }
}