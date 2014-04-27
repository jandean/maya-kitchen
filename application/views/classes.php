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
            <div class="card">
                <div>
                    <a href="<?php echo base_url('index.php/content/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                </div>
                <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%">
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>