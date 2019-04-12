<?php
require_once ('database/connection.php');


class Data extends DBconn {

    protected $pdo;

    public function __construct(){
        parent :: __construct ();
        $this->pdo = $this->getPdo();
    }

    public function addNewUser($email,$display,$pw) {
        $sql="INSERT INTO user (email_address,display_name,pw) VALUES (?,?,?)";
        $statement= $this->pdo ->prepare($sql);
        $result = $statement->execute([$email,$display,$pw]);
        if ($result) {
            return $this->pdo->lastInsertId();
        }
        else {
            return false;
        }

    }
       public function checkIfEmailAddressExists($email){
        $sql="SELECT * FROM user WHERE email_address = ?";
        $statement= $this->pdo->prepare($sql);
        $statement -> execute([$email]);
        $result = $statement -> fetchAll (PDO :: FETCH_CLASS,"User");
        if ($result) {
            return true;
        }
        return false;

    }

    public function checkIfDisplayNameExists($display){
        $sql="SELECT * FROM user WHERE display_name = ?";
        $statement= $this->pdo->prepare($sql);
        $statement -> execute([$display]);
        $result = $statement -> fetchAll (PDO :: FETCH_CLASS,"User");
        if ($result) {
            return true;
        }
        return false;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user WHERE email_address = ?";
        $statement = $this ->pdo->prepare($sql);
        $statement->execute([$email]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "User");
    }
}




?>

