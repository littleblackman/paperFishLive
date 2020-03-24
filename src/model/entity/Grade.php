<?php

class Grade extends BaseEntity
{
    private $id;
    private $name;
    private $constantKey;
    private $groupGrade;
    private $orderValue;

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

    /**
     * Get the value of groupGrade
     */ 
    public function getGroupGrade()
    {
        return $this->groupGrade;
    }

    /**
     * Set the value of groupGrade
     *
     * @return  self
     */ 
    public function setGroupGrade($groupGrade)
    {
        $this->groupGrade = $groupGrade;

        return $this;
    }

    /**
     * Get the value of orderValue
     */ 
    public function getOrderValue()
    {
        return $this->orderValue;
    }

    /**
     * Set the value of orderValue
     *
     * @return  self
     */ 
    public function setOrderValue($orderValue)
    {
        $this->orderValue = $orderValue;

        return $this;
    }
}