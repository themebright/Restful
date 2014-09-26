<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="section section-header">
      <div class="container">
        <div class="row">
          <div class="branding col col-xs-12 col-md-4">
            <h1 class="site-title">
              <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'title' ); ?></a>
            </h1>

            <h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
          </div>

          <div class="access col col-xs-12 col-md-8">
            <input type="checkbox" id="toggle-primary-menu" class="toggle-menu">
            <label for="toggle-primary-menu" class="toggle-menu">&#9776; <span>Menu</span></label>

            <?php

            wp_nav_menu( array(
              'theme_location'  => 'primary',
              'container_class' => 'menu',
              'menu_class'      => 'primary-menu',
              'menu_id'         => 'primary-menu',
              'fallback_cb'     => restful_page_menu(),
              'depth'           => '2'
            ) );

            ?>
          </div>
        </div>
      </div>
    </header>