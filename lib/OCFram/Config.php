<?php

namespace OCFram;

class Config extends ApplicationComp
{
    protected $_vars = [];

    public function get($var)
    {
        if(!$this->_vars){
            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../App/'.$this->_app->name().'/Config/app.xml');
            $elements = $xml->getElementsByTagName('define');

            foreach($elements as $element)
            {
                $this->_vars[$element->getAttribute('var')] = $element->getAttribute('value');
            }
        }

        if(isset($this->_vars[$var])){
            return $this->_vars[$var];
        }

        return null;
    }
}