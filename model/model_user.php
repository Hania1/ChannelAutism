<?php


class User implements JsonSerializable {
    private $user_id;
    private $email_address;
    private $display_name;
    private $pw;

    public function __get($name) {
        return $this -> $name;

    }
    public function __set($name, $value) {
        $this->$name = $value;

    }
    public function jsonSerialize() {

        return get_object_vars($this);
    }

}


?>