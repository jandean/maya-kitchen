<div class="main" id="articles">
    <?php echo $side; ?>

    <div class="core" id="singleArticle">
        <h1><?php echo $row->title; ?></h1>
        <article>
            <img src="<?php echo base_url('images/uploads/' . $row->image); ?>">
            <p class="articleContent"><?php echo $row->content; ?>
        </article>
    </div>
</div>