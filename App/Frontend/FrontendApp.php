<?php

namespace APP\Frontend;

use \OCFram\Application;

class FrontendApp extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('Frontend');
    }

    public function run()
    {
        
        $controller = $this->getController();
        
        $controller->execute();
        $this->_httpResponse->setPage($controller->page());
        $this->_httpResponse->send();
    }
}