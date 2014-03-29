<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3>RECIPE CATEGORY MANAGEMENT</h3>
		<a href="" class="button tiny radius add-cat" data-reveal-id="category-form">Add Category</a>
		<hr>
		<table class="auto">
			<thead>
				<tr>
					<th width="30"><input type="checkbox"></input></th>
					<th width="50">ID</th>
					<th>Category Name</th>
					<th width="250">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($recordset as $row) : ?>
				<tr>
					<td><input type="checkbox"></input></td>
					<td class="cat-id"><?php echo $row->id; ?></td>
					<td class="cat-name"><?php echo $row->name; ?></td>
					<td>
						<a href="" class="button tiny radius edit-cat" data-reveal-id="category-form">Edit</a>
						<a href="" class="button tiny radius warning delete-cat" data-reveal-id="delete-prompt">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination-centered">
			<ul class="pagination">
				<?php echo $links; ?>
			</ul>
		</div>
	</div>

</section>

<?php echo $category_form; ?>

<div id="delete-prompt" class="reveal-modal text-center small" data-reveal>
  <h3>Are you sure you want to delete this?</h2>
  <hr>

  <div id="infoMessageDelete"></div>
  <input type="hidden" id="hid_catid" />
  <button class="tiny radius" onclick="delete_category()">Delete</button>
  <button class="tiny radius secondary cancel">Cancel</button>
  <a class="close-reveal-modal">&#215;</a>
</div>

<script src="<?php echo base_url('javascripts/app/recipe-category.js'); ?>"></script>