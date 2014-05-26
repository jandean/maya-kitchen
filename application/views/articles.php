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
                    <a href="<?php echo base_url('articles/' . $row->slug); ?>"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="225"></a>
                    <div>
                        <a href="<?php echo base_url('articles/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                        <?php echo substr(strip_tags($row->content), 0, 220); ?>... [<a href="<?php echo base_url('articles/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php endforeach;
        else:
            foreach ($default_view as $row) :
                echo "<p>{$row->content}</p>";
            endforeach;
        endif; ?>
    </div>

    <div class="pagination-centered">
        <ul class="pagination">
            <?php echo $links; ?>
        </ul>
    </div>

</div>