<?php require_once ('controller/ctrl_main.php');?>
<?php require_once('controller/ctrl_forum.php');?>
<?php require_once ('controller/ctrl_discussion.php'); ?>
<?php require_once ('includes/top.php');?>


<div class="row">
    <?php if (isset($_GET['topics']) && isset($chats)): ?>
        <?php foreach ($chats as $c): ?>
            <div class="col-9">
                <h6><?= $c->name ?></h6>
                <p class="muted"><?= $c->content ?></p>
            </div>
        <div class="col-3">
            <span><?= $c->created_date ?></span>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($topics)): ?>
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
    <?php endif; ?>

</div>




<?php require_once ('includes/bottom.php');?>





