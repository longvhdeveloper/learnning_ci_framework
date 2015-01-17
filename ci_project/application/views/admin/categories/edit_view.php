<div class="main">
<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-large"></i>
                        <h3>Category / Edit</h3>
                    </div>
                    <div class="widget-content">
                        <?php
                            if (validation_errors('<li>', '</li>') != '') {
                                echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo validation_errors('<li>', '</li>');
                                echo '</div>';
                            }
                        ?>
                        <form action="<?php echo base_url(). 'admin/categories/edit/' . $category['id'] ?>" method="post">
                            <div class="form-data">
                                <div class="form-group">
                                    <label for="fname">Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter category name" value="<?php echo $category['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="fparent">Parent</label>
                                    <select id="fparent" name="fparent" class="form-control">
                                        <option value="0">----</option>
                                        <?php
                                            echo callMenu($categories, 0, '', $category['parent']);
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="fsubmit" name="fsubmit" value="Edit" class="btn btn-success" />
                                </div>
                            </div>
                        </form>
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