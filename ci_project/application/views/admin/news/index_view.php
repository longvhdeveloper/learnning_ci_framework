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
                            <h3>News list</h3>
                            <a href="<?php echo base_url() . $module . '/news/add'; ?>" class="btn btn-success my-btn pull-right"><i class="icon-plus"></i>Add news</a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Username</th>
                                    <th>Category</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($newss as $key => $news) {
                                    echo '<tr>';
                                    echo '<td>'.($key+1).'</td>';
                                    echo '<td>'.$news['title'].'</td>';
                                    echo '<td>'.$news['username'].'</td>';
                                    echo '<td>'.$news['name'].'</td>';
                                    echo '<td class="td-actions"><a href="'.base_url().  $module.'/news/edit/'.$news['id'].'" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a onclick="return confirm_delete(\'Are you sure?\')" href="'.base_url().  $module.'/news/delete/'.$news['id'].'" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>';
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

