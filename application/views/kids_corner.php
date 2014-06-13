<div class="main" id="articles">
    <h1>KIDS' CORNER</h1>
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Kids' Corner</a>
    </nav>

    <?php echo $side; ?>

    <?php if ($subheader) :
        echo "<div>{$subheader->content}</div>";
    endif; ?>
    
    <div class="core" id="kids">
        <?php if ($class_set) : 
            $atype = '';
            foreach ($class_set as $row) :
                if ($atype != $row->type) {
                    echo '<h6>';
                    switch ($row->type) {
                        case 1:
                            echo CONTENT_CLASS_STRS;
                            break;

                        case 2:
                            echo CONTENT_ARTICLE_STRS;
                            break;
                        
                        default:
                            echo CONTENT_PRODUCT_STRS;
                            break;
                    }
                    echo ' for Kids</h6>';
                }

                $atype = $row->type;
                ?>
                <div class="card">
                    <a href="<?php echo base_url('classes/' . $row->slug); ?>"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%"></a>
                    <div>
                        <a href="<?php echo base_url('classes/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                    </div>
                </div>
            <?php 
            endforeach;
        endif; ?>

    </div>
    <div class="core" id="kids">

        <?php if ($recipe_set) : ?>
            <h6>Recipes for Kids</h6>
            <?php foreach ($recipe_set as $row) : ?>
                <div class="card">
                    <a href="<?php echo base_url('recipes/' . $row->slug); ?>"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="100%"></a>
                    <div>
                        <a href="<?php echo base_url('recipes/' . $row->slug); ?>"><h4><?php echo $row->title; ?></h4></a>
                        [<a href="<?php echo base_url('recipes/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php
            endforeach;
        endif; ?>

        <div class="pagination-centered">
            <ul class="pagination">
                <?php echo $links; ?>
            </ul>
        </div>

        <p>
            <?php if ($subfooter) :
                echo "{$subfooter->content}";
            endif; ?>
        </p>
    </div>

</div>