<?php

namespace OCFram;

class HTTPResponse extends ApplicationComp
{
    protected $_page;

    public function addHeader($header)
    {
        header($header);
    }

    public function redirect($location)
    {
        header('Location: '.$location);
        exit;
    }

    public function redirect404()
    {
        $this->_page = new Page($this->app());
        $this->_page->setContentFileName(__DIR__.'/../../Errors/404.html');
        $this->addHeader('HTTP/1.0 404 Not Found');
        $this->send404();
    }

    public function send()
    {
        exit($this->page()->getGeneratedPage());
    }

    public function send404()
    {
        exit($this->page()->getGenereted404Page());
    }


    public function setCookie($name, $value = '', $expire=0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {
        setcookie($name,$value,$expire,$path,$domain,$secure,$httpOnly);
    }

    //setters

    public function setPage(Page $page)
    {
        $this->_page = $page;
    }


    //getters

    public function page()
    {
        return $this->_page;
    }
    
}