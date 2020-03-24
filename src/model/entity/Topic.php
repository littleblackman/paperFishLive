<?php

class Topic extends BaseEntity
{
    private $id;
    private $name;
    private $constantKey;

    public function getManagerEntity() {
        return "TopicManager";
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of constantKey
     */ 
    public function getConstantKey()
    {
        return $this->constantKey;
    }

    /**
     * Set the value of constantKey
     *
     * @return  self
     */ 
    public function setConstantKey($constantKey)
    {
        $this->constantKey = $constantKey;

        return $this;
    }
}