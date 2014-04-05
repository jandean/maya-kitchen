<?php
switch ($page) {
	case 'class':
		?>
		<aside class="small-2 columns">
			<div class="sidebar">
				<ul class="side-nav">
					<li class="heading"><strong>CLASS</strong></li>
					<li class="active"><a href="">+ Add Class</a></li>
					<li><a href="">All Classes</a></li>
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
					<li class="active"><a href="">+ Add Article</a></li>
					<li><a href="">All Articles</a></li>
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
					<li class="active"><a href="">+ Add Product</a></li>
					<li><a href="">All Products</a></li>
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
					<li class="active"><a href="">+ Add User</a></li>
					<li><a href="">All Users</a></li>
				</ul>
			</div>
		</aside>
		<?php
		break;
}