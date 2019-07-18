<?php
require_once ('database/data.php');


class Discussion implements JsonSerializable {
    private $discussion_id;
    private $name;
    private $content;
    private $created_date;
    private $comments = [];

    public function __construct() {
        $db = new Data();
        $this->comments = $db->getAllCommentsByDiscussionId($this->discussion_id);
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