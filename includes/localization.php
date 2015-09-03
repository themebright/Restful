<?php
/**
 * Localization
 */

/**
 * Loads text domains.
 */
function restful_load_text_domain(){

  load_theme_textdomain( 'restful', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'restful_load_text_domain' );
