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
require_once get_template_directory() . '/includes/ctc.php';
require_once get_template_directory() . '/includes/customizer-options.php';
require_once get_template_directory() . '/includes/customizer-styles.php';
require_once get_template_directory() . '/includes/menus.php';
require_once get_template_directory() . '/includes/scripts.php';
require_once get_template_directory() . '/includes/sidebars.php';
require_once get_template_directory() . '/includes/styles.php';
require_once get_template_directory() . '/includes/tbf.php';
require_once get_template_directory() . '/includes/template-tags.php';
require_once get_template_directory() . '/includes/theme-support.php';

/**
 * Include the updater scripts.
 */
if ( is_admin() ) {
  require_once get_template_directory() . '/includes/updater/updater.php';
  require_once get_template_directory() . '/includes/updater/updater-admin.php';
}
