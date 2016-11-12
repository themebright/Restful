<?php
/**
 * Functions
 */

/**
 * Include ThemeBright Church Framework.
 */
require_once get_template_directory() . '/tbcf/framework.php';

/**
 * Include theme functions.
 */
require_once get_template_directory() . '/includes/assets.php';
require_once get_template_directory() . '/includes/customizer.php';
require_once get_template_directory() . '/includes/filters.php';
require_once get_template_directory() . '/includes/localization.php';
require_once get_template_directory() . '/includes/menus.php';
require_once get_template_directory() . '/includes/sidebars.php';
require_once get_template_directory() . '/includes/template-tags.php';
require_once get_template_directory() . '/includes/theme-support.php';

/**
 * Include theme admin functions.
 */
if ( is_admin() ) {
	require_once get_template_directory() . '/includes/upgrade.php';
  require_once get_template_directory() . '/includes/admin.php';
}
