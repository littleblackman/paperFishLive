<?php


class User extends BaseEntity
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;

    public function getManagerEntity() {
        return "UserManager";
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getUserName(){
        return $this->getFirstname().' '.ucfirst($this->getLastname()[0]).'.';
    }

    public function getInitials() {
        return strtoupper($this->getFirstname()[0].$this->getLastname()[0]);
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setRole($role) 
    {
        $this->role = $role;
    }

    public function getRole() {
        return $this->role;
    }

    public function addAccess($access) {
        $this->accesss[] = $access;
    }

    public function getAccessArray()
    {
        return $this->accesss;
    }

}