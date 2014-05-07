<div class="main" id="grid">
    <h1>CLASSES</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Classes</a>
    </nav>

    <?php echo $side; ?>

    <div class="core" id="classes">
        <!-- <h6>Lifestyle Courses</h6> -->
        <?php if ($recordset) : ?>
            <?php foreach ($recordset as $row) : ?>
            <?php if ($row->is_url == 1) : ?>
            <div class="card class">
                <a href="<?php echo $row->url; ?>" target="_blank"><h4><?php echo $row->title; ?></h4></a>
                <a href="<?php echo $row->url; ?>" target="_blank"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%"></a>
            </div>
            <?php else : ?>
            <div class="card class">
	            <h4><?php echo $row->title; ?></h4>
                <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%">
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="pagination-centered">
        <ul class="pagination">
            <?php echo $links; ?>
        </ul>
    </div>

</div>