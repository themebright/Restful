<?php
/**
 * EDD Software Licensing integration.
 */

/**
 * Define our constants.
 */
define( 'RESTFUL_STORE_URL',    'http://themebright.co' );
define( 'RESTFUL_PRODUCT_NAME', 'restful' );

/**
 * Load the custom theme updater if the EDD_SL_Theme_Updater class isn't already defined.
 */
if ( ! class_exists( 'EDD_SL_Theme_Updater' ) ) {

  require_once get_template_directory() . '/includes/classes/EDD_SL_Theme_Updater.php';

}

/**
 * Init the theme updater.
 */
function restful_updater() {

  $test_license = trim( get_option( 'restful_license_key' ) );

  $edd_updater = new EDD_SL_Theme_Updater( array(
      'remote_api_url' => RESTFUL_STORE_URL,
      'version'        => TBF_THEME_VERSION,
      'license'        => $test_license,
      'item_name'      => RESTFUL_PRODUCT_NAME,
      'author'         => 'ThemeeBright',
      'url'            => home_url()
    )
  );

}
add_action( 'admin_init', 'restful_updater' );

/**
 * Licence settings page menu item.
 */
function restful_license_menu() {

  add_theme_page( __( 'Restful License', 'restful' ), __( 'Restful License', 'restful' ), 'manage_options', 'restful-license', 'restful_license_page' );

}
add_action( 'admin_menu', 'restful_license_menu' );

/**
 * Licence settings page.
 */
function restful_license_page() {

  $license = get_option( 'restful_license_key' );
  $status  = get_option( 'restful_license_key_status' );

  ?>

  <div class="wrap">
    <h2><?php _e( 'Restful License', 'restful' ); ?></h2>

    <form method="post" action="options.php">
      <?php settings_fields('restful_license'); ?>

      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row">
              <label for="restful_license_key">Licence Key</label>
            </th>

            <td>
              <input type="text" id="restful_license_key" class="regular-text" name="restful_license_key" value="<?php echo esc_attr( $license ); ?>">

              <?php if ( $status !== false && $status == 'valid' ) : ?>
                <span style="display: inline-block; line-height: 27px; color: green;">
                  <span class="dashicons dashicons-yes" style="position: relative; top: 4px;"></span>
                  <?php _e( 'Active', 'restful' ); ?>
                </span>
              <?php else : ?>
                <span style="display: inline-block; line-height: 27px; color: red;">
                  <span class="dashicons dashicons-no-alt" style="position: relative; top: 4px;"></span>
                  <?php _e( 'Inactive', 'restful' ); ?>
                </span>
              <?php endif; ?>

              <p class="description"><?php _e( 'Enter your license key.', 'restful' ); ?></p>
            </td>
          </tr>

          <?php if ( $license !== false ) : ?>
            <tr>
              <th scope="row">
                <?php _e( 'Active License' ); ?>
              </th>

              <td>
                <?php if ( $status !== false && $status == 'valid' ) : ?>
                  <?php wp_nonce_field( 'restful_license_deactivate_nonce', 'restful_license_deactivate_nonce' ); ?>
                  <input type="submit" class="button-secondary" name="restful_license_deactivate" value="<?php _e( 'Deactivate License', 'restful' ); ?>">
                <?php else : ?>
                  <?php wp_nonce_field( 'restful_license_activate_nonce', 'restful_license_activate_nonce' ); ?>
                  <input type="submit" class="button-secondary" name="restful_license_activate" value="<?php _e( 'Activate License', 'restful' ); ?>">
                <?php endif; ?>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

      <?php submit_button(); ?>
    </form>
  </div>

  <?php

}

/**
 * Register license settings in the options table.
 */
function restful_register_option() {

  register_setting( 'restful_license', 'restful_license_key', 'restful_sanitize_license' );

}
add_action( 'admin_init', 'restful_register_option' );

/**
 * Get rid of the local licence status option when adding a new one.
 */
function restful_sanitize_license( $new ) {

  $old = get_option( 'restful_license_key' );

  if ( $old && $old !== $new ) {
    delete_option( 'restful_license_key_status' );
  }

  return $new;

}

/**
 * Activate the licence key.
 */
function restful_activate_license() {

  if ( isset( $_POST['restful_license_activate'] ) ) {

    if ( ! check_admin_referer( 'restful_license_activate_nonce', 'restful_license_activate_nonce' ) ) {
      return;
    }

    $license = trim( get_option( 'restful_license_key' ) );

    $api_params = array(
      'edd_action' => 'activate_license',
      'license'    => $license,
      'item_name'  => urlencode( RESTFUL_PRODUCT_NAME )
    );

    $response = wp_remote_get( add_query_arg( $api_params, RESTFUL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

    if ( is_wp_error( $response ) ) {
      return false;
    }

    $license_data = json_decode( wp_remote_retrieve_body( $response ) );

    update_option( 'restful_license_key_status', $license_data->license );

  }

}
add_action( 'admin_init', 'restful_activate_license' );

/**
 * Deactivate the licence key.
 */
function restful_deactivate_license() {

  if ( isset( $_POST['restful_license_deactivate'] ) ) {

    if ( ! check_admin_referer( 'restful_license_deactivate_nonce', 'restful_license_deactivate_nonce' ) ) {
      return;
    }

    $license = trim( get_option( 'restful_license_key' ) );

    $api_params = array(
      'edd_action' => 'deactivate_license',
      'license'    => $license,
      'item_name'  => urlencode( RESTFUL_PRODUCT_NAME )
    );

    $response = wp_remote_get( add_query_arg( $api_params, RESTFUL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );

    if ( is_wp_error( $response ) ) {
      return false;
    }

    $license_data = json_decode( wp_remote_retrieve_body( $response ) );

    if ( $license_data->license == 'deactivated' ) {
      delete_option( 'restful_license_key_status' );
    }

  }

}
add_action( 'admin_init', 'restful_deactivate_license' );