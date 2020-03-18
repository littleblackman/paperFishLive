<?php

class AuthorManager extends BddManager
{

    public function getTableName() {return "author";}
    public function getEntityName() {return "Author";}

    public function save($object) {

        $set = "
                firstname = :firstname,
                lastname  = :lastname,
                information = :information
        "; 

        if($object->getId()) {
            $query = " UPDATE author SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO author SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':firstname', $object->getFirstname());
        $stmt->bindValue(':lastname', $object->getLastname());
        $stmt->bindValue(':information', $object->getInformation());
        if($object->getId()) $stmt->bindValue(':id', $object->getId());
        $stmt->execute();

        $lastId = $this->getLastInsertId();
        $author = $this->find($lastId);

        return $author;

    }
}