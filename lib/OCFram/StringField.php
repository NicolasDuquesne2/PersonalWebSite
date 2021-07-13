<?php

namespace OCFram;


class StringField extends Field
{
    protected $_maxLength;

    public function buildWidget()
    {
        $widget = '<div>';

        if(!empty($this->_errorMessage)){
            $widget.=$this->_errorMessage.'<br />';
        }

        $widget.='<label for="'.$this->_for.'">'.$this->_label.'</label><input class="'.$this->_class.'" type="text" id="'.$this->_id.'"';

        if (!empty($this->_value))
        {
            $widget .= ' value="'.htmlspecialchars($this->_value).'"';
        }
        
        if (!empty($this->_maxLength))
        {
            $widget .= ' maxlength="'.$this->_maxLength.'"';
        }
        
        return $widget .= ' /></div>';
    }

    public function setMaxLength($maxLength)
    {
        $maxLength = (int) $maxLength;
        if ($maxLength > 0){
            $this->_maxLength = $maxLength;
        }
        else{
            throw new \RuntimeException('The maximum length must be greater than 0');
        }
    }
}