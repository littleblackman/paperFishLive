<?php

class GradeManager extends BddManager
{

    public function getTableName() {return "grade";}
    public function getEntityName() {return "Grade";}

    public function save($object) {

    }

    public function findAll($order = "ORDER_VALUE ASC") 
    {
        return parent::findAll($order);
    }
}