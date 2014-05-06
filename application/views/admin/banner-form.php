<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3><?php echo $title; ?></h3>
		<hr>
		<div><?php echo $message; ?></div>
		<?php echo form_open_multipart('pages/banner_form/' . @$result->id); ?>
			<input type="hidden" name="id" value="<?php echo set_value('id', @$result->id); ?>" />
			<label>Image Banner
				<input type="file" name="image" />
			</label>
			<label>Link
				<input type="text" placeholder="URL" name="url" id="url" value="<?php echo set_value('url', @$result->url); ?>" />
			</label>
			<hr>
			<button type="submit" class="button tiny radius alert">PUBLISH</button>
			<a href="<?php echo base_url('pages/banner'); ?>" class="button tiny radius secondary">CANCEL</a>
		<?php echo form_close(); ?>
	</div>

</section>