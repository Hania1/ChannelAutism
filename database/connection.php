<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

class DBconn {
    protected $pdoconn;

    public function __construct() {

        try {
            $db_host= "localhost";
            $db_name= "ChannelAutism";
            $db_user= "channela_user";
            $db_pass = "ChannelAutism";

            $this->pdoconn = new PDO ("mysql:host=$db_host;dbname=$db_name; charset=utf8mb4", $db_user, $db_pass);
            $this->pdoconn->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'CONNECTION ERROR:' . $ex->getMessage();
        }
    }
    public  function getPdo() {
        return $this->pdoconn;
    }
}

?>