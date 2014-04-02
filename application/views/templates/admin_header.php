<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="" />
    <!-- Load Stylesheet -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/admin/style.css'); ?>">
    <script src="<?php echo base_url('javascripts/jquery.min.js'); ?>"></script>
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
                <h1><a href="<?php echo base_url('index.php/admin'); ?>"><img src="<?php echo base_url(); ?>/images/logo.png"></a></h1>
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
                        <li><a href="<?php echo base_url('index.php/auth/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Left Nav Section -->
            <ul class="left">
            <li class="has-dropdown">
                <a href="#">Users</a>
                <ul class="dropdown">
                    <li><a href="">Add User</a></li>
                    <li><a href="<?php echo base_url('index.php/users'); ?>">Manage Users</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Classes</a>
                <ul class="dropdown">
                    <li><a href="">Add Class</a></li>
                    <li><a href="">Manage Classes</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Recipes</a>
                <ul class="dropdown">
                    <li><a href="<?php echo base_url('index.php/recipe/add'); ?>">Add Recipe</a></li>
                    <li><a href="<?php echo base_url('index.php/recipe'); ?>">Manage Recipes</a></li>
                </ul>
            </li><li class="has-dropdown">
                <a href="#">Articles</a>
                <ul class="dropdown">
                    <li><a href="">Add Article</a></li>
                    <li><a href="<?php echo base_url('index.php/article'); ?>">Manage Articles</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Products</a>
                <ul class="dropdown">
                    <li><a href="">Add Product</a></li>
                    <li><a href="">Manage Products</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Features</a>
                <ul class="dropdown">
                    <li><a href="">Homepage Banner</a></li>
                    <li><a href="">Sidebar Items</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="">Contact Us</a></li>
                </ul>
            </li>
            </ul>
        </section>
        <?php endif; ?>
    </nav>

    <p></p>

    <!-- container -->
    <div class="container">