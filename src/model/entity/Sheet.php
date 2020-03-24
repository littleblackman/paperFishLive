<?php



class Sheet extends BaseEntity
{
    private $id;
    private $topic;
    private $topicId;
    private $topicName;
    private $title;
    private $description;
    private $grade;
    private $gradeName;
    private $gradeId;
    private $owner;
    private $definitions;
    private $slug;
    private $visibility;
    private $ownerId;
    private $createdAt;
    private $updatedAt;
   
    public function getManagerEntity() {
        return "SheetManager";
    }

    public function __construct($data = null) {
        $this->setCreatedAt(date('Y-m-d'));
        $this->setUpdatedAt(date('Y-m-d'));
        parent::__construct($data);
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
     * Get the value of topic
     */ 
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     *
     * @return  self
     */ 
    public function setTopic($topic)
    {
        $this->topic = $topic;

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
     * Get the value of grade
     */ 
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

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
     * Get the value of definitions
     */ 
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * Set the value of definitions
     *
     * @return  self
     */ 
    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;

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
     * Get the value of topicId
     */ 
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * Set the value of topicId
     *
     * @return  self
     */ 
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;

        return $this;
    }

    /**
     * Get the value of gradeId
     */ 
    public function getGradeId()
    {
        return $this->gradeId;
    }

    /**
     * Set the value of gradeId
     *
     * @return  self
     */ 
    public function setGradeId($gradeId)
    {
        $this->gradeId = $gradeId;

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


    public function toArray()
    {
        $objectArray = get_object_vars($this);
        return $objectArray;
    }

    /**
     * Get the value of gradeName
     */ 
    public function getGradeName()
    {
        return $this->gradeName;
    }

    /**
     * Set the value of gradeName
     *
     * @return  self
     */ 
    public function setGradeName($gradeName)
    {
        $this->gradeName = $gradeName;

        return $this;
    }

    /**
     * Get the value of topicName
     */ 
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * Set the value of topicName
     *
     * @return  self
     */ 
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}