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
    <form action="<?php echo base_url() . $module; ?>/user/add" method="post">
        <div class="form-data">
            <div class="form-group">
                <label for="fusername">Username</label>
                <input type="text" class="form-control" id="fusername" name="fusername" placeholder="Enter username">
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
                <input type="email" class="form-control" name="femail" id="femail" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="flevel">Level</label>
                <select id="flevel" name="flevel" class="form-control">
                    <option value="1">Member</option>
                    <option value="2">Administrator</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="fsubmit" value="Add" class="btn btn-success" />
            </div>
        </div>
    </form>
  </div>
</div>