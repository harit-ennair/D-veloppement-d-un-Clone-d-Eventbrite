<?php


class Route
{
    private string $name;
    private string $path;
    private string $controller;
    private string $method;
    private $callback;
    private array $middlewaires;
    

    public function getPath(): string
    {
        return $this->path;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }


    public function __construct(string $path, array|callable $action)
    {
        if(is_array($action)){
            $this->controller = $action[0];
            $this->method = $action[1];
        }
        if(is_callable($action)){
            $this->callback = $action;
        }
        $this->path= $path;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function setMiddlewaire($middlewaire)
    {
        $this->middlewaires[] = $middlewaire;
        return $this;
    }

    public function match($uri, $method)
    {
        // Transform path pattern into regex
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $this->path);
        $pattern = "#^" . $pattern . "$#";

        // Check if URI matches the pattern and method matches
        if (preg_match($pattern, $uri) && $method == $this->method) {
            return true;
        }
        return false;
    }

    public function call($args)
    {
        if($this->callback){
            call_user_func($this->callback, $args);
        }
        if($this->controller && $this->method){
            $obj = new $this->controller();
            $obj->$this->method($args);
        }
    }

}