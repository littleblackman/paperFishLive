<?php



class ThemeManager extends BddManager
{
   
    public function getTableName() { return "theme";}
    public function getEntityName() {return "Theme";}


    public function findByString($string) {
        $query = "SELECT id, name FROM theme WHERE name like :name order by name;";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':name', "%".$string."%");
        $stmt->execute();
        if(!$result = $stmt->fetchAll(PDO::FETCH_ASSOC)) return [];
        return $result;
    }

    public function findByStoryId($story_id) {
        $query = "  SELECT t.*
                    FROM theme t
                    LEFT JOIN story_theme st ON st.theme_id = t.id 
                    WHERE st.story_id = :story_id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':story_id', $story_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result) {
            $theme = new Theme($result);
            $themes[] = $theme;
        }

        return $themes;
        
    }

    public function save($object) {

    }

}