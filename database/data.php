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

    public function isAdmin($user_id) {
        $sql = "SELECT user_id FROM user WHERE user_id = ? AND user_type = 'admin'";
        $statement = $this ->pdo->prepare($sql);
        $statement->execute([$user_id]);
        $result = $statement->fetchAll();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function createTopic ($name, $description){
        $sql = "INSERT INTO topics (name, description) VALUES (?,?)";
        $statement= $this->pdo ->prepare($sql);
        $result = $statement->execute([$name,$description]);
        if ($result) {
            return $this->pdo->lastInsertId();
        }
        else {
            return false;
        }
    }

   public function getAllTopics ()
   {
       $sql = "SELECT * FROM topics";
       $statement = $this->pdo->prepare($sql);
       $statement->execute();
       return $statement->fetchAll(PDO::FETCH_CLASS, "Topic");
   }

    public function getTopicById ($topic_id)
    {
        $sql = "SELECT * FROM topics WHERE topic_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$topic_id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Topic");
    }

   public function createDiscussion ($name, $content, $id)
   {
       $sql = "INSERT INTO discussion (name, content, fk_user_id) VALUES (?,?,?)";
       $statement = $this->pdo->prepare($sql);
       $result = $statement->execute([$name, $content, $id]);
       if ($result) {
           return $this->pdo->lastInsertId();
       } else {
           return false;
       }
   }
    public function createDiscussionTopic ($topic_id, $discussion_id)
    {
        $sql = "INSERT INTO discussion_topics (fk_topic_id, fk_discussion_id) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([$topic_id, $discussion_id]);
        if ($result) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }
    public function getAllDiscussions ()
    {
        $sql = "SELECT * FROM discussion";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, "Discussion");
    }


    public function getDiscussionsById ($id)
    {
        $sql = "SELECT * FROM discussion WHERE discussion_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Discussion");
    }

    public function getAllDiscussionsByTopic ($topic_id)
    {
        $sql = "SELECT discussion.discussion_id, discussion.name, discussion.content, discussion.created_date 
                FROM discussion, discussion_topics 
                WHERE discussion.discussion_id = discussion_topics.fk_discussion_id 
                AND discussion_topics.fk_topic_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$topic_id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Discussion");
    }


    public function getAllCommentsByDiscussionId ($discussion_id)
    {
        $sql = "SELECT * FROM comments WHERE parent_id = -1 AND fk_discussion_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$discussion_id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Comment");
    }

    public function getAllRepliesByParentId ($parent)
    {
        $sql = "SELECT * FROM comments WHERE parent_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$parent]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Comment");
    }
    public function getUserDisplayNameById($user_id) {
        $sql = "SELECT display_name FROM user WHERE user_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$user_id]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "User");
    }

    public function createComment ($content, $user_id, $discussion_id, $parent_id = -1)
    {
        $sql = "INSERT INTO comments (content, fk_user_id, fk_discussion_id, parent_id) VALUES (?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute([$content, $user_id, $discussion_id, $parent_id]);
        if ($result) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }

    public function searchDiscussions($search) {
        $sql = "SELECT discussion.discussion_id, discussion.name, discussion.content, discussion.created_date 
                FROM discussion
                WHERE discussion.name LIKE ?
                OR discussion.content LIKE ?";
        $wild = "%" . $search . "%";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$wild, $wild]);
        return $statement->fetchAll(PDO::FETCH_CLASS, "Discussion");
    }
}






?>

