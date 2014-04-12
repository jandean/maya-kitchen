<div class="main" id="home">
    <div class="topTier">
        <h1>Welcome to the Maya Kitchen</h1>
        <h5>Take a look at the classes we offer, try out our recipes, or catch up with our latest news!</h5>
        <img src="<?php echo base_url('images/essential/feb-feature-class-02.jpg'); ?>" style="width: 100%; margin-bottom: 30px; padding: 0 28px;">
        <br>
        <div>
            <a href="<?php echo base_url('index.php/main/classes'); ?>"><img src="<?php echo base_url('images/essential/classes.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/main/classes'); ?>">CLASSES</a>
        </div>
        <div>
            <a href="<?php echo base_url('index.php/main/recipes'); ?>"><img src="<?php echo base_url('images/essential/recipes.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/main/recipes'); ?>">RECIPES</a>
        </div>
        <div>
            <a href="<?php echo base_url('index.php/main/articles'); ?>"><img src="<?php echo base_url('images/essential/articles.jpg'); ?>"></a>
            <a href="<?php echo base_url('index.php/main/articles'); ?>">ARTICLES</a>
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
                        <a href="<?php echo base_url('index.php/main/article/' . $row->slug); ?>"><h4><?php echo html_entity_decode($row->title); ?></h4></a>
                        <?php echo substr($row->content, 0, 200); ?> [<a href="articles/vask.php">Read More</a>]
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>