<?php

namespace OCFram;

class Route
{
    protected $_action;
    protected $_module;
    protected $_url;
    protected $_varsNames;
    protected $_vars =[];

    public function __construct($url,$module,$action,array $varsNames)
    {
        $this->setUrl($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }


//actions

public function hasVars()
{
  return !empty($this->_varsNames);
}

public function match($url)
{
  if(preg_match('`^'.$this->_url.'$`', $url, $matches)){
    return $matches;
  }else{
    return false;
  } 
}

//setters
    public function setAction($action)
  {
    if (is_string($action))
    {
      $this->_action = $action;
    }
  }

  public function setModule($module)
  {
    if (is_string($module))
    {
      $this->_module = $module;
    }
  }

  public function setUrl($url)
  {
    if (is_string($url))
    {
      $this->_url = $url;
    }
  }

  public function setVarsNames(array $varsNames)
  {
    $this->_varsNames = $varsNames;
  }

  public function setVars(array $vars)
  {
    $this->_vars = $vars;
  }

//getters

  public function action()
  {
    return $this->_action;
  }

  public function module()
  {
    return $this->_module;
  }

  public function vars()
  {
    return $this->_vars;
  }

  public function varsNames()
  {
    return $this->_varsNames;
  }
}