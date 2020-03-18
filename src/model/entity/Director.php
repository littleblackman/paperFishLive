<?php

class Director extends BaseEntity
{
    private $id;
    private $firstname;
    private $lastname;
    private $information;


    public function getManagerEntity() {
        return "DirectorManager";
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
     * Get the value of information
     */ 
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set the value of information
     *
     * @return  self
     */ 
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }
}