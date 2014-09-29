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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="">

            <?php /*

            <h1 class="site-title">
              <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'title' ); ?></a>
            </h1>

            <h6 class="site-description"><?php bloginfo( 'description' ); ?></h6>

            */ ?>
          </div>

          <div class="access col col-xs-12 col-md-8">
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