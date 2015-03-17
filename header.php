<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="header section">
      <div class="container">
        <div class="header__branding">
          <?php if ( function_exists( 'the_site_logo' ) ) the_site_logo(); ?>

          <h1 class="header__title">
            <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'title' ); ?></a>
          </h1>
        </div>

        <div class="header__access">
          <span class="header__toggle-menu"><span>≡</span></span>

          <div class="header__menu">
            <?php

            wp_nav_menu( array(
              'theme_location' => 'main',
              'container'      => 'false',
              'depth'          => '2'
            ) );

            ?>
          </div>
        </div>
      </div>
    </header>
