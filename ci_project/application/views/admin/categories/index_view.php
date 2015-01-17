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
                            <h3>Category list</h3>
                            <a id="add_categories" href="javascript:void(0);" class="btn btn-success my-btn pull-right"><i class="icon-plus"></i>Add category</a>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content" id="categorylist">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($categories as $key => $category) {
                                    echo '<tr>';
                                    echo '<td>'.($key+1).'</td>';
                                    echo '<td>'.$category['name'].'</td>';
                                    echo '<td class="td-actions"><a href="'.base_url().  $module.'/categories/edit/'.$category['id'].'" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a onclick="return confirm_delete(\'Are you sure?\')" href="'.base_url().  $module.'/categories/delete/'.$category['id'].'" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="widget-content hideinit" id="category" style="margin-top:10px;">
                            <div class="alert alert-danger my_error hideinit" role="alert"></div>
                            <form action="" method="post" id="my_form">
                                <div class="form-data">
                                    <div class="form-group">
                                        <label for="fname">Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label for="fparent">Parent</label>
                                        <select id="fparent" name="fparent" class="form-control">
                                            <option value="0">----</option>
                                            <?php
                                            echo callMenu($categories);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="fsubmit" name="fsubmit" value="Add" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
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

