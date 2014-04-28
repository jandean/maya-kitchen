<div class="main" id="home">
    <div class="topTier">
        <?php echo $banner; ?>
        <br>
        <div>
            <a href="<?php echo base_url('index.php/classes'); ?>"><img src="<?php echo base_url('images/essential/classes.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/classes'); ?>">CLASSES</a>
        </div>
        <div>
            <a href="<?php echo base_url('index.php/recipes'); ?>"><img src="<?php echo base_url('images/essential/recipes.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/recipes'); ?>">RECIPES</a>
        </div>
        <div>
            <a href="<?php echo base_url('index.php/articles'); ?>"><img src="<?php echo base_url('images/essential/articles.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/articles'); ?>">ARTICLES</a>
        </div>
    </div>

    <?php echo $side; ?>

    <div class="core">
        <?php if ($recordset) : ?>
            <h6>Recent Articles</h6>
            <?php foreach ($recordset as $row) : ?>
                <div class="articleSummary">
                    <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="40">
                    <div>
                        <a href="<?php echo base_url('index.php/articles/' . $row->slug); ?>"><h4><?php echo html_entity_decode($row->title); ?></h4></a>
                        <?php echo substr($row->content, 0, 200); ?> [<a href="<?php echo base_url('index.php/articles/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>