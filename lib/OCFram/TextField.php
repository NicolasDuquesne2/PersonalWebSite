<?php

namespace OCFram;

class TextField extends Field
{
  protected $_cols;
  protected $_rows;
  protected $_wrap;
  
  public function buildWidget()
  {
    $widget = '<div>';
    
    if (!empty($this->_errorMessage))
    {
      $widget .= $this->_errorMessage.'<br />';
    }
    
    $widget .= '<label for="'.$this->_for.'">'.$this->_label.'</label><textarea class="'.$this->_class.'" id="'.$this->_id.'" wrap="'.$this->_wrap.'"';
    
    if (!empty($this->_cols))
    {
      $widget .= ' cols="'.$this->_cols.'"';
    }
    
    if (!empty($this->_rows))
    {
      $widget .= ' rows="'.$this->_rows.'"';
    }
    
    $widget .= '>';
    
    if (!empty($this->_value))
    {
      $widget .= htmlspecialchars($this->_value);
    }
    
    return $widget.'</textarea></div>';
  }
  
  public function setCols($cols)
  {
    $cols = (int) $cols;
    
    if ($cols > 0)
    {
      $this->_cols = $cols;
    }
  }
  
  public function setRows($rows)
  {
    $rows = (int) $rows;
    
    if ($rows > 0)
    {
      $this->_rows = $rows;
    }
  }

  public function setWrap($wrap)
  {
    $this->_wrap = $wrap;
  }
}