<section class="main row">
    <?php echo $sidemenu; ?>
    <div class="core small-10 columns">
    <?php echo form_open('pages/' . $type); ?>
        <?php foreach ($result as $row) : ?>
            <?php
            switch ($row->type) {
                case 5:
                case 10:
                    $type = 'Class ';
                    break;
                case 6:
                case 11:
                    $type = 'Recipe ';
                    break;
                case 7:
                case 12:
                    $type = 'Article ';
                    break;
                case 8:
                case 13:
                    $type = 'Product ';
                    break;
                
                default:
                    $type = "Kid's Corner ";
                    break;
            } ?>
            <h3><?php echo $type . $title; ?></h3>
            <hr>
            <div><?php echo $message; ?></div>
            <input type="hidden" name="page_type_<?php echo $row->type; ?>" value="<?php echo set_value('page_type', $row->type); ?>" />
            <label>
                <textarea rows="12" name="content_<?php echo $row->type; ?>" id="nicEditArea"><?php echo set_value('content', $row->content); ?></textarea>
            </label>
            <br/>
        <?php endforeach; ?>
        <hr>
        <button type="submit" class="button tiny radius alert">PUBLISH</button>
        <a href="<?php echo base_url('pages/subheader'); ?>" class="button tiny radius secondary">CANCEL</a>
    <?php echo form_close(); ?>
    </div>
</section>