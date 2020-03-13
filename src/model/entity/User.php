<?php


class User extends BaseEntity
{
    private $email;
    private $password;
    private $role;

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
        $this->role = $role:
    }

    public function getRole() {
        return $this->role;
    }

}