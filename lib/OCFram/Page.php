<?php

namespace OCFram;

class Page extends ApplicationComp
{
    protected $_contentFileName;
    protected $_layout;
    protected $_vars = [];

    //actions
    public function addVar($var, $value)
    {
        if(!is_string($var)|| is_numeric($var)|| empty($var)){
            throw new \InvalidArgumentExeption('Le nom de la variable doit être une chaîne de caractères');
        }

        $this->_vars[$var] = $value;
    }

    public function getGeneratedPage()
    {

        if(!file_exists($this->_contentFileName)){
            throw new \RuntimeException('La vue spécifiée n\'existe pas');
        }


        $user = $this->app()->user();
        extract($this->_vars);

        ob_start();
        require $this->_contentFileName;
        $content = ob_get_clean();

        ob_start();
        require $this->_layout;
        return ob_get_clean();
    }
    
    public function getGenereted404Page()
    {
        if(!file_exists($this->_contentFileName)){
            throw new \RuntimeException('La vue spécifiée n\'existe pas');
        }

        ob_start();
        require $this->_contentFileName;
        return ob_get_clean();
    }


    //setters

    public function setContentFileName($contentFileName)
    {
        if(!is_string($contentFileName)|| empty($contentFileName)){
            throw new \InvalidArgumentException('La vue désirée n\'existe pas');
        }

        $this->_contentFileName = $contentFileName;
    }

    public function setLayoutFileName($layoutFileName)
    {
        $this->_layout = $layoutFileName;
    }
} 