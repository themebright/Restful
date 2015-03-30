<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => TBF_THEME_AUTHOR_URI, // Site where EDD is hosted
		'item_name'      => TBF_THEME_NAME,       // Name of theme
		'theme_slug'     => get_template(),       // Theme slug
		'version'        => TBF_THEME_VERSION,    // The current version of this theme
		'author'         => TBF_THEME_AUTHOR,     // The author of this theme
		'download_id'    => '13',                 // Optional, used for generating a license renewal link
		'renew_url'      => ''                    // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'restful' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'restful' ),
		'license-key'               => __( 'License Key', 'restful' ),
		'license-action'            => __( 'License Action', 'restful' ),
		'deactivate-license'        => __( 'Deactivate License', 'restful' ),
		'activate-license'          => __( 'Activate License', 'restful' ),
		'status-unknown'            => __( 'License status is unknown.', 'restful' ),
		'renew'                     => __( 'Renew?', 'restful' ),
		'unlimited'                 => __( 'unlimited', 'restful' ),
		'license-key-is-active'     => __( 'License key is active.', 'restful' ),
		'expires%s'                 => __( 'Expires %s.', 'restful' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'restful' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'restful' ),
		'license-key-expired'       => __( 'License key has expired.', 'restful' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'restful' ),
		'license-is-inactive'       => __( 'License is inactive.', 'restful' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'restful' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'restful' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'restful' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'restful' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'restful' )
	)

);
