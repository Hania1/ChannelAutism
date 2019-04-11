<?php
require_once ('database/connection.php');


class Data extends DBconn {

    protected $pdo;

    public function __construct(){
        parent :: ___construct ();
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




}




?>

