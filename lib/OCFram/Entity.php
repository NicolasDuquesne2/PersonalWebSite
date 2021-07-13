<?php

namespace OCFram;


/**
 * Classe entity est la classe mère de toutes les entités (des classes représantant les tables de base de données)
 * Intégrant l'interface ArrayAccess (transformer un objet en présentation tableau)
 */
abstract class Entity implements \ArrayAccess
{
  use Hydratator;

    protected $_errors = [];
    protected $_id;

    public function __construct(array $datas = [])
    {
        if (!empty($datas))
        {
            $this->hydrate($datas);
        }
    }

  //Actions

  public function isNew()
  {
    return empty($this->_id);
  }

  //Interface ArrayAccess

  public function offsetGet($var)
  {
    $collable = substr($var,1,(strlen($var)-1));
    if (isset($this->$var))
    {
      return $this->$collable();
    }
  }

  public function offsetSet($var, $value)
  {
    $method = 'set'.ucfirst($var);

    if (isset($this->$var) && is_callable([$this, $method]))
    {
      $this->$method($value);
    }
  }

  public function offsetExists($var)
  {
    return isset($this->$var) && is_callable([$this, $var]);
  }

  public function offsetUnset($var)
  {
    throw new \Exception('Impossible de supprimer une quelconque valeur');
  }
  //setters

  public function setId($id)
  {
    $this->_id = (int) $id;
  }

  //getters

  public function errors()
  {
    return $this->_errors;
  }

  public function id()
  {
    return $this->_id;
  }

}