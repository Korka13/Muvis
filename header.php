<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo("description"); ?>">

    <title><?php is_front_page() ? bloginfo("name") : wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/bootstrap.css">
    <link href="<?php bloginfo("stylesheet_url"); ?>" rel="stylesheet">
    <?php wp_head(); ?>
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
      <nav class="navbar navbar-expand-md blog-nav" role="navigation">
        <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
          'container'       => 'div',
          'container_class' => '',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'navbar-nav mr-auto',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
?>
</nav>
        </div>
        
        
      
    </div>
    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title"><?php bloginfo("name"); ?></h1>
        <p class="lead blog-description"><?php bloginfo("description"); ?></p>
      </div>
    </div>