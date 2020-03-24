<?php

class GenreManager extends BddManager
{
   
    public function getTableName() { return "genre";}
    public function getEntityName() {return "Genre";}

    public function findByString($string) {
        $query = "SELECT id, name FROM genre WHERE name like :name order by name;";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':name', "%".$string."%");
        $stmt->execute();
        if(!$result = $stmt->fetchAll(PDO::FETCH_ASSOC)) return [];
        return $result;
    }

    public function findByStoryId($story_id) {
        $query = "  SELECT g.*
                    FROM genre g
                    LEFT JOIN story_genre sg ON sg.genre_id = g.id 
                    WHERE sg.story_id = :story_id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':story_id', $story_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result) {
            $genre = new Genre($result);
            $genres[] = $genre;
        }

        return $genres;
        
    }
    
    public function save($object) {
        
    }

}