<div class="col-md-9">
    <?php
        foreach($newss as $news) {


    ?>
    <div class="col-md-12 news-content">
        <h2 id="sec2" class="news-title"><?php echo $news['title']; ?></h2>
        <div class="col-md-4 news-image">
            <?php
                if ($news['image'] != '') {
                    echo '<img style="width:200px;height:200px;" src="' . base_url(). 'uploads/news_main/' .$news['image'].'" class="img-responsive">';
                } else {
                    echo '<img src="//placehold.it/200x200" class="img-responsive">';
                }
            ?>
        </div>
        <p>
        <?php 
        echo $news['info'];
		$urlTitle = unicode($news['title']); 
        ?>
        </p>
        <div><a href="<?php echo base_url() . 'news/detail/' . $news['id'] . '-' . $urlTitle . '.html'; ?>" class="view-detail">Xem thêm</a></div>
    </div>
    <?php } ?>
</div>