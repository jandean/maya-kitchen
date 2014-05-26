<div class="main" id="grid">
    <h1>PRODUCTS</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Products</a>
    </nav>

    <?php echo $side; ?>

    <div class="core" id="products">
        <!-- <h6>November 2013</h6> -->
        <?php
        if ($recordset) :
            foreach ($recordset as $row) :
                if ($row->is_url == 1) : ?>
                    <div class="card">
                        <a href="<?php echo $row->url; ?>" target="_blank"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%"></a>
                        <div>
                            <a href="<?php echo $row->url; ?>" target="_blank"><h4><?php echo $row->title; ?></h4></a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="card">
                        <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%">
                        <div>
                            <h4><?php echo $row->title; ?></h4>
                        </div>
                    </div>
                <?php
                endif;
            endforeach;
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