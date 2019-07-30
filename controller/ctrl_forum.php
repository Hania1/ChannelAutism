<?php

require_once ('database/data.php');
require_once ('model/model_topics.php');
require_once ('model/model_discussion.php');
require_once ('model/model_comment.php');

$chats = null;
unset($chats);
$topic = null;
$db = new Data();

if (isset($_GET['topics'])) {
    $chats = $db->getAllDiscussionsByTopic($_GET['topics']);
    $topic = $db->getTopicById($_GET['topics']);
}

if (isset($_GET['search'])) {
    $chats = $db->searchDiscussions($_GET['search']);
}

?>