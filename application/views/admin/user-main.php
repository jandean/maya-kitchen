<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3><?php echo $title; ?></h3>
		<!-- <a href="<?php echo base_url('auth/register'); ?>" class="button tiny radius">Register User</a> -->
		<hr>
		<table class="auto">
			<thead>
				<tr>
					<!-- <th width="30"><input type="checkbox"></input></th> -->
					<th width="50">ID</th>
					<th>User Name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Active</th>
					<th width="250">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($recordset as $row) : ?>
				<tr>
					<!-- <td><input type="checkbox"></input></td> -->
					<td class="cat-id"><?php echo $row->id; ?></td>
					<td class="cat-name"><?php echo $row->username; ?></td>
					<td class="cat-name"><?php echo $row->first_name; ?></td>
					<td class="cat-name"><?php echo $row->last_name; ?></td>
					<td class="cat-name"><?php echo $row->email; ?></td>
					<td class="cat-name"><?php echo $row->active == 1 ? 'Yes' : 'No'; ?></td>
					<td>
						<a href="<?php echo base_url('auth/edit_user/'.$row->id); ?>" class="button tiny radius">Edit</a>
						<?php if ($row->active == 1) : ?>
							<a href="<?php echo base_url('auth/deactivate/'.$row->id); ?>" class="button tiny radius warning" data-reveal-id="deactivate-prompt">Deactivate</a>
						<?php endif; ?>
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