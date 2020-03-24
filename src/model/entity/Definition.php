<?php

class Definition extends BaseEntity
{

    private $id;
    private $sheetId;
    private $question;
    private $answer;
    private $keywords;
    private $owner;
    private $ownerId;
    private $createdAt;
    private $updatedAt;

    public function getManagerEntity() {
        return "DefinitionManager";
    }

    public function construct($data) {
        
        $this->setKeywords(json_encode(array()));
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
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of answer
     */ 
    public function getAnswer()
    {
        return $this->answer;
    }

    public function getAnswerEmpty() {

        $newAnswer = $this->getAnswer();
        $i = 0;
        foreach($this->getKeywordsArray() as $keyword => $options) {
            $input = "<input type='text' class='basicInput' data-informations='keyword-".$this->getId()."-".$i."'  />";
            $newAnswer = str_replace("[".$keyword."]", $input, $newAnswer);
            $i++;
        }

        return $newAnswer;
    }


    public function getAnswerFull() {

        $newAnswer = $this->getAnswer();
        $i = 0;
        foreach($this->getKeywordsArray() as $keyword => $options) {
            $newKeyword = "<span class='keywordAnswerFull'>".$keyword."</span>";
            $newAnswer = str_replace("[".$keyword."]", $newKeyword, $newAnswer);
            $i++;
        }

        return $newAnswer;
    }


    /**
     * Set the value of answer
     *
     * @return  self
     */ 
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }


    /**
     * Get the value of keywords
     */ 
    public function getKeywordsArray()
    {
        return json_decode($this->keywords, true);
    }

    /**
     * Get the value of keywords
     */ 
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set the value of keywords
     *
     * @return  self
     */ 
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }


    /**
     * Get the value of sheetId
     */ 
    public function getSheetId()
    {
        return $this->sheetId;
    }

    /**
     * Set the value of sheetId
     *
     * @return  self
     */ 
    public function setSheetId($sheetId)
    {
        $this->sheetId = $sheetId;

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

    public function toArray()
    {
        $objectArray = get_object_vars($this);
        return $objectArray;
    }
}
