<?php
/**
 * Functions
 */

/**
 * Include ThemeBright framework.
 */
require_once get_template_directory() . '/framework/framework.php';

/**
 * Include Customizer Library.
 */
require_once get_template_directory() . '/customizer-library/customizer-library.php';

/**
 * Include theme functions.
 */
require_once get_template_directory() . '/includes/body-classes.php';
require_once get_template_directory() . '/includes/customizer-options.php';
require_once get_template_directory() . '/includes/customizer-styles.php';
require_once get_template_directory() . '/includes/images-sizes.php';
require_once get_template_directory() . '/includes/menus.php';
require_once get_template_directory() . '/includes/scripts.php';
require_once get_template_directory() . '/includes/sidebars.php';
require_once get_template_directory() . '/includes/styles.php';
require_once get_template_directory() . '/includes/tbf.php';
require_once get_template_directory() . '/includes/theme-support.php';








/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {

  global $wp_query;

  return ( $wp_query->max_num_pages > 1 );

}










function restful_comment_form() {

  $fields = array(
    'author' => '<div class="row author-info"><div class="col col-xs-12 col-sm-6"><input class="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . __( 'Your Name', 'restful' ) . ' *"></div>',
    'email' => '<div class="col col-xs-12 col-sm-6"><input class="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Your Email', 'restful' ) . ' *"></div></div>',
    'url' =>''
  );

  $args = array(
    'comment_field' => '<textarea class="comment" name="comment" rows="10" placeholder="' . __( 'Your Comment', 'restful' ) . ' *"></textarea>',
    'fields' => $fields,
    'comment_notes_before' => '',
    'comment_notes_after' => ''
  );

  comment_form( $args );

}







function restful_copyright_text() {

  if ( get_theme_mod( 'copyright_text' ) ) {
    $str = get_theme_mod( 'copyright_text' );
  } else {
    $str = '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' );
  }

  echo $str;

}