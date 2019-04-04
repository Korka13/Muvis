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
        <nav class="nav blog-nav">
        <?php
        wp_nav_menu
        ( array
                (
                'theme_location'  => 'my-custom-menu', // as defined by "register_nav_menu( 'Menu-Handle', 'Menu Label')", located in functions.php
                'menu'            => '',
                'container'       => 'nav', // "div" or "nav" (use "nav" for HTML5)
                'container_class' => 'nav blog-nav',
                'container_id'    => 'Menu',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'walker'          => ''
                )
        );
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