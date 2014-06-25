<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="" />
    <!-- Load Stylesheet -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/froala/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/froala/froala_editor.min.css'); ?>">
    <script src="<?php echo base_url('javascripts/jquery-1.11.0.min.js'); ?>"></script>
    <script type="text/javascript">
        var config = {
             base: "<?php echo base_url(); ?>",
             someOtherPref: 4
         };

        // var csrf_token_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
        // var csrf_token_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
    </script>
    <script src="<?php echo base_url('javascripts/app/common.js'); ?>"></script>
    <title>The Maya Kitchen Site Admin</title>
</head>

<body>
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="<?php echo base_url('admin'); ?>"><img src="<?php echo base_url(); ?>/images/logo.png"></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>

        <?php if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()): ?>
        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                <!-- <li class="active"><a href="#">Right Button Active</a></li> -->
                <li class="has-dropdown active">
                    <a href="#">Logged in as <strong><?php echo $this->session->userdata('identity'); ?></strong></a>
                    <ul class="dropdown">
                        <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Left Nav Section -->
            <ul class="left">
            <li class="has-dropdown">
                <a href="#">Users</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('auth/register'); ?>">Add User</a></li>
                    <li><a href="<?php echo base_url('users'); ?>">Manage Users</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Classes</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('admin/form/' . CONTENT_CLASS_STR); ?>">Add Class</a></li>
                    <li><a href="<?php echo base_url('admin/main/' . CONTENT_CLASS_STR); ?>">Manage Classes</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Recipes</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('recipe/form'); ?>">Add Recipe</a></li>
                    <li><a href="<?php echo base_url('recipe'); ?>">Manage Recipes</a></li>
                </ul>
            </li><li class="has-dropdown">
                <a href="#">Articles</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('admin/form/' . CONTENT_ARTICLE_STR); ?>">Add Article</a></li>
                    <li><a href="<?php echo base_url('admin/main/' . CONTENT_ARTICLE_STR); ?>">Manage Articles</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Products</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('admin/form/' . CONTENT_PRODUCT_STR); ?>">Add Product</a></li>
                    <li><a href="<?php echo base_url('admin/main/' . CONTENT_PRODUCT_STR); ?>">Manage Products</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Features</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('pages/banner'); ?>">Homepage Banner</a></li>
                    <!-- <li><a href="">Sidebar Items</a></li> -->
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('pages/contact'); ?>">Contact</a></li>
                    <li><a href="<?php echo base_url('pages/terms'); ?>">Terms of Use</a></li>
                    <li><a href="<?php echo base_url('pages/policy'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo base_url('pages/subheader'); ?>">Default Page View</a></li>
                </ul>
            </li>
            </ul>
        </section>
        <?php endif; ?>
    </nav>

    <p></p>

    <!-- container -->
    <div class="container">