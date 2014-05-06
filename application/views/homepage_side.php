<div>
    <h6>Social Media</h6>
    <div class="social">
        <a href="https://www.facebook.com/Mayakitchen" target="_blank"><span class="icon iconfacebook" aria-hidden="true"></span></a>
        <a href="https://twitter.com/themayakitchen1" target="_blank"><span class="icon icontwitter" aria-hidden="true"></span></a>
        <a href="http://instagram.com/themayakitchen1" target="_blank"><span class="icon iconinstagram" aria-hidden="true"></span></a>
    </div>
</div>
<div class="schedules">
    <?php if ($classes) : ?>
        <h6>Class Schedules</h6>
        <?php foreach ($classes as $row) : ?>
            <div>
                <a href="<?php echo base_url('classes/' . $row->slug); ?>"><strong><?php echo $row->title; ?></strong></a>
                <?php
                echo date('F d', strtotime($row->start_date));
                if (!is_null($row->end_date))
                    echo ' to ' . date('F d', strtotime($row->end_date));
                ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>