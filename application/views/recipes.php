<div class="main" id="grid">
    <h1>RECIPES</h1>
    <nav class="breadcrumb">
        <a href="index.php">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Recipes</a>
    </nav>

    <?php echo $side; ?>

    <div class="core" id="recipes">
        <!-- <h6>November 2013</h6> -->
        <?php if ($recordset) : ?>
            <?php foreach ($recordset as $row) : ?>
            <div class="card">
                <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%">
                <div>
                    <a href="<?php echo base_url('index.php/main/recipe/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
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