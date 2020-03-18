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

    protected function prepare($query) {
        return $this->connexion()->prepare($query);
    }

    protected function getLastInsertId() {
        return $this->connexion()->lastInsertId();
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