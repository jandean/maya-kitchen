<div class="main" id="home">
    <div class="topTier">
    	<h1 align="center">Welcome to the Maya Kitchen</h1>
    	<h5 align="center">Take a look at the classes we offer, try out our recipes, or catch up with our latest news!</h5>
        <?php if (count($carousel) > 1) : ?>
        <div class="carousel">
            <?php 
            $ctr = 0;
            foreach ($carousel as $banner) :
                ++$ctr; ?>
    			<div <?php echo $ctr == count($carousel) ? ' class="last"' : ''; ?>>
    				<a href="<?php echo $banner->url; ?>"><img src="<?php echo base_url('images/uploads/' . $banner->img); ?>"></a>
    			</div>
            <?php endforeach; ?>
		</div>
        <?php else : ?>
            <a href="<?php echo $carousel[0]->url; ?>"><img src="<?php echo base_url('images/uploads/' . $carousel[0]->img); ?>" style="width:1110px; padding: 10px; margin-bottom: 30px;"></a>
        <?php endif; ?>
        <br>
        <div>
            <a href="<?php echo base_url('classes'); ?>"><img src="<?php echo base_url('images/essential/classes.jpg'); ?>"></a>
            <a href="<?php echo base_url('classes'); ?>">CLASSES</a>
        </div>
        <div>
            <a href="<?php echo base_url('recipes'); ?>"><img src="<?php echo base_url('images/essential/recipes.jpg'); ?>"></a>
            <a href="<?php echo base_url('recipes'); ?>">RECIPES</a>
        </div>
        <div>
            <a href="<?php echo base_url('articles'); ?>"><img src="<?php echo base_url('images/essential/articles.jpg'); ?>"></a>
            <a href="<?php echo base_url('articles'); ?>">ARTICLES</a>
        </div>
    </div>

    <?php echo $side; ?>

    <div class="core">
        <?php if ($recordset) : ?>
            <h6>Recent Articles</h6>
            <?php foreach ($recordset as $row) : ?>
                <div class="articleSummary">
                    <a href="<?php echo base_url('articles/' . $row->slug); ?>"><img src="<?php echo base_url($this->config->item('image_upload_path') . $row->image); ?>" width="225"></a>
                    <div>
                        <a href="<?php echo base_url('articles/' . $row->slug); ?>"><h4><?php echo html_entity_decode($row->title); ?></h4></a>
                        <?php echo substr(strip_tags($row->content), 0, 220); ?>... [<a href="<?php echo base_url('articles/' . $row->slug); ?>">Read More</a>]
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".carousel span:first").fadeIn();

        jQuery.fn.timer = function() {
            if(!$('.carousel').children("div:last-child").is(":visible")){
                $('.carousel').children("div:visible")
                    .fadeOut()
                    .next("div").fadeIn();
            }
            else{
                $('.carousel').children("div:visible")
                    .fadeOut()
                .end().children("div:first")   
                    .fadeIn;
                $(".carousel div:first").fadeIn();
            }
        } // timer function end
        
        window.setInterval(function() {
            $('.carousel').timer();
        }, 3000);

    });
</script>