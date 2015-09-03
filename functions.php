<?php
/**
 * Functions
 */

/**
 * Include ThemeBright framework.
 */
require_once( get_template_directory() . '/framework/framework.php' );

/**
 * Include Customizer Library.
 */
require_once( get_template_directory() . '/customizer-library/customizer-library.php' );

/**
 * Include TGM Plugin Activation.
 */
if ( is_admin() ) {
  require_once( get_template_directory() . '/tgm-plugin-activation/class-tgm-plugin-activation.php' );
  require_once( get_template_directory() . '/includes/required-plugins.php' );
}

/**
 * Include theme functions.
 */
require_once( get_template_directory() . '/includes/assets.php' );
require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/filters.php' );
require_once( get_template_directory() . '/includes/localization.php' );
require_once( get_template_directory() . '/includes/menus.php' );
require_once( get_template_directory() . '/includes/sidebars.php' );
require_once( get_template_directory() . '/includes/template-tags.php' );
require_once( get_template_directory() . '/includes/theme-support.php' );
