<?php


class Story extends BaseEntity
{
    private $id;
    private $title;
    private $slug;
    private $storyId;
    private $type;
    private $resume;
    private $when;
    private $where;
    private $who;
    private $what;
    private $how;
    private $why;
    private $wQuestion;
    private $themes; 
    private $themesIdList;
    private $personas;
    private $personasIdList;
    private $initial;
    private $triggerEvent;
    private $flow;
    private $climax;
    private $outcome;
    private $final;
    private $focalisation;
    private $genres;
    private $genresIdList;
    private $storyQuality;
    private $storyDifference;
    private $dateParution;
    private $contexteParution;
    private $reception;
    private $visibility;
    private $author;
    private $authorId;
    private $directorId;
    private $director;
    private $owner;
    private $ownerId;
    private $createdAt;
    private $updatedAt;

    public function getManagerEntity() {
        return "StoryManager";
    }

    public function __construct($data = null) {
        $this->setCreatedAt(date('Y-m-d'));
        $this->setUpdatedAt(date('Y-m-d'));
        parent::__construct($data);
    }

    public function hydrate($data) {

        if(isset($data['w_question']) && $data['w_question']) {
            $jsonData = json_decode($data['w_question']);
            $data['when']  = $jsonData->when;
            $data['where'] = $jsonData->where;
            $data['who']   = $jsonData->who;
            $data['what']  = $jsonData->what;
            $data['how']   = $jsonData->how;
            $data['why']   = $jsonData->why;
        }


        if(
                isset($data['when']) 
            &&  isset($data['where'])
            &&  isset($data['who'])
            &&  isset($data['what'])
            &&  isset($data['how'])
            &&  isset($data['why'])
        ) {
            $WQuestion = [
                'when'  => $data['when'],
                'where' => $data['where'],
                'who'   => $data['who'],
                'what'  => $data['what'],
                'how'   => $data['how'],
                'why'   => $data['why']
            ];
    
            $data['w_question'] = json_encode($WQuestion);
        }

        
        parent::hydrate($data);

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of resume
     */ 
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */ 
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    public function setWQuestion($wQuestion) {
        $this->wQuestion = $wQuestion ;
    }

    public function getWQuestion() {
        return $this->wQuestion;
    }

    /**
     * Get the value of when
     */ 
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * Get the value of where
     */ 
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * Get the value of who
     */ 
    public function getWho()
    {
        return $this->who;
    }

    /**
     * Get the value of what
     */ 
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Get the value of how
     */ 
    public function getHow()
    {
        return $this->how;
    }

    /**
     * Get the value of why
     */ 
    public function getWhy()
    {
        return $this->why;
    }

    /**
     * Get the value of initial
     */ 
    public function getInitial()
    {
        return $this->initial;
    }

    /**
     * Set the value of initial
     *
     * @return  self
     */ 
    public function setInitial($initial)
    {
        $this->initial = $initial;

        return $this;
    }

    /**
     * Get the value of triggerEvent
     */ 
    public function getTriggerEvent()
    {
        return $this->triggerEvent;
    }

    /**
     * Set the value of triggerEvent
     *
     * @return  self
     */ 
    public function setTriggerEvent($triggerEvent)
    {
        $this->triggerEvent = $triggerEvent;

        return $this;
    }

    /**
     * Get the value of flow
     */ 
    public function getFlow()
    {
        return $this->flow;
    }

    /**
     * Set the value of flow
     *
     * @return  self
     */ 
    public function setFlow($flow)
    {
        $this->flow = $flow;

        return $this;
    }

    /**
     * Get the value of climax
     */ 
    public function getClimax()
    {
        return $this->climax;
    }

    /**
     * Set the value of climax
     *
     * @return  self
     */ 
    public function setClimax($climax)
    {
        $this->climax = $climax;

        return $this;
    }

    /**
     * Get the value of outcome
     */ 
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * Set the value of outcome
     *
     * @return  self
     */ 
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;

        return $this;
    }

    /**
     * Get the value of final
     */ 
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * Set the value of final
     *
     * @return  self
     */ 
    public function setFinal($final)
    {
        $this->final = $final;

        return $this;
    }

    /**
     * Get the value of focalisation
     */ 
    public function getFocalisation()
    {
        return $this->focalisation;
    }

    /**
     * Set the value of focalisation
     *
     * @return  self
     */ 
    public function setFocalisation($focalisation)
    {
        $this->focalisation = $focalisation;

        return $this;
    }

    /**
     * Get the value of storyQuality
     */ 
    public function getStoryQuality()
    {
        return $this->storyQuality;
    }

    /**
     * Set the value of storyQuality
     *
     * @return  self
     */ 
    public function setStoryQuality($storyQuality)
    {
        $this->storyQuality = $storyQuality;

        return $this;
    }

    /**
     * Get the value of storyDifference
     */ 
    public function getStoryDifference()
    {
        return $this->storyDifference;
    }

    /**
     * Set the value of storyDifference
     *
     * @return  self
     */ 
    public function setStoryDifference($storyDifference)
    {
        $this->storyDifference = $storyDifference;

        return $this;
    }

    /**
     * Get the value of dateParution
     */ 
    public function getDateParution()
    {
        return $this->dateParution;
    }

    /**
     * Set the value of dateParution
     *
     * @return  self
     */ 
    public function setDateParution($dateParution)
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    /**
     * Get the value of contexteParution
     */ 
    public function getContexteParution()
    {
        return $this->contexteParution;
    }

    /**
     * Set the value of contexteParution
     *
     * @return  self
     */ 
    public function setContexteParution($contexteParution)
    {
        $this->contexteParution = $contexteParution;

        return $this;
    }

