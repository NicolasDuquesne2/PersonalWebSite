<?Php

namespace OCFram;

class Form
{
    use Hydratator;

    protected $_entity;
    protected $_fields = [];
    protected $_id;
    protected $_inputId;
    protected $_inputType;
    protected $_inputValue;

    public function __construct(array $options = [])
    {
        if (!empty($options))
        {
          $this->hydrate($options);
        }
    }


//setters 
    public function setEntity(Entity $entity)
    {
        $this->_entity = $entity;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setInputId($inputId)
    {
        $this->_inputId = $inputId;
    }

    public function setInputType($inputType)
    {
        $this->_inputType = $inputType;
    }

    public function setInputValue($inputValue)
    {
        $this->_inputValue = $inputValue;
    }

//getters
    public function entity()
    {
        return $this->entity;
    }

//Actions


    public function addField(Field $field)
    {
        $attr = $field->name();
        $field->setValue($this->_entity->$attr());

        $this->_fields[] = $field;
        return $this;
    }

    public function createView()
    {
        $view = '<div id="'.$this->_id.'">';
        
        foreach($this->_fields as $field)
        {
            $view.= $field->buildWidget();
        }

        $view.='<input id="'.$this->_inputId.'" type="'.$this->_inputType.'" value="'.$this->_inputValue.'">';
        return $view.'</div>';
    }

    public function isValid()
    {
        $valid = true;

        foreach($this->fields as $field)
        {
            if (!$field->isValid())
            {
                $valid = false;
            }
        }
        return $valid;
    }
}