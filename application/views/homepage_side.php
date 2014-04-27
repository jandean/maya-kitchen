<div>
    <h6>Social Media</h6>
    <div class="social">
        <a href="https://www.facebook.com/Mayakitchen" target="_blank"><span class="icon iconfacebook" aria-hidden="true"></span></a>
        <a href="https://twitter.com/mayakitchen" target="_blank"><span class="icon icontwitter" aria-hidden="true"></span></a>
        <a href="http://instagram.com/themayakitchen" target="_blank"><span class="icon iconinstagram" aria-hidden="true"></span></a>
    </div>
</div>
<div class="schedules">
    <?php if ($classes) : ?>
        <h6>Class Schedules</h6>
        <?php foreach ($classes as $row) : ?>
            <div>
                <a href="<?php echo base_url('index.php/content/' . $row->slug); ?>"><strong><?php echo $row->title; ?></strong></a>
                <?php echo $row->content; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>