<div class="panel panel-default">
    <div class="panel-body">
        <?php if($loginInfo == 0) { ?>

        <?php
            if(isset($errors)) {
                foreach ($errors as $error) {
                    echo "<div class=\"alert alert-dismissible alert-danger fade in\">\n" .
                    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" .
                    "$error\n" .
                    "</div>\n";
                }
            }

            if(isset($success) && strlen($success) > 0) {
                echo "<div class=\"alert alert-dismissible alert-success fade in\">\n" .
                    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" .
                    "$success\n" .
                "</div>\n";
            }
        ?>

        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <legend>Register</legend>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <?php echo "<input type='text' class='form-control' name='email' value='" . @$values["email"] . "' placeholder='" . $defaults["email"] . "' >" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFirstPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-5">
                        <?php echo "<input type='password' class='form-control' id='password' name='password' value='" . @$values["password"] . "' placeholder='" . $defaults["password"] . "' >" ?>
                        <div class="checkbox">
                            <label><input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Show Password</label>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <?php echo "<input type='password' class='form-control' name='password_two' value='" . @$values["password_two"] . "' placeholder='" . $defaults["password_two"] . "' >" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Account Type</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="account_type" id="account_type" value="Student"
                                    onchange="document.getElementById('student_info').style.display = this.checked ? 'block' : 'none'">
                                Student
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="account_type" id="account_type" value="Faculty" checked=""
                                    onchange="document.getElementById('student_info').style.display = this.checked ? 'none' : 'block'">
                                Faculty
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-1 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <br>

        <?php } else { ?>
        <h3 class="lead">You are logged in! Log out to register!</h3>
        <?php } ?>
    </div>
</div>
