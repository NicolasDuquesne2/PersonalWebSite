<?php

namespace OCFram;

abstract class Application
{
    protected $_httpRequest,
              $_httpResponse,
              $_name,
              $_user,
              $_config;

    public function __construct()
    {
        $this->_httpRequest = new HTTPRequest($this);
        $this->_httpResponse = new HTTPResponse($this);
        $this->_name = '';
        $this->_user = new User($this);
        $this->_config = new Config($this);
    }

    //actions
    abstract public function run();


    public function getController()
    {
        $router = new Router;

        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../App/'.$this->_name.'/Config/routes.xml');
        $routes = $xml->getElementsByTagName('route');
        

        foreach ($routes as $route)
        {
            $vars = [];

            if($route->hasAttribute('vars')){
                $vars = explode(',',$route->getAttribute('vars'));
            }

            $router->addRoute(new Route($route->getAttribute('url'),$route->getAttribute('module'),
            $route->getAttribute('action'),$vars));
        }

        try
        {
            $matchedRoute = $router->getRoute($this->httpRequest()->requestURI());
        }
        catch(\RuntimeException $e)
        {
            if ($e->getCode()== Router::NO_ROUTE){
                $this->httpResponse()->redirect404();
            }
        }

        $_GET = array_merge($_GET,$matchedRoute->vars());

        $controllerClass = 'App\\'.$this->_name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'controller';
        
        return New $controllerClass($this,$matchedRoute->module(),$matchedRoute->action());
    }


    //getters
    public function httpRequest()
    {
        return $this->_httpRequest;
    }

    public function httpResponse()
    {
    
        return $this->_httpResponse;
    }

    public function name()
    {
        return $this->_name;
    }

    public function user()
    {
        return $this->_user;
    }

    public function config()
    {
        return $this->_config;
    }

    // setters

    public function setName($name)
    {
        $this->_name = $name;
    }
}