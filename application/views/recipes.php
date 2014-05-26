<div class="main" id="grid">
    <h1>RECIPES</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Recipes</a>
    </nav>

    <?php echo $side; ?>

    <div class="core" id="recipes">
        <?php
        if (!is_null($filter))
            echo "<h6>CATEGORY: {$filter->name}</h6>";

        if ($recordset) :
            foreach ($recordset as $row) : ?>
            <div class="card">
                <img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%">
                <div>
                    <a href="<?php echo base_url('recipes/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
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