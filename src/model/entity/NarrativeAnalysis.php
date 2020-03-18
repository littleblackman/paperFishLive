<?php


class NarrativeAnalysis extends BaseEntity
{
    private $id;
    private $questItem;
    private $receiver;
    private $sender;
    private $adjuvant;
    private $opponent;
    private $evolution;
    
    public function getManagerEntity() {
        return "NarrativeAnalysisManager";
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
     * Get the value of questItem
     */ 
    public function getQuestItem()
    {
        return $this->questItem;
    }

    /**
     * Set the value of questItem
     *
     * @return  self
     */ 
    public function setQuestItem($questItem)
    {
        $this->questItem = $questItem;

        return $this;
    }

    /**
     * Get the value of receiver
     */ 
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set the value of receiver
     *
     * @return  self
     */ 
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get the value of sender
     */ 
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set the value of sender
     *
     * @return  self
     */ 
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get the value of adjuvant
     */ 
    public function getAdjuvant()
    {
        return $this->adjuvant;
    }

    /**
     * Set the value of adjuvant
     *
     * @return  self
     */ 
    public function setAdjuvant($adjuvant)
    {
        $this->adjuvant = $adjuvant;

        return $this;
    }

    /**
     * Get the value of opponent
     */ 
    public function getOpponent()
    {
        return $this->opponent;
    }

    /**
     * Set the value of opponent
     *
     * @return  self
     */ 
    public function setOpponent($opponent)
    {
        $this->opponent = $opponent;

        return $this;
    }

    /**
     * Get the value of evolution
     */ 
    public function getEvolution()
    {
        return $this->evolution;
    }

    /**
     * Set the value of evolution
     *
     * @return  self
     */ 
    public function setEvolution($evolution)
    {
        $this->evolution = $evolution;
        return $this;
    }


    public function toArray()
    {
        $objectArray = get_object_vars($this);
        return $objectArray;
    }

}