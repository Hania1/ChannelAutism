



<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupeModalLabel">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
            <div class="modal-body">

                    <div class="form-group">
                        <label for="email_address">Email address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" aria-describedby="emailHelp" placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                        <label for="display">Display Name</label>
                        <input type="text" class="form-control" id="display" name="display" placeholder="Enter Display Name">
                    </div>

                    <div class="form-group">
                        <label for="pw1">Password</label>
                        <input type="password" class="form-control" id="pw1" name="pw1" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="pw2">Confirm Password</label>
                        <input type="password" class="form-control" id="pw2" name="pw2" placeholder="Re-Enter Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="check" name="check">
                        <label class="form-check-label" for="check">Accept Terms & Conditions</label>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Sign Up">
                </div>
            </form>
        </div>
    </div>
</div>