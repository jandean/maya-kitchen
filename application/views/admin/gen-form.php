<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3><?php echo $title; ?></h3>
		<hr>
		<div><?php echo $message; ?></div>
		<?php echo form_open_multipart('admin/form/' . $content_type . '/' . @$result->id); ?>
			<input type="hidden" name="article_id" value="<?php echo set_value('article_id', @$result->id); ?>" />
			<input type="hidden" id="content_type" value="<?php echo $content_type; ?>" />
			<label>Title
				<input type="text" placeholder="Title" name="title" id="title" value="<?php echo set_value('title', @$result->title); ?>" />
			</label>
			<label>Slug
				<input type="text" placeholder="Title-Slug" name="slug" id="slug" value="<?php echo set_value('slug', @$result->slug); ?>" readonly />
			</label>
			<label>Content
				<textarea rows="10" placeholder="Article Content" name="content" id="nicEditArea"><?php echo set_value('content', @$result->content); ?></textarea>
			</label>
			<?php if ($content_type == 'class'):
				$start_date = isset($result->start_date) ? $result->start_date : date('m/d/Y'); ?>
				<label>
					Start Date
					<input type="text" placeholder="Start Date" name="start_date" id="start_date" value="<?php echo set_value('start_date', date('m/d/Y', strtotime($start_date))); ?>" readonly />
				</label>
	            <label>End Date
					<input type="text" placeholder="End Date" name="end_date" id="end_date" value="<?php echo set_value('end_date'); ?>" readonly />
				</label>
	            <label>Category
	                <?php foreach ($categories as $category) : ?>
	                <label>
	                    <input type="radio" name="class_category_id" value="<?php echo $category->id; ?>" <?php echo set_value('class_category_id', @$result->class_category_id) == $category->id ? "checked" : ""; ?> /> <?php echo $category->name; ?>
	                </label>
	                <?php endforeach; ?>
	            </label>
	        <?php endif; ?>
			<label>Cover Image
				<input type="file" name="image" />
			</label>
			<label>
				<input type="checkbox" name="is_url" id="is_url" value="1" <?php echo set_value('is_url', @$result->is_url) == 1 ? "checked" : ""; ?> /> Show this as link?
			</label>
			<label>
				<div id="div_url" <?php if (@$result->is_url != 1) echo 'style="display:none;"'; ?>><input type="text" placeholder="URL" name="url" id="url" value="<?php echo set_value('url', @$result->url); ?>" /></div>
			</label>
			<label>
				<input type="checkbox" name="for_kids" value="1" <?php echo set_value('for_kids', @$result->for_kids) == 1 ? "checked" : ""; ?> /> Is this for Kids?
			</label>
			<label>
				<input type="checkbox" name="is_active" value="1" <?php echo set_value('is_active', @$result->is_active) == 1 ? "checked" : ""; ?> /> Active
			</label>
			<label>
				<input type="checkbox" name="is_featured" value="1" <?php echo set_value('is_featured', @$result->is_featured) == 1 ? "checked" : ""; ?> /> Featured
			</label>
			<hr>
			<button type="submit" class="button tiny radius alert">PUBLISH</button>
			<a href="<?php echo base_url('admin/main/' . $content_type); ?>" class="button tiny radius secondary">CANCEL</a>
		<?php echo form_close(); ?>
	</div>

</section>