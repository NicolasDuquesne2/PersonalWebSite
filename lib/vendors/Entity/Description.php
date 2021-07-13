<?php

namespace Entity;

use \OCFram\Entity;

class Description extends Entity
{
    protected $_idcss,
              $_imageArray = [],
              $_title,
              $_textsArray = [];


    //setters

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setImageArray(array $imageArray)
    {
        $this->_imageArray = $imageArray;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function appendToTextsArray($text)
    {
        $this->_textsArray[] = $text;
    }

    public function setIdcss($idcss)
    {
        $this->_idcss = $idcss;
    }

    //getters

    public function id()
    {
        return $this->_id;
    }

    public function imageArray()
    {
        return $this->_imageArray;
    }

    public function title()
    {
        return $this->_title;
    }

    public function textsArray()
    {
        return $this->_textsArray;
    }

    public function idcss()
    {
        return $this->_idcss;
    }
    
}