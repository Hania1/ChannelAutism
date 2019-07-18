<?php

    require_once ('database/data.php');
    require_once ('model/model_topics.php');
    require_once ('model/model_discussion.php');

    $db = new Data();

    if (isset($_SESSION['id'])) {
        if (isset($_POST['code'])) {
            if ($_POST['code'] == 'add_comment') {
                $db->createComment($_POST['comment'], $_SESSION['id'], $_POST['discussion_id']);
            }
        }

        if(isset($_POST ['code']) && $_POST ['code'] == 'add_discussion') {
            $discussion_id = $db ->createDiscussion($_POST['discussion_title'], $_POST['discussion_content'], $_SESSION ['id']);
            if ($discussion_id) {
                for ($i = 0; $i < count($_POST ['topic_select']); $i++) {
                    $db ->createDiscussionTopic($_POST['topic_select'][$i], $discussion_id);
                }
            }
        }
    }

    $topics = $db->getAllTopics();

?>