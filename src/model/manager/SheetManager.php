<?php

class SheetManager extends BddManager
{
    private $session;
    private $definitionManager;
    private $userManager;

    public function getTableName() {return "sheet";}
    public function getEntityName() {return "Sheet";}

    public function __construct() {
        parent::__construct();
        $this->session = new Session();
        $this->definitionManager = new DefinitionManager();
        $this->userManager = new UserManager();
    }

    public function completeObject($data) {
        $object= new Sheet($data); 
        $owner = $this->userManager->find($object->getOwnerId());
        $object->setOwner($owner);
        $definitions = $this->definitionManager->findBySheetId($object->getId());
        $object->setDefinitions($definitions);
        
        return $object;
    }

    public function findByUser($user_id, $orderBy = "updated_at desc") {

        $query  = " SELECT s.*, t.name as topic_name, g.name as grade_name FROM sheet s ";
        $query .= " LEFT JOIN topic t ON s.topic_id = t.id "; 
        $query .= " LEFT JOIN grade g ON s.grade_id = g.id "; 
        $query .= " WHERE owner_id = :owner_id";
        $query .= " ORDER BY ".$orderBy;
        $stmt = $this->prepare($query);
        $stmt->bindValue(':owner_id', $user_id);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objects = [];
        foreach($datas as $data) {
            $object = $this->completeObject($data);
            $objects[] = $object;
        }
        return $objects;
    }

    public function findAll($order_by = "name ASC") {

        $query  = " SELECT s.*, t.name as topic_name, g.name as grade_name FROM sheet s ";
        $query .= " LEFT JOIN topic t ON s.topic_id = t.id "; 
        $query .= " LEFT JOIN grade g ON s.grade_id = g.id "; 
        $query .= " ORDER BY ".$order_by;
        $stmt = $this->prepare($query);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objects = [];
        foreach($datas as $data) {
            $object = $this->completeObject($data);
            $objects[] = $object;
        }
        return $objects;
    }

    public function findBySlug($slug) {
        $entity =$this->getEntityName();
        $query  = " SELECT s.*, t.name as topic_name, g.name as grade_name FROM sheet s ";
        $query .= " LEFT JOIN topic t ON s.topic_id = t.id "; 
        $query .= " LEFT JOIN grade g ON s.grade_id = g.id "; 
        $query .= " WHERE slug = :slug ";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $object = $this->completeObject($data);
     
        return $object;
    }

    public function findByVisibility($visibility)
    {

        $query  = " SELECT s.*, t.name as topic_name, g.name as grade_name FROM sheet s ";
        $query .= " LEFT JOIN topic t ON s.topic_id = t.id "; 
        $query .= " LEFT JOIN grade g ON s.grade_id = g.id "; 
        $query .= " WHERE s.visibility = :visibility";
        $query .= " ORDER BY title ASC";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':visibility', $visibility);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objects = [];
        foreach($datas as $data) {
            $object = $this->completeObject($data);
            $objects[] = $object;
        }
        return $objects;
    }
    


    public function save($object) {
        $set = " 
        topic_id    = :topic_id,
        title       = :title,
        grade_id    = :grade_id,
        visibility  = :visibility,
        description = :description,
        slug        = :slug,
        owner_id    = :owner_id,
        created_at  = :created_at,
        updated_at  = :updated_at ";

        if($object->getId()) {
            $query = " UPDATE sheet SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO sheet SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':title', $object->getTitle());
        $stmt->bindValue(':topic_id', $object->getTopicId());
        $stmt->bindValue(':grade_id', $object->getGradeId());
        $stmt->bindValue(':visibility', $object->getVisibility());
        $stmt->bindValue(':description', $object->getDescription());
        $stmt->bindValue(':owner_id', $this->session->getUserId());
        $stmt->bindValue(':updated_at', date("Y-m-d H:i:s"));

        if ($object->getId()) {
            $stmt->bindValue(':id', $object->getId());
            $stmt->bindValue(':created_at', $object->getCreatedAt()->format('Y-m-d H:i:s'));
            $stmt->bindValue(':slug', $object->getSlug());
        } else {
            $stmt->bindValue(':created_at', date("Y-m-d H:i:s"));
            $stmt->bindValue(':slug', $this->generateSlug($object->getTitle()));
        }
        $stmt->execute();
 
        if($object->getId()) {
            $object_id = $object->getId();
         } else {
            $object_id =  $this->connexion()->lastInsertId();
         } 

         $object = $this->find($object_id);

        return $object;
    }
}