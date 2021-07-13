<?php

namespace OCFram;

/**Managers est appelé au moment de la constrcution d'un controlleur
 * il prend le nom de l'api et le dao, fournit par l'instanciation du PDOFactory
 * On prévoit un manager pour chaque api. Ex : newsManagerPDO et newsManagerMysqli
 * la fonction getMangerOf comporte un tableau de managers, créés si besoin
 * Renvoit le manager contenu dans le tableau en fonction du nom de module
 */
class Managers
{
    protected $_api = null;
    protected $_dao = null;
    protected $_managers = [];

    public function __construct($api,$dao)
    {
        $this->_api = $api;
        $this->_dao = $dao; 
    }

    public function getManagerOf($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module spécifié est invalide');
    }

    if (!isset($this->managers[$module]))
    {
      
      $manager ='\\Model\\'.$module.'Manager'.$this->_api;

      $this->_managers[$module] = new $manager($this->_dao);
    }

    return $this->_managers[$module];
  }
}