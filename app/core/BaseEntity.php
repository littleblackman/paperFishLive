<?php


abstract class BaseEntity
{
    public function __construct($data = null) {
        if($data) $this->hydrate($data);
    }

    public function hydrate($data) {   // ['email' => 's@s.fr', 'created_at' => '2020']
        foreach($data as $key => $value) {
            $elements = explode('_', $key);
            $new_key = "";                            // creation de setId   / setCreatedAt
            foreach($elements as $element) {
                $new_key .= ucfirst($element);  // new_key = CreatedAt
            } 
            $method = 'set'.$new_key;

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}