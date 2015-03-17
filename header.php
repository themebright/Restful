<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="section section-header">
      <div class="container">
        <div class="row">
          <div class="branding col col-xs-12 col-md-3">
            <?php if ( function_exists( 'the_site_logo' ) ) the_site_logo(); ?>

            <h1 class="site-title">
              <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'title' ); ?></a>
            </h1>
          </div>

          <div class="access col col-xs-12 col-md-9">
            <input type="checkbox" id="toggle-primary-menu" class="toggle-menu">
            <label for="toggle-primary-menu" class="toggle-menu"><span>Menu</span></label>

            <div class="menu">
              <?php

              wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => 'false',
                'menu_class'     => 'primary-menu',
                'menu_id'        => 'primary-menu',
                'depth'          => '2'
              ) );

              ?>
            </div>
          </div>
        </div>
      </div>
    </header>
