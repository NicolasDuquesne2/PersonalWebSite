<?php

namespace Entity;

use \OCFram\Entity;

class News extends Entity
{

    protected $_author,
              $_title,
              $_ntext,
              $_creatDate,
              $_modDate;

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;  

    //setters

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setAuthor($author)
    {
        if (!is_string($author)){
            $this->errors[] = self::INVALID_AUTHOR;
        }
        else{
            $this->_author = $author;
        }
        
    }

    public function setTitle($title)
    {
        if (!is_string($title)){
            $this->errors[] = self::INVALID_TITLE;
        }
        else{
            $this->_title = $title;
        }
    }

    public function setNText($ntext)
    {
        if (!is_string($ntext)){
            $this->errors[] = self::INVALID_TEXT;
        }
        else{
            $this->_ntext = $ntext;
        }
    }

    public function setCreatDate($creatDate)
    {
        $this->_creatDate = $creatDate;
    }

    public function setModDate($modDate)
    {
        $this->_modDate = $modDate;
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

    public function author()
    {
        return $this->_author;
    }

    public function title()
    {
        return $this->_title;
    }

    public function ntext()
    {
        return $this->_ntext;
    }

    public function creatDate()
    {
        return $this->_creatDate;
    }

    public function modDate()
    {
        return $this->_modDate;
    }

    // actions
    
    public function isValid()
    {
        return !(empty($this->author())|| empty($this->title()) || empty($this->ntext()));
    }
}