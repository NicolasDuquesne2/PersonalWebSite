<?php

namespace OCFram;

/**Classe mère de tous les controleurs*/
abstract class BackController extends ApplicationComp
{
    protected $_action = '';
    protected $_module = '';
    protected $_page = null;
    protected $_view = '';
    protected $_layout = '';
    protected $_managers = null;

    public function __construct(Application $app, $module, $action)
    {
        parent::__construct($app);
        $this->_managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
        $this->_page = new Page($app);
        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
        $this->setLayout($module);
    }


    //Actions

    public function execute()
    {
        $method = 'execute'.ucfirst($this->_action);

        if (!is_callable([$this,$method]))
        {
            throw new \RuntimeException('L\'action "'.$this->_action.'" n\'est pas définie sur ce module');
        }

        $this->$method($this->_app->httpRequest());
    }


    //getters 
    public function page()
    {
      return $this->_page;
    }

    public function managers()
    {
      return $this->_managers;
    }
    
    //setters
    public function setModule($module)
    {
      if (!is_string($module) || empty($module))
      {
        throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
      }
  
      $this->_module = $module;
    }
  
    public function setAction($action)
    {
      if (!is_string($action) || empty($action))
      {
        throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
      }
  
      $this->_action = $action;
    }

    public function setView($view)
    {
      if (!is_string($view) || empty($view))
      {
        throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
      }

      $this->_view = $view;
      $this->_page->setContentFileName(__DIR__.'/../../App/'.$this->_app->name().'/Modules/'.$this->_module.'/Views/'.$this->_view.'.php');
      
    }
  
    public function setLayout($layout)
    {
      if (!is_string($layout) || empty($layout))
      {
        throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
      }

      $this->_layout = $layout;
      $this->_page->setLayoutFileName(__DIR__.'/../../App/'.$this->_app->name().'/Templates/'.$this->_layout.'.php');
    }
    
}