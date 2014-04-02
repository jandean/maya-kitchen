<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3><?php echo $title; ?></h3>
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
					<td class="delete-id"><?php echo $row->id; ?></td>
					<td class="cat-name"><?php echo $row->name; ?></td>
					<td>
						<a href="" class="button tiny radius edit-cat" data-reveal-id="category-form">Edit</a>
						<a href="" class="button tiny radius warning delete" data-reveal-id="delete-prompt">Delete</a>
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

<?php $data = array('controller' => 'recipe', 'function' => 'delete_category', 'goto' => 'recipe/category'); $this->load->view('admin/modal-delete', $data); ?>

<script src="<?php echo base_url('javascripts/app/recipe-category.js'); ?>"></script>