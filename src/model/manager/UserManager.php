<?php



class UserManager extends BddManager
{
    private $session;
    private $userValidator;

    public function getTableName() { return "user";}
    public function getEntityName() {return "User";}


    public function __construct() {
        parent::__construct();
        $this->session = new Session();
        $this->userValidator = new UserValidator($this);
    }

    public function save($data) {

        if(!$this->validData($data)) return ['Problème sur votre inscription', 'error']; 

        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $query = "INSERT INTO user SET email = :email, password = :password, firstname = :firstname, lastname = :lastname";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':firstname', $data['firstname']);
        $stmt->bindValue(':lastname', $data['lastname']);
        $stmt->execute();
        return ['Super, votre compte a bien été créé, vous pouvez vous connecter', 'success'];
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) return null;
        $user = new User($result);
        return $user;
    }

    public function validData($datas) {


        $valid = true;

        foreach($datas as $type => $value) {
            if($type == "email") {
                if(!$this->userValidator->validEmail($value)) {
                    $this->session->setFlashMessage("Votre email est incorrect", "error");
                    $valid = false;
                }
            }
            if($type == "email") {
                if($this->userValidator->ifEmailExist($value)) {
                    $this->session->setFlashMessage("cet email existe déjà", "error");
                    $valid = false;
                }
            }
        }

        return $valid;
    }
}