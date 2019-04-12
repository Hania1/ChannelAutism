



<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email_address">Email address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                    </div>

                    <div class="form-group">
                        <label for="pw">Password</label>
                        <input type="password" class="form-control" id="pw" name="pw" placeholder="Enter Password" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden"  name="code" value="login">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>