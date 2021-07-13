<?php

namespace OCFram;

/**classe mère des managers, qui fournit le bon dao pour tous les managers
 * est instancié par la classe Managers
*/
abstract class Manager
{
    protected $_dao;

    public function __construct($dao)
    {
        $this->_dao = $dao;
    }

}