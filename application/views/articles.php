<div class="main" id="articles">
    <h1>ARTICLES</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Articles</a>
    </nav>

    <?php echo $side; ?>
    
    <div class="core">
        <?php if ($recordset) : ?>
            <h6>Recent Articles</h6>
            <?php foreach ($recordset as $row) : ?>
                <div class="articleSummary">
                    <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="225">
                    <div>
                        <a href="<?php echo base_url('index.php/content/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                        <?php echo substr($row->content, 0, 200); ?> [<a href="articles/vask.php">Read More</a>]
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