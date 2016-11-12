<?php
/**
 * Upgrade
 */

/**
 * Return permissiblity of upgrading framework namespace.
 */
function restful_can_upgrade_framework_namespace() {

  return ! get_option( 'restful_updated_framework_namespace' ) && current_user_can( 'install_themes' );

}

/**
 * Display upgrade framework namespace admin notices.
 */
function restful_notice_upgrade_framework_namespace() {

  if ( ! restful_can_upgrade_framework_namespace() ) {
    return;
  }

  if ( isset( $_GET['restful-upgrade-framework-namespace'] ) ) {

    restful_upgrade_framework_namespace();

    ?>

    <div class="notice notice-warning is-dismissible">
      <h4 style="padding: 2px; margin: .5em 0 0;"><?php _e( 'Restful Database Successful' ); ?></h4>
      <p><?php _e( "The database has been updated.", 'restful' ); ?></p>
    </div>

    <?php

  } else {

    ?>

    <div class="notice notice-warning is-dismissible">
      <h4 style="padding: 2px; margin: .5em 0 0;"><?php _e( 'Restful Database Upgrade Required' ); ?></h4>
      <p><?php _e( "Thanks for updating to the latest version of Restful! We've re-worked somethings under the hood, so you'll need to upgrade your database for Restful's custom widgets to continue to work. You may want to backup your database before proceeding.", 'restful' ); ?></p>
      <p><a href="?restful-upgrade-framework-namespace" class="button"><?php _e( 'Upgrade Now', 'restful' ); ?></a></p>
    </div>

    <?php

  }

}
add_action( 'admin_notices', 'restful_notice_upgrade_framework_namespace' );

/**
 * Upgrade framework namespace.
 */
function restful_upgrade_framework_namespace() {

  if ( ! restful_can_upgrade_framework_namespace() ) {
    return;
  }

  $widgets = array(
    'widget_tbf-events',
    'widget_tbf-locations',
    'widget_tbf-people',
    'widget_tbf-sermons'
  );

  foreach ( $widgets as $widget ) {
    $widget_options = get_option( $widget );
    update_option( str_replace( 'tbf', 'tbcf', $widget ), $widget_options );
    delete_option( $widget );
  }

  $sidebars = get_option( 'sidebars_widgets' );

  foreach ( $sidebars as $sidebar => $widgets ) {
    if ( is_array( $widgets ) ) {
      $i = 0; foreach ( $widgets as $widget ) {
        $sidebars[ $sidebar ][ $i ] = str_replace( 'tbf-', 'tbcf-', $widget );
        $i++;
      }
    }
  }

  update_option( 'sidebars_widgets', $sidebars );

  add_option( 'restful_updated_framework_namespace', 1 );

}
