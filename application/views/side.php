<aside>

    <?php echo @$home_side; ?>

    <?php if ($feat_recipe): ?>
    <div class="rotm">
        <h6>Recipe of the Month</h6>
        <a href="<?php echo base_url('index.php/main/recipe/' . $feat_recipe->slug); ?>"><strong><?php echo $feat_recipe->title; ?></strong></a>
        <img src="<?php echo base_url($this->config->item('image_upload_path') . $feat_recipe->image); ?>" width="250">
    </div>
    <?php endif; ?>
    
    <div class="newgen">
        <h6>New Gen Baker</h6>
        Your trusty baking resource!<br>
        <a href="http://www.newgenbaker.com" target="_blank"><img src="<?php echo base_url('images/newgenLogo.png'); ?>"></a>
    </div>

    <div class="newsLetter">
        <h6>Sign Up For Our Newsletter</h6>
        <div id="mc_embed_signup">
        <form action="http://themayakitchen.us3.list-manage.com/subscribe/post?u=093befd519c5e89568e2f86e9&amp;id=cdf613aa70" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div class="mc-field-group">
            <label for="mce-EMAIL">Email Address</label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
        <div class="mc-field-group">
            <label for="mce-FNAME">First Name </label>
            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
        </div>
        <div class="mc-field-group">
            <label for="mce-LNAME">Last Name </label>
            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
        </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>  <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button orange"></div>
        </form>
        </div>
    </div>
</aside>