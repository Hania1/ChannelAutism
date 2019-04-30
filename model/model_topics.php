<?php


class Topic implements JsonSerializable {
    private $topic_id;
    private $name;
    private $description;
    private $colour;

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