<?php

namespace Entity;
use \OCFram\Entity;

class Contact extends Entity
{
    protected $_name;
    protected $_email;
    protected $_message;

    //setters
    public function setName($name)
    {
        $this->_name = $name;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setMessage($message)
    {
        $this->_message = $message;
    }

    //getters

    public function name()
    {
        return $this->_name;
    }

    public function email()
    {
        return $this->_email;
    }

    public function message()
    {
        return $this->_message;
    }
}