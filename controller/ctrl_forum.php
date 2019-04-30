<?php

require_once ('database/data.php');
require_once ('model/model_topics.php');
require_once ('model/model_discussion.php');

$chats = null;
unset($chats);

if (isset($_GET['topics'])) {
    $db = new Data();
    $chats = $db->getAllDiscussionsByTopic($_GET['topics']);
}

?>