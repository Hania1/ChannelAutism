<?php


class Comment implements JsonSerializable {
    private $comment_id;
    private $content;
    private $created_date;
    private $fk_user_id;
    private $fk_discussion_id;


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