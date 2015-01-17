<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-large"></i>
                            <h3>User / Add</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                            if (validation_errors('<li>', '</li>') != '') {
                                echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo validation_errors('<li>', '</li>');
                                echo '</div>';
                            }
                            ?>
                            <form action="<?php echo base_url() . $module; ?>/user/edit/<?php echo $user['id'] ?>" method="post">
                                <div class="form-data">
                                    <div class="form-group">
                                        <label for="fusername">Username</label>
                                        <input type="text" class="form-control" id="fusername" name="fusername" placeholder="Enter username" value="<?php echo $user['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fpassword">Password</label>
                                        <input type="password" class="form-control" id="fpassword" name="fpassword" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="fpassword2">Re-Password</label>
                                        <input type="password" class="form-control" id="fpassword2" name="fpassword2" placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="femail">Email</label>
                                        <input type="email" class="form-control" name="femail" id="femail" placeholder="Enter email" value="<?php echo $user['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="flevel">Level</label>
                                        <select id="flevel" name="flevel" class="form-control">
                                            <option value="1" <?php if($user['level'] == 1){ echo 'selected'; } ?> >Member</option>
                                            <option value="2" <?php if($user['level'] == 2){ echo 'selected'; } ?>>Administrator</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="fsubmit" value="Edit" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->