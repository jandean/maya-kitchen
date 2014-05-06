<div class="schedules">
    <?php if ($categories) : ?>
        <h6>Categories</h6>
        <?php foreach ($categories->result() as $row) : ?>
            <div>
                <a href="<?php echo base_url('recipes/' . $row->id); ?>"><strong><?php echo $row->name; ?></strong></a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>