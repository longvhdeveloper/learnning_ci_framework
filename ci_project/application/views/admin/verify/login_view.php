<div class="account-container">

    <div class="content clearfix">
        <?php
        if (isset($message) && $message != '') {
            echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<li>'.$message. '</li>';
            echo '</div>';
        }
        ?>
        <form action="<?php echo base_url() . 'admin/verify/login';?>" method="post">

            <h1>Member Login</h1>

            <div class="login-fields">

                <p>Please provide your details</p>

                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="fusername" value="" placeholder="Username" class="login username-field" />
                </div> <!-- /field -->

                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="fpassword" value="" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->

            </div> <!-- /login-fields -->

            <div class="login-actions">

				<span class="login-checkbox">
					<input id="frememberme" name="frememberme" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>

                <button type="submit" name="fsubmit" value="1" class="button btn btn-success btn-large">Sign In</button>

            </div> <!-- .actions -->



        </form>

    </div> <!-- /content -->

</div> <!-- /account-container -->



<div class="login-extra">
    <a href="#">Reset Password</a>
</div> <!-- /login-extra -->
