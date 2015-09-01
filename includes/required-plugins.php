<?php
/**
 * Required Plugins
 */

/**
 * Registers a number of recommended plugins.
 */
function restful_register_required_plugins() {

  $plugins = array(
    array(
      'name'     => 'BrightSlider',
      'slug'     => 'brightslider',
      'required' => false
    ),
    array(
      'name'     => 'Church Theme Content',
      'slug'     => 'church-theme-content',
      'required' => true
    ),
    array(
      'name'     => 'Post Type Archive Link',
      'slug'     => 'post-type-archive-links',
      'required' => false
    )
  );

  tgmpa( $plugins );

}
add_action( 'tgmpa_register', 'restful_register_required_plugins' );
