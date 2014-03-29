<section class="main row">
	<?php echo $sidemenu; ?>
	<div class="core small-10 columns">
		<h3>ADD RECIPE</h3>
		<hr>
		<form>
			<label>Title
				<input type="text" placeholder="Title" />
			</label>
			<label>Ingredients
				<textarea rows="10" placeholder="Type ingredients, one line per item"></textarea>
			</label>
			<label>Ingredients
				<textarea rows="10" placeholder="Type ingredients, one line per item"></textarea>
			</label>
			<label>Procedure
				<textarea rows="10" placeholder="Type procedure"></textarea>
			</label>
			<label>Yield
				<input type="text" placeholder="Type yield" />
			</label>
			<label>Notes
				<textarea rows="10" placeholder="Type notes, if any"></textarea>
			</label>
			<label>Category
				<ul class="checkbox-list">
					<li><input type="checkbox"> Kid's Corner</input></li>
					<li><input type="checkbox"> Spanish</input></li>
					<li><input type="checkbox"> Italian</input></li>
				</ul>
			</label>
			<label>Cover Image
				<input type="file" />
			</label>
			<label>
				<input type="checkbox" /> Recipe of the Month
			</label>
			<hr>
			<button type="submit" class="button tiny radius alert">PUBLISH</button>
			<button type="submit" class="button tiny radius secondary">CANCEL</button>
		</form>
	</div>

</section>