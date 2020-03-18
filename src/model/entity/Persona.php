<?php



class Persona extends BaseEntity
{
    /**
     * @var integer
     */
    private $id;

    /**     
     * @var Story
     */
    private $story;

    private $storyId;

    /**  
     * @var string
     */
    private $firstname;

    /**  
     * @var string
     */
    private $lastname;

    /**  
     * @var string
     */
    private $nickname;

    /**  
     * @var integer
     */
    private $age;

    /**  
     * @var text
     */
    private $personnality;

    /**  
     * @var text
     */
    private $moralValues;
    
    /**  
     * @var text
     */
    private $achillesHeel;

    /**  
     * @var text
     */
    private $socialStanding;

    /**  
     * @var text
     */
    private $philosophy;

    /**  
     * @var text
     */
    private $background;

    /**  
     * @var NarrativeAnalysis
     */
    private $narrativeAnalysis;


    public function getManagerEntity() {
        return "PersonaManager";
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
     * Get the value of story
     */ 
    public function getStory()
    {
        return $this->story;
    }

    /**
     * Set the value of storyId
     *
     * @return  self
     */ 
    public function setStory($story)
    {
        $this->story = $story;

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
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFullname() {
        return $this->getFirstname().' '.$this->getLastname();
    }

    /**
     * Get the value of nickname
     */ 
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */ 
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of personnality
     */ 
    public function getPersonnality()
    {
        return $this->personnality;
    }

    /**
     * Set the value of personnality
     *
     * @return  self
     */ 
    public function setPersonnality($personnality)
    {
        $this->personnality = $personnality;

        return $this;
    }

    /**
     * Get the value of moralValues
     */ 
    public function getMoralValues()
    {
        return $this->moralValues;
    }

    /**
     * Set the value of moralValues
     *
     * @return  self
     */ 
    public function setMoralValues($moralValues)
    {
        $this->moralValues = $moralValues;

        return $this;
    }

    /**
     * Get the value of achillesHeel
     */ 
    public function getAchillesHeel()
    {
        return $this->achillesHeel;
    }

    /**
     * Set the value of achillesHeel
     *
     * @return  self
     */ 
    public function setAchillesHeel($achillesHeel)
    {
        $this->achillesHeel = $achillesHeel;

        return $this;
    }

    /**
     * Get the value of socialStanding
     */ 
    public function getSocialStanding()
    {
        return $this->socialStanding;
    }

    /**
     * Set the value of socialStanding
     *
     * @return  self
     */ 
    public function setSocialStanding($socialStanding)
    {
        $this->socialStanding = $socialStanding;

        return $this;
    }

    /**
     * Get the value of philosophy
     */ 
    public function getPhilosophy()
    {
        return $this->philosophy;
    }

    /**
     * Set the value of philosophy
     *
     * @return  self
     */ 
    public function setPhilosophy($philosophy)
    {
        $this->philosophy = $philosophy;

        return $this;
    }

    /**
     * Get the value of background
     */ 
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set the value of background
     *
     * @return  self
     */ 
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get the value of narrative
     */ 
    public function getNarrativeAnalysis()
    {
        return $this->narrativeAnalysis;
    }

    /**
     * Set the value of narrative
     *
     * @return  self
     */ 
    public function setNarrativeAnalysis($narrativeAnalysis)
    {
        $this->narrativeAnalysis = $narrativeAnalysis;

        return $this;
    }

    public function toArray()
    {
        $objectArray = get_object_vars($this);
        if(isset($objectArray['narrativeAnalysis'])) {
            $objectArray['narrativeAnalysis'] = $this->getNarrativeAnalysis()->toArray();
        }
        return $objectArray;
    }
}