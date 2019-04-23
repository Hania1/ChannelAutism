


<div class="modal fade" id="discussionModal" tabindex="-1" role="dialog" aria-labelledby="discussionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="discussionModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="discussion_title">Discussion Title</label>
                        <input type="text" class="form-control" id="discussion_title" name="discussion_title" placeholder="Enter Text Here" required>
                    </div>
                    <div class="form-group">
                        <label for="discussion_content"> Discussion Content</label>
                        <textarea class="form-control" id="discussion_content" name="discussion_content" rows="6" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="topic_select">Select a Topic</label>
                        <select class="form-control" id="topic_select" name="topic_select[]" multiple required>
                            <?php foreach ($topics as $t): ?>
                                <option value="<?= $t->topic_id ?>"><?= $t->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="code" value="add_discussion">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>