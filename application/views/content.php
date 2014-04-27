<div class="main" id="articles">
	<!-- <h1>CLASSES</h1> -->
    <nav class="breadcrumb">
        <a href="<?php echo base_url(); ?>">The Maya Kitchen</a>
        <span class="icon iconarrowright" aria-hidden="true"></span>
        <a href="<?php echo base_url(); ?>"> <?php echo ucwords($crumb); ?></a>
        <span class="icon iconarrowright" aria-hidden="true"></span>
        <a href="#" class="active" onclick="return false"> <?php echo $row->title; ?></a>
    </nav>
    
    <?php echo $side; ?>

    <div class="core" id="singleArticle">
        <h1><?php echo $row->title; ?></h1>
        <article>
            <img src="<?php echo base_url('images/uploads/' . $row->image); ?>">
            <p class="articleContent"><?php echo $row->content; ?></p>
        </article>
    </div>
</div>