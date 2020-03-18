<?php


class StoryManager extends BddManager
{

    private $session;
    private $personaManager;
    private $themeManager;
    private $genreManager;
    private $authorManager;
    private $directorManager;
    private $userManager;

    public function getTableName() { return "story";}
    public function getEntityName() {return "Story";}


    public function __construct()
    {
        parent::__construct();
        $this->personaManager  = new PersonaManager();
        $this->genreManager    = new GenreManager();
        $this->themeManager    = new ThemeManager();
        $this->authorManager   = new AuthorManager();
        $this->directorManager = new DirectorManager();
        $this->userManager     = new UserManager();
        $this->session         = new Session();
    }

    /**
     * return Object Story
     *
     * @param string $slug
     * @return Story
     */
    public function findBySlug($slug) {
        $query = "SELECT s.* FROM story s WHERE slug = :slug";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $story = $this->completeOneData($result);
        return $story;
    }

    /**
     * return Array of Object Story
     *
     * @param integer $user_id
     * @return array
     */
    public function findByUser($user_id, $orderBy = "updated_at desc") {
        $query  = " SELECT s.* FROM story s
                    WHERE owner_id = :owner_id";
        $query .= " ORDER BY ".$orderBy; 

        $stmt = $this->prepare($query);
        $stmt->bindValue(':owner_id', $user_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->completeData($results);
    }

        /**
     * return Array of Object Story
     *
     * @param string $visibility
     * @return array
     */
    public function findByVisibility($visibility, $orderBy = "updated_at desc") {
        $query  = " SELECT s.* FROM story s WHERE visibility = :visibility";
        $query .= " ORDER BY ".$orderBy; 

        $stmt = $this->prepare($query);
        $stmt->bindValue(':visibility', $visibility);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->completeData($results);
    }

    /**
     * return Object Story hydrated
     *
     * @param array result of PDO Request
     * @return Object Story 
     */
    public function completeOneData($result) {
        $story = new Story($result);
            
        if ($story->getAuthorId()) {
            $author = $this->authorManager->find($story->getAuthorId());
            $story->setAuthor($author);
        }
        if ($story->getDirectorId()) {
            $director = $this->directorManager->find($story->getDirectorId());
            $story->setDirector($director);
        }

        $personas = $this->personaManager->findByStoryId($story->getId());
        foreach($personas as $persona) { $personaArray[] = $persona->getId(); }
        $genres   = $this->genreManager->findByStoryId($story->getId());
        foreach($genres as $genre) { $genreArray[] = $genre->getId(); }
        $themes   = $this->themeManager->findByStoryId($story->getId());
        foreach($themes as $theme) { $themeArray[] = $theme->getId(); }

        $owner = $this->userManager->find($story->getOwnerId());
        $story->setOwner($owner);
        $story->setPersonas($personas);
        $story->setPersonasIdList(implode('-', $personaArray));
        $story->setGenres($genres);
        $story->setGenresIdList(implode('-', $genreArray));
        $story->setThemes($themes);
        $story->setThemesIdList(implode('-', $themeArray));
        return $story;
    }

    /**
     * return Array of Object Story hydrated
     *
     * @param array result of PDO Request
     * @return Object Story 
     */
    public function completeData($results)
    {
        $storys = null;
        foreach($results as $result) {
            $story = $this->completeOneData($result);
            $storys[] = $story;
        }
        return $storys;
    }

    /**
     * Persist Story (update or insert)
     *
     * @param Object Story $story
     * @return Object Story
     */
    public function save($story) {   
        

        $set = " 
                title              = :title,
                type               = :type,
                resume             = :resume,
                w_question         = :w_question,
                initial            = :initial,
                trigger_event      = :trigger_event,
                flow               = :flow,
                climax             = :climax,
                outcome            = :outcome,
                final              = :final,
                focalisation       = :focalisation,
                story_quality      = :story_quality,
                story_difference   = :story_difference,
                date_parution      = :date_parution,
                contexte_parution  = :contexte_parution,
                reception          = :reception,
                visibility         = :visibility,
                author_id          = :author_id,
                director_id        = :director_id,
                slug               = :slug,
                owner_id           = :owner_id,
                created_at         = :created_at,
                updated_at         = :updated_at
                ";

        if($story->getId()) {
            $query = " UPDATE story SET ".$set." WHERE id = :id ";
        } else  {
            $query = "INSERT INTO story SET ".$set;
        }

        $stmt = $this->prepare($query);
        $stmt->bindValue(':title', $story->getTitle());
        $stmt->bindValue(':type', $story->getType());
        $stmt->bindValue(':resume', $story->getResume());
        $stmt->bindValue(':w_question', $story->getWQuestion());
        $stmt->bindValue(':initial', $story->getInitial());
        $stmt->bindValue(':trigger_event', $story->getTriggerEvent());
        $stmt->bindValue(':flow', $story->getFlow());
        $stmt->bindValue(':climax', $story->getClimax());
        $stmt->bindValue(':outcome', $story->getOutcome());
        $stmt->bindValue(':final', $story->getFinal());
        $stmt->bindValue(':focalisation', $story->getFocalisation());
        $stmt->bindValue(':story_quality', $story->getStoryQuality());
        $stmt->bindValue(':story_difference', $story->getStoryDifference());
        $stmt->bindValue(':date_parution', $story->getDateParution());
        $stmt->bindValue(':contexte_parution', $story->getContexteParution());
        $stmt->bindValue(':reception', $story->getReception());
        $stmt->bindValue(':visibility', $story->getVisibility());
        $stmt->bindValue(':author_id', $story->getAuthorId());
        $stmt->bindValue(':director_id', $story->getDirectorId());
        $stmt->bindValue(':owner_id', $this->session->getUserId());
        $stmt->bindValue(':updated_at', date("Y-m-d H:i:s"));

        echo $story->getThemesIdList(); 

        if ($story->getId()) {
            $stmt->bindValue(':id', $story->getId());
            $stmt->bindValue(':created_at', $story->getCreatedAt()->format('Y-m-d H:i:s'));
            $stmt->bindValue(':slug', $story->getSlug());
        } else {
            $stmt->bindValue(':created_at', date("Y-m-d H:i:s"));
            $stmt->bindValue(':slug', $this->generateSlug($story->getTitle()));

        }

        $stmt->execute();
 
        if($story->getId()) {
            $story_id = $story->getId();
         } else {
            $story_id =  $this->connexion()->lastInsertId();
         } 

        if($story->getGenresIdList()) $this->associateToStory("genre", $story_id, $story->getGenresIdList());
        if($story->getThemesIdList()) $this->associateToStory("theme", $story_id, $story->getThemesIdList());
        if($story->getPersonasIdList()) $this->associateToStory("persona", $story_id, $story->getPersonasIdList());

         $story = $this->find($story_id);

        return $story;

    }

    /**
     * Persist Jointure in bdd 
     *
     * @param string $table
     * @param integer $story_id
     * @param array $values
     * @return void
     */
    public function associateToStory($table, $story_id, $values) {

        $valuesArray = explode('-', $values);

        if($table == "persona") {
            foreach($valuesArray as $value_id) {
                if(is_numeric($value_id) && $value_id > 0) {
                    $persona = $this->personaManager->find($value_id);

                    $persona->setStoryId($story_id);
                    $persona = $persona->save();

                }
            }
           
        } else {
            $query = " delete FROM story_".$table." WHERE story_id = :story_id";
            $stmt = $this->prepare($query);
            $stmt->bindValue(':story_id', $story_id);
            $stmt->execute();
            foreach ($valuesArray as $value_id) {
                if (is_numeric($value_id) && $value_id > 0) {
                    $query = "INSERT INTO story_".$table." SET story_id = :story_id, ".$table."_id = :value_id ;";
                    $stmt = $this->prepare($query);
                    $stmt->bindValue(':story_id', $story_id);
                    $stmt->bindValue(':value_id', $value_id);
                    $stmt->execute();
                }
            }
        }
    }
}