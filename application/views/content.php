<div class="main" id="articles">
	<!-- <h1>CLASSES</h1> -->
    <nav class="breadcrumb">
        <a href="index.php">The Maya Kitchen</a>
        <!-- <span class="icon iconarrowright" aria-hidden="true"></span><a href="#" class="active" onclick="return false"> Classes</a> -->
    </nav>
    
    <?php echo $side; ?>

    <div class="core" id="singleArticle">
        <h1><?php echo $row->title; ?></h1>
        <article>
            <img src="<?php echo base_url('images/uploads/' . $row->image); ?>">
            <p class="articleContent"><?php echo $row->content; ?>
        </article>
    </div>
</div>