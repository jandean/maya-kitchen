<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
	<link rel="shortcut icon" href="<?php echo base_url('images/icons/favicon.ico'); ?>" />
	<!-- Load Stylesheet -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('stylesheets/style.css'); ?>">

	<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>

	<title>The Maya Kitchen Site Admin</title>
</head>

<body>
    <header class="siteHead">
        <div id="brand">
            <div>
                <a href="<?php echo base_url('main'); ?>"><img class="logo" src="<?php echo base_url('images/logo.png'); ?>"></a>
                <!-- <div class="social">
                    <a href="http://facebook.com/80kph" rel="nofollow"><span class="icon iconfacebook" aria-hidden="true"></span></a>
                    <a href="http://twitter.com/upsigmadeltaphi" rel="nofollow"><span class="icon icontwitter" aria-hidden="true"></span></a>
                    <a href=""><span class="icon iconpinterest" aria-hidden="true"></span></a>
                </div> -->
                <nav>
                    <a href="<?php echo base_url('home'); ?>" <?php if ($page=="home") echo " class=\"active\""; ?>>Home</a>
                    <a href="<?php echo base_url('classes'); ?>" <?php if ($page=="classes" || @$crumb=="classes") echo " class=\"active\""; ?>>Classes</a>
                    <a href="<?php echo base_url('recipes'); ?>" <?php if ($page=="recipes" || @$crumb=="recipes") echo " class=\"active\""; ?>>Recipes</a>
                    <a href="<?php echo base_url('articles'); ?>" <?php if ($page=="articles" || @$crumb=="articles") echo " class=\"active\""; ?>>Articles</a>
                    <a href="<?php echo base_url('kids'); ?>" <?php if ($page=="kids_corner") echo " class=\"active\""; ?>>Kids' Corner</a>
                    <a href="<?php echo base_url('products'); ?>" <?php if ($page=="products" || @$crumb=="products") echo " class=\"active\""; ?>>Products</a>
                    <a href="<?php echo base_url('contact-us'); ?>" <?php if ($page=="contact") echo " class=\"active\""; ?>>Contact</a>
                </nav>  
            </div>
        </div>
    </header>
	
	<!-- container -->
	<div class="container">