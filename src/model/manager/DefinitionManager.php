<?php

class DefinitionManager extends BddManager
{

    public function getTableName() {return "definition";}
    public function getEntityName() {return "Definition";}

    public $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function save($object) {

        $setString = "
                    sheet_id  = :sheet_id,
                    question  = :question,
                    answer    = :answer,
                    keywords  = :keywords "; 

        $query = $this->makeQuery($object, $setString, true);

        $stmt = $this->prepare($query);
        $stmt->bindValue(':sheet_id', $object->getSheetId());
        $stmt->bindValue(':question', $object->getQuestion());
        $stmt->bindValue(':answer', $object->getAnswer());
        $stmt->bindValue(':keywords', $object->getKeywords());

        $stmt = $this->bindFlagCreation($object, $stmt);

        if($object->getId()) $stmt->bindValue(':id', $object->getId());
        $stmt->execute();

        $object = $this->updateObjectPersisted($object);

        return $object;
    }

    public function findBySheetId($sheet_id) {
        $query = " SELECT * FROM definition WHERE sheet_id = :sheet_id ";
        $stmt = $this->prepare($query);
        $stmt->bindValue('sheet_id', $sheet_id);
        $stmt->execute();

        if(!$results = $stmt->fetchAll(PDO::FETCH_ASSOC)) return null;

        foreach($results as $result) {
            $definition = new Definition($result);
            $definitions[] = $definition;
        }
        return $definitions;

    }
}