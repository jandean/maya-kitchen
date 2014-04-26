<div class="main" id="articles">
    <h1>KIDS' CORNER</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Kids' Corner</a>
    </nav>

    <?php echo $side; ?>
    
    <div class="core">
        <?php if ($class_set) : ?>
            <h6>Classes for Kids</h6>
            <?php foreach ($class_set as $row) : ?>
                <div class="articleSummary">
                    <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="225">
                    <div>
                        <a href="<?php echo base_url('index.php/main/content/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                        <?php echo substr($row->content, 0, 200); ?> [<a href="<?php echo base_url('index.php/main/content/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <p></p>

        <?php if ($recipe_set) : ?>
            <h6>Recipes for Kids</h6>
            <?php foreach ($recipe_set as $row) : ?>
                <div class="articleSummary">
                    <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="225">
                    <div>
                        <a href="<?php echo base_url('index.php/main/recipe/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                        [<a href="<?php echo base_url('index.php/main/recipe/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="pagination-centered">
        <ul class="pagination">
            <?php echo $links; ?>
        </ul>
    </div>

</div>