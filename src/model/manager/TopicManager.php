<?php

class TopicManager extends BddManager
{

    public function getTableName() {return "topic";}
    public function getEntityName() {return "Topic";}

    public function save($object) {

        $set = "
                name = :name,
                constant_key  = :constant_key,
        "; 

        if($object->getId()) {
            $query = " UPDATE topic SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO topic SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':name', $object->getName());
        $stmt->bindValue(':constant_key', $object->getContantKey());
        if($object->getId()) $stmt->bindValue(':id', $object->getId());
        $stmt->execute();

        $lastId = $this->getLastInsertId();
        $object = $this->find($lastId);

        return $object;

    }
}