    /**
     * Get the value of reception
     */ 
    public function getReception()
    {
        return $this->reception;
    }

    /**
     * Set the value of reception
     *
     * @return  self
     */ 
    public function setReception($reception)
    {
        $this->reception = $reception;

        return $this;
    }

    /**
     * Get the value of visibility
     */ 
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set the value of visibility
     *
     * @return  self
     */ 
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get the value of owner
     */ 
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    public function addTheme($theme) {
        $this->themes[] = $theme;
    }

    public function getThemes() {
        return $this->themes;
    }

    public function setThemes($themes) {
        $this->themes = $themes;
    }

    public function getThemesTag($remove = false) {
        if(!$this->getThemes()) return null;
        $html = "";
        foreach($this->getThemes() as $theme) {
            ($remove) ? $removeTag = " style='cursor: pointer' onclick='removeTag(".$theme->getId().")' " : $removeTag = '';
            $html .= "<div ".$removeTag." class='tag' id='tag-".$theme->getId()."'>".$theme->getName()."</div>";
        }
        return $html;
    }

    public function addGenre($genre) {
        $this->genres[] = $genre;
    }

    public function getGenres() {
        return $this->genres;
    }

    public function getGenresTag($remove = false) {
        if(!$this->getGenres()) return null;
        $html = "";
        foreach($this->getGenres() as $genre) {
            ($remove) ? $removeTag = " style='cursor: pointer' onclick='removeTagGenre(".$genre->getId().")' " : $removeTag = '';
            $html .= "<div ".$removeTag." class='tag' id='tagGenre-".$genre->getId()."'>".$genre->getName()."</div>";
        }
        return $html;
    }

    public function addPersona($persona) {
        $this->personas[] = $persona;
    }

    public function getPersonas() {
        return $this->personas;
    }

    public function setPersonas($personas) {
        $this->personas = $personas;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function getAuthorId() {
        if($this->authorId) return $this->authorId;
        if(!$this->getAuthor()) return null;
        return $this->getAuthor()->getId();
    }

    /**
     * Set the value of authorId
     *
     * @return  self
     */ 
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * Get the value of director
     */ 
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set the value of director
     *
     * @return  self
     */ 
    public function setDirector($director)
    {
        $this->director = $director;
        return $this;
    }

    public function getDirectorId() {
        if($this->directorId) return $this->directorId;
        if(!$this->getDirector()) return null;
        return $this->getDirector()->getId();
    }

    /**
     * Set the value of authorId
     *
     * @return  self
     */ 
    public function setDirectorId($directorId)
    {
        $this->directorId = $directorId;
        return $this;
    }

    public function getBy() {
        if($this->getAuthor()) {
            return $this->getAuthor();
        } else {
            return $this->getDirector();
        }
    }

    public function getByName() {
        return $this->getBy()->getFullname();
    }


    /**
     * Get the value of genresIdList
     */ 
    public function getGenresIdList()
    {
        return $this->genresIdList;
    }

    public function setGenres($genres) {
        $this->genres = $genres;
    }

    /**
     * Set the value of genresIdList
     *
     * @return  self
     */ 
    public function setGenresIdList($genresIdList)
    {
        $this->genresIdList = $genresIdList;

        return $this;
    }

    /**
     * Get the value of personasIdList
     */ 
    public function getPersonasIdList()
    {
        return $this->personasIdList;
    }

    /**
     * Set the value of personasIdList
     *
     * @return  self
     */ 
    public function setPersonasIdList($personasIdList)
    {
        $this->personasIdList = $personasIdList;

        return $this;
    }

    public function getPersonasTag($remove = false) {
        if(!$this->getPersonas()) return null;
        $html = "";
        foreach($this->getPersonas() as $persona) {
            ($remove) ? $removeTag = " style='cursor: pointer' onclick='updatePersonaAjax(".$persona->getId().")' " : $removeTag = '';
            $html .= "<div ".$removeTag." class='tag' id='tagPersona-".$persona->getId()."'>".$persona->getFullname()."</div>";
        }
        return $html;
    }

    /**
     * Get the value of themesIdList
     */ 
    public function getThemesIdList()
    {
        return $this->themesIdList;
    }

    /**
     * Set the value of themesIdList
     *
     * @return  self
     */ 
    public function setThemesIdList($themesIdList)
    {
        $this->themesIdList = $themesIdList;

        return $this;
    }

    /**
     * Get the value of storyId
     */ 
    public function getStoryId()
    {
        return $this->storyId;
    }

    /**
     * Set the value of storyId
     *
     * @return  self
     */ 
    public function setStoryId($storyId)
    {
        $this->storyId = $storyId;

        return $this;
    }

    /**
     * Set the value of when
     *
     * @return  self
     */ 
    public function setWhen($when)
    {
        $this->when = $when;

        return $this;
    }

    /**
     * Set the value of where
     *
     * @return  self
     */ 
    public function setWhere($where)
    {
        $this->where = $where;

        return $this;
    }

    /**
     * Set the value of who
     *
     * @return  self
     */ 
    public function setWho($who)
    {
        $this->who = $who;

        return $this;
    }

    /**
     * Set the value of what
     *
     * @return  self
     */ 
    public function setWhat($what)
    {
        $this->what = $what;

        return $this;
    }

    /**
     * Set the value of how
     *
     * @return  self
     */ 
    public function setHow($how)
    {
        $this->how = $how;

        return $this;
    }

    /**
     * Set the value of why
     *
     * @return  self
     */ 
    public function setWhy($why)
    {
        $this->why = $why;

        return $this;
    }


    /**
     * Get the value of ownerId
     */ 
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set the value of ownerId
     *
     * @return  self
     */ 
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new DateTime($createdAt);

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new DateTime($updatedAt);

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}