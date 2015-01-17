<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
<?php
if (isset($message) && $message != '') {
    echo '<div class="alert alert-success" role="alert"><li>'.$message.'</li></div>';
}
?>
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>User list</h3>
                            <a href="<?php echo base_url() . $module . '/user/add'; ?>" class="btn btn-success my-btn pull-right"><i class="icon-plus"></i>Add user</a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($users as $key => $user) {
                                    echo '<tr>';
                                    echo '<td>'.($key+1).'</td>';
                                    echo '<td>'.$user['username'].'</td>';
                                    echo '<td>'.$user['email'].'</td>';
                                    echo '<td>'.($user['level'] == 2 ? '<font color="red">Administrator</font>' : 'Member').'</td>';
                                    echo '<td class="td-actions"><a href="'.base_url().  $module.'/user/edit/'.$user['id'].'" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a href="'.base_url().  $module.'/user/delete/'.$user['id'].'" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /widget-content -->
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

<?php echo $page_link ?>

