<?php
switch ($page) {
	case 'class':
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>CLASS</strong></li>
					<li <?php echo $active == 'add' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/form/' . CONTENT_CLASS_STR); ?>">+ Add Class</a></li>
					<li <?php echo $active == 'main' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/main/' . CONTENT_CLASS_STR); ?>">All Classes</a></li>
					<li <?php echo $active == 'category' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/category/index/' . CATEGORY_CLASS_STR); ?>">All Class Categories</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;

	case 'recipe':
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>RECIPE</strong></li>
					<li <?php echo $active == 'add' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/recipe/form'); ?>">+ Add Recipe</a></li>
					<li <?php echo $active == 'main' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/recipe'); ?>">All Recipes</a></li>
					<li <?php echo $active == 'category' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/category/index/' . CATEGORY_RECIPE_STR); ?>">All Recipe Categories</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;

	case 'article':
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>ARTICLE</strong></li>
					<li <?php echo $active == 'add' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/form/' . CONTENT_ARTICLE_STR); ?>">+ Add Article</a></li>
					<li <?php echo $active == 'main' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/main/' . CONTENT_ARTICLE_STR); ?>">All Articles</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;

	case 'product':
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>PRODUCT</strong></li>
					<li <?php echo $active == 'add' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/form/' . CONTENT_PRODUCT_STR); ?>">+ Add Product</a></li>
					<li <?php echo $active == 'main' ? 'class="active"' : ''; ?>><a href="<?php echo base_url('index.php/admin/main/' . CONTENT_PRODUCT_STR); ?>">All Products</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;
	
	default:
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>USER</strong></li>
					<li <?php echo $active == 'add' ? 'class="active"' : ''; ?>><a href="">+ Add User</a></li>
					<li <?php echo $active == 'main' ? 'class="active"' : ''; ?>><a href="">All Users</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;
}