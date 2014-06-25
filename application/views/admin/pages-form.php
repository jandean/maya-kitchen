<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3><?php echo $title; ?></h3>
		<hr>
		<div><?php echo $message; ?></div>
		<?php echo form_open('pages/' . $type); ?>
			<input type="hidden" name="page_type" value="<?php echo set_value('page_type', @$result->type); ?>" />
			<textarea rows="30" name="content"><?php echo set_value('content', @$result->content); ?></textarea>
			<hr>
			<button type="submit" class="button tiny radius alert">PUBLISH</button>
			<a href="<?php echo base_url('pages/contact'); ?>" class="button tiny radius secondary">CANCEL</a>
		<?php echo form_close(); ?>
	</div>

</section>