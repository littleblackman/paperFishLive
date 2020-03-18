<?php

class DirectorManager extends BddManager
{

    public function getTableName() {return "director";}
    public function getEntityName() {return "Director";}

    public function save($object) {

        $set = "
                firstname = :firstname,
                lastname  = :lastname,
                information = :information
        "; 

        if($object->getId()) {
            $query = " UPDATE director SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO director SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':firstname', $object->getFirstname());
        $stmt->bindValue(':lastname', $object->getLastname());
        $stmt->bindValue(':information', $object->getInformation());
        if($object->getId()) $stmt->bindValue(':id', $object->getId());
        $stmt->execute();

        $lastId = $this->getLastInsertId();
        $director = $this->find($lastId);

        return $director;

    }
}