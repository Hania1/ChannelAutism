<?php


class Discussion implements JsonSerializable {
    private $discussion_id;
    private $name;
    private $content;
    private $created_date;

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