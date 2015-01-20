<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-large"></i>
                            <h3>News / Edit</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                            // if (validation_errors('<li>', '</li>') != '') {
                            //     echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                            //     echo validation_errors('<li>', '</li>');
                            //     echo '</div>';
                            // }

                            if (isset($error)) {
                                echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo '<li>'.$error.'</li>';
                                echo '</div>';
                            }
                            ?>
                            <form action="<?php echo base_url() . $module; ?>/news/edit/<?php echo $news['id']; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-data">
                                    <div class="form-group">
                                        <label for="ftitle">Title</label>
                                        <input type="text" class="form-control" id="ftitle" name="ftitle" placeholder="Enter title" value="<?php echo $news['title'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="finfo">Info</label>
                                        <textarea name="finfo" id="finfo" cols="35" rows="4"><?php echo $news['info']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="fdetail">Detail</label>
                                        <textarea name="fdetail" id="fdetail" cols="50" rows="40"><?php echo $news['full']; ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace( 'fdetail' );
                                            CKEDITOR.replace( 'finfo' );
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="fauthor">Author</label>
                                        <input type="text" class="form-control" name="fauthor" id="fauthor" placeholder="Enter author" value="<?php echo $news['author']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fimage">Image</label>
                                        <input type="file" name="ffile" /><br/>
                                        <?php
                                        if ($news['image'] != '') {
                                            echo '<image width="150" src="'.base_url() .'uploads/news_main/'.$news['image'].'" />';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="fcategory">Parent</label>
                                        <select id="fcategory" name="fcategory" class="form-control">
                                            <?php
                                            echo callMenu($categories,0, '', $news['cat_id']);
                                            ?>
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