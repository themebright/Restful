<?php
/**
 * Admin
 */

/**
 * Display a notice with a list of recommended plugins.
 */
function restful_notice_recommended_plugins() {

  $plugins = array(
    'brightslider/brightslider.php' => array(
      'name' => 'BrightSlider',
      'slug' => 'brightslider'
    ),
    'church-theme-content/church-theme-content.php' => array(
      'name' => 'Church Theme Content',
      'slug' => 'church-theme-content'
    ),
    'post-type-archive-links/post-type-archive-links.php' => array(
      'name' => 'Post Type Archive Link',
      'slug' => 'post-type-archive-links'
    )
  );

  $inactive = array();

  foreach ( $plugins as $plugin => $data ) {
    if ( is_plugin_inactive( $plugin ) ) {
      $inactive[] = $data;
    }
  }

  if ( count( $inactive ) > 0 ) {

    wp_enqueue_script( 'plugin-install' );
    add_thickbox();

    $plugins_str = '';

    $i = 0;
    foreach ( $inactive as $plugin ) {
      if ( $i > 0 ) {
        $plugins_str .= ', ';
      }

      $install_url = esc_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin['slug'] . '&TB_iframe=true&width=772&height=644' ) );

      $plugins_str .= '<a href="' . $install_url . '" class="thickbox"><strong>' . $plugin['name'] . '</strong></a>';

      $i++;
    }

    ?>

    <div class="notice notice-warning is-dismissible">
      <p><?php _e( 'Restful recommends the following plugin(s):', 'restful' ); ?> <?php echo $plugins_str; ?></p>
    </div>

    <?php

  }

}
add_action( 'admin_notices', 'restful_notice_recommended_plugins' );

/**
 * Modify slider fields.
 */
function restful_filter_slider_fields( $args ) {

  if ( defined( 'BRIGHTSLIDER_VERSION' ) && version_compare( BRIGHTSLIDER_VERSION, '1.1.0', '>=' ) ) {
    $args['fields']['_restful_bs_show_title'] = array(
      'name'           => __( 'Show title?', 'restful' ),
      'type'           => 'checkbox',
      'checkbox_label' => __( 'Display the title above the slide text.', 'restful' ),
      'default'        => true
    );
  }

  return $args;

}
add_filter( 'brightslider_add_meta_box_slide_settings', 'restful_filter_slider_fields' );
