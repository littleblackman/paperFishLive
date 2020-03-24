<?php



abstract class BddManager
{

    private $bdd;

    abstract public function getTableName();
    abstract public function getEntityName();
    abstract public function save($object);


    public function __construct() 
    {
        $this->bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_LOGIN, DB_PWD);
    }

    protected function connexion() {
        return $this->bdd;
    }

    public function makeQuery($object, $setString, $flagCreation = false) {

        if($flagCreation) {
            $setString .= " ,
            owner_id = :owner_id,
            created_at = :created_at,
            updated_at = :updated_at";
        }

        if($object->getId()) {
            $query = " UPDATE ".$this->getTableName()." SET ".$setString." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO ".$this->getTableName()." SET ".$setString;
        }
        return $query;
    }

    public function bindFlagCreation($object, $stmt) {
        $stmt->bindValue(':owner_id', $this->session->getUserId());
        $stmt->bindValue(':updated_at', date("Y-m-d H:i:s"));
        if ($object->getId()) {
            $stmt->bindValue(':created_at', $object->getCreatedAt()->format('Y-m-d H:i:s'));
        } else {
            $stmt->bindValue(':created_at', date("Y-m-d H:i:s"));
        }
        return $stmt;
    }

    protected function prepare($query) {
        return $this->connexion()->prepare($query);
    }

    protected function getLastInsertId() {
        return $this->connexion()->lastInsertId();
    }

    public function updateObjectPersisted($object) {
        if($object->getId()) {
            $object_id = $object->getId();
         } else {
            $object_id =  $this->connexion()->lastInsertId();
         } 
         $object = $this->find($object_id);
         return $object;
    }

    public function find($id) {
        $table = $this->getTableName();
        $entity =$this->getEntityName();
        $query = "SELECT * FROM ".$table." WHERE id = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $object = new $entity($data);

        return $object;
    }

    public function findAll($order_by = "name ASC") {
        $table = $this->getTableName();
        $entity =$this->getEntityName();
        $query = "SELECT * FROM ".$table;
        $query .= " ORDER BY ".$order_by;
        $stmt = $this->prepare($query);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($datas as $data) {
            $object = new $entity($data);
            $objects[] = $object;
        }
        return $objects;
    }

    public function delete($objectId) {
        $tableName = $this->getTableName();
        $query = " DELETE FROM ".$tableName." WHERE id = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $objectId);
        $stmt->execute();
        return true;
    }

    public function generateSlug($name) {
        $slug_name = str_replace([' ', ',', "'"], ['-', '-', '-'], $name);
        $slug_name = strtolower(
                            str_replace(
                                ['é', 'è', 'ê', 'ï', 'î','ë', 'à', 'ô', 'ö', 'â'],
                                ['e', 'e', 'e', 'i', 'i', 'e', 'a', 'o', 'o', 'a'],
                                $slug_name
        ));
        $i = 0;

        $original_name = $slug_name;
        if($object = $this->getResultBySlug($slug_name)) {
            $slug_object = $object['slug'];
            while($slug_name == $slug_object) {
                $i++;
                $slug_name = $original_name.'-'.$i;
                $object = $this->getResultBySlug($slug_name);
                ($object) ? $slug_object = $object['slug'] : $slug_object = "";
            }
        }
        return $slug_name;
    }

    public function getResultBySlug($slug_name) {
        $query = "SELECT * FROM ".$this->getTableName()." WHERE slug = :slug";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':slug', $slug_name);
        $stmt->execute();
        if(!$result = $stmt->fetch(PDO::FETCH_ASSOC)) return null;
        return $result; 
    }
}