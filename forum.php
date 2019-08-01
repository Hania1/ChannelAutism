<?php require_once ('controller/ctrl_main.php');?>
<?php require_once ('controller/ctrl_discussion.php'); ?>
<?php require_once('controller/ctrl_forum.php');?>

<?php require_once ('includes/top.php');?>


    <?php if (isset($_GET['topics']) && isset($chats)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card text-center m-2" style="background-color: <?= $topic[0]->colour ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $topic[0]->name ?></h5>
                    <p class="card-text"><?= $topic[0]->description ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(isset($chats)): ?>
    <div class="row">
        <div class="accordion w-100" id="accordionChats">
        <?php foreach ($chats as $c): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-header" id="heading<?= $c->discussion_id ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $c->discussion_id ?>" aria-expanded="true" aria-controls="collapse<?= $c->discussion_id ?>">
                                <?= $c->name ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?= $c->discussion_id ?>" class="collapse <?= (isset($_POST['discussion_id']) && $_POST['discussion_id'] == $c->discussion_id) ? 'show' : '' ?>" aria-labelledby="heading<?= $c->discussion_id ?>" data-parent="#accordionChats">
                        <div class="card-body">
                            <p><?= $c->content ?></p>
                            <hr>
                            <?php if(isset($_SESSION['id'])): ?>
                                <?php if ($_SESSION['isAdmin']): ?>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="discussion_id" value="<?= $c->discussion_id ?>">
                                        <input type="hidden" name="code" value="delete_discussion">
                                        <input type="submit" class="btn btn-danger" value="DELETE DISCUSSION">
                                    </form>
                                <?php endif; ?>
                                <button id="commentButton<?= $c->discussion_id ?>" class="btn btn-primary" onclick="toggleForm(<?= $c->discussion_id ?>)">Add Comment</button>
                                <div id="toggleForm<?= $c->discussion_id ?>" style="display: none;">
                                    <form method="post">
                                        <textarea class="form-control" name="comment" required></textarea>
                                        <input type="hidden" name="discussion_id" value="<?= $c->discussion_id ?>">
                                        <input type="hidden" name="code" value="add_comment">
                                        <input type="submit" class="btn btn-success" value="Post Comment">
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php foreach ($c->comments as $comm): ?>
                                <hr>
                            <div class="row">
                                <div class="col-lg-3">
                                    <p><small><?= $comm->display_name[0]->display_name ?></small></p>
                                    <p><small><?= $comm->created_date ?></small></p>
                                </div>
                                <div class="col-lg-9">
                                    <p><?= $comm->content ?></p>
                                    <?php if(isset($_SESSION['id'])): ?>
                                        <button id="replyButton<?= $comm->comments_id ?>" class="btn btn-primary float-right" onclick="toggleReplyForm(<?= $comm->comments_id ?>)">Reply</button>
                                        <div id="toggleReplyForm<?= $comm->comments_id ?>" style="display: none;">
                                            <form method="post">
                                                <textarea class="form-control" name="reply" required></textarea>
                                                <input type="hidden" name="parent_id" value="<?= $comm->comments_id ?>">
                                                <input type="hidden" name="discussion_id" value="<?= $c->discussion_id ?>">
                                                <input type="hidden" name="code" value="reply_comment">
                                                <input type="submit" class="btn btn-success" value="Reply">
                                            </form>
                                        </div>
                                        <?php if ($_SESSION['isAdmin']): ?>
                                            <form method="post" class="float-right">
                                                <input type="hidden" name="discussion_id" value="<?= $comm->comment_id ?>">
                                                <input type="hidden" name="code" value="delete_comment">
                                                <input type="submit" class="btn btn-danger" value="DELETE COMMENT">
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <?php if (count($comm->replies) > 0) : ?>
                                    <?php foreach ($comm->replies as $reply): ?>
                                        <div class="offset-1 col-lg-3 col-11">
                                            <p><small><?= $reply->display_name[0]->display_name ?></small></p>
                                            <p><small><?= $reply->created_date ?></small></p>
                                        </div>
                                        <div class="offset-1 col-lg-7 col-11">
                                            <p><?= $reply->content ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($topics) && !isset($_GET['topics'])): ?>
    <div class="row">
    <?php foreach ($topics as $t): ?>
        <div class="col-md-4">
            <a class="anchor_no_style" href="forum.php?topics=<?= $t->topic_id ?>">
                <div class="card text-center m-2" style="background-color: <?= $t->colour ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $t->name ?></h5>
                        <p class="card-text"><?= $t->description ?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>





<?php require_once ('includes/bottom.php');?>

<script>
    function toggleForm(id) {
        $('#toggleForm' + id).toggle();
        $('#commentButton' + id).toggle();
    }

    function toggleReplyForm(id) {
        console.log(id);
        $('#toggleReplyForm' + id).toggle();
        $('#replyButton' + id).toggle();
    }
</script>



