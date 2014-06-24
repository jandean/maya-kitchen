<div class="main" id="grid">
    <h1>RECIPES</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Recipes</a>
    </nav>

    <?php echo $side; ?>

    <?php
    if (!is_null($subheader)) :
        if ($subheader->content != '<br>') :
            echo "<div class='core'>{$subheader->content}</div>";
        endif;
    endif;

    if (!is_null($filter)) :
        echo "<div class='core'><h6>CATEGORY: {$filter->name}</h6></div>";
    endif;
    ?>

    <div class="core" id="recipes">
        <?php
        if ($recordset) :
            foreach ($recordset as $row) : ?>
            <div class="card">
                <a href="<?php echo base_url('recipes/' . $row->slug); ?>"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%"></a>
                <div>
                    <a href="<?php echo base_url('recipes/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                </div>
            </div>
            <?php endforeach;
        endif; ?>

        <div class="pagination-centered">
            <ul class="pagination">
                <?php echo $links; ?>
            </ul>
        </div>

        <?php if ($subfooter) :
            echo "{$subfooter->content}";
        endif; ?>
    </div>

</div>