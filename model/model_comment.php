<?php


class Comment implements JsonSerializable {
    private $comments_id;
    private $content;
    private $created_date;
    private $fk_user_id;
    private $fk_discussion_id;
    private $display_name;

    public function __construct() {
        $db = new Data();
        $this->display_name = $db->getUserDisplayNameById($this->fk_user_id);
    }

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