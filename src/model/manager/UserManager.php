<?php



class UserManager extends BddManager
{

    public function create($data) {

        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO user SET email = :email, password = :password";

        $stmt = $this->prepare($query);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if(!$result = $stmt->fetch(PDO::FETCH_ASSOC)) return null;

        $user = new User($result);

        return $user;

    }
}