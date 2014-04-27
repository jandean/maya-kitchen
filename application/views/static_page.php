<div class="main" id="basic">
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span><a href="" class="active" onclick="return false"> <?php echo $title; ?></a>
    </nav>

    <?php echo $side; ?>

    <div class="core" id="contact">
        <h1><?php echo $title; ?></h1>
        <article>
            <div class="details">
                <?php echo $result->content; ?>
            </div>
        </article>
    </div>

</div>