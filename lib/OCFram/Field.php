<?php

namespace OCFram;

abstract class Field
{
    use Hydratator;

    protected $_errorMessage;
    protected $_label;
    protected $_class;
    protected $_name;
    protected $_value;
    protected $_for;
    protected $_id;

    public function __construct(array $options = [])
    {
        if (!empty($options))
        {
          $this->hydrate($options);
        }
    }

    //setters  

    public function setLabel($label)
    {
        if (is_string($label))
        {
          $this->_label = $label;
        }
    }
  
    public function setName($name)
    {
        if (is_string($name))
        {
          $this->_name = $name;
        }
    }
  
    public function setValue($value)
    {
        if (is_string($value))
        {
          $this->_value = $value;
        }
    }


    public function setFor($for)
    {
        if (is_string($for))
        {
          $this->_for = $for;
        }
    }

    public function setClass($class)
    {
        if (is_string($class))
        {
          $this->_class = $class;
        }
    }

    public function setId($id)
    {
      $this->_id = $id;
    }

    //getters
    
    public function name()
    {
      return $this->_name;
    }
  
    //Actions

    abstract public function buildWidget();

    public function isValid()
    {

    }
}