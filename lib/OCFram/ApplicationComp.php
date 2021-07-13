<?php

namespace OCFram;

/**classe pour intégrer l'application à des composants de l'application
 * HTTPRequest, HTTPResponse, BackController
*/

abstract class ApplicationComp
{
    protected $_app;

    public function __construct(Application $app)
    {
        $this->_app = $app;
    }

    public function app()
    {
        return $this->_app;
    }
}