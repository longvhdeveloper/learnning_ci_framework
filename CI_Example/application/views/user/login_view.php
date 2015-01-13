<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style type="text/css">
    .errors{
        width: 350px;
        background: pink;
        color: red;
        padding: 1px 10px;
    }
    </style>
</head>
<body>
    <form action="<?php echo base_url() . 'index.php/user/login' ?>" method="post">
        <div style="margin:50px auto;width:350px;">
            <?php
            if (validation_errors() != '') {?>
            <div class="errors">
                <?php
                echo validation_errors();
                ?>
            </div>
            <?php }
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "$error <br/>";
                }
            }
            
            echo $this->session->flashdata('flash_login');
            ?>
            <h1 style="margin-left:75px;">Login</h1>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="fusername" size="25" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="fpassword" size="25" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login" name="fsubmit" /></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>