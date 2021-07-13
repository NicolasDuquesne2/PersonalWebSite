<?php

namespace Model;
use \OCFram\Manager;

abstract class NewsManager extends Manager
{

    abstract public function getList($start=-1,$maxLength=-1);
    abstract public function getOneNews($id);
}
