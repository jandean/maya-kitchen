<div class="schedules">
    <?php if ($categories) : ?>
        <h6>Categories</h6>
        <div>
            <a href="<?php echo base_url('recipes'); ?>"><strong>ALL</strong></a>
        </div>
        <?php foreach ($categories->result() as $row) : ?>
            <div>
                <a href="<?php echo base_url('recipes/' . $row->id); ?>"><strong><?php echo $row->name; ?></strong></a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>