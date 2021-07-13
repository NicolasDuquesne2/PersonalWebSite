<?php

namespace Model;
use \OCFram\Manager;

abstract class DescriptionManager extends Manager
{
    abstract public function getDescriptionsList();
}