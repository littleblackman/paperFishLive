<?php

abstract class BaseEntity
{
    public function __construct($data = null) {
        if($data) $this->hydrate($data);
    }

    abstract public function getManagerEntity();
    
    public function hydrate($data) {   
        foreach($data as $key => $value) {
            $elements = explode('_', $key);
            $new_key = "";                           
            foreach($elements as $element) {
                $new_key .= ucfirst($element);
            } 
            $method = 'set'.$new_key;

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function save() {
        $managerName = $this->getManagerEntity();
        $manager = new $managerName(); 
        return $manager->save($this);
    }


    public function delete() {
        $managerName = $this->getManagerEntity();
        $manager = new $managerName(); 
        $manager->delete($this->getId());
    }
}