<div class="col-md-9">
    <h2 id="sec2" class="news-title"><?php echo $news['title']; ?></h2>
    <div class="news-info"><?php echo $news['info']; ?></div>
    <div class="news-full">
        <div class="col-md-4 news-image">
            <?php
                if ($news['image'] != '') {
                    echo '<img style="width:300px;height:300px;" src="' . base_url(). 'uploads/news_main/' .$news['image'].'" class="img-responsive">';
                } else {
                    echo '<img src="//placehold.it/300x300" class="img-responsive">';
                }
            ?>
        </div>
        <?php
        echo $news['full'];
        ?>
    </div>
    <div class="news-author">
        <?php echo $news['author']; ?>
    </div>
    <hr class="col-md-12">
    <div class="others">
        <h3>Những tin tức khác :</h3>
<?php
if ($others != false) {
    echo '<ul>';
    foreach ($others as $key => $item) {
    	$urlTitle = unicode($item['title']);
        echo '<li><a href="'.base_url().'news/detail/'.$item['id'].'-'.$urlTitle.'.html">'.$item['title'].'</a></li>';
    }
    echo '</ul>';
}
?>
</div>
</div>