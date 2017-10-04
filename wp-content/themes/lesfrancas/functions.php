<?php
/**Les Francas Twenty Sixteen functions and definitions
 *
 *
 * @link https://codex.wordpress.org/Theme_Development
 *
 * @package Websiting
 * @subpackage lesfrancas
 * @since Les Francas 1.0
 */

/**
 * Les Francas only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}
// Dev
include('functions/dev/debug.php');
include('functions/dev/tools.php');
include('functions/dev/getters.php');

include('functions/theme_setup.php');

// Back
include('functions/back/widgets/widget_init.php');
include('functions/back/widgets/social_link.php');
include('functions/back/widgets/contact_popup.php');
include('functions/back/types/q_and_r.php');
include('functions/back/types/partenaires.php');
include('functions/back/types/faq.php');
include('functions/back/options.php');
include('functions/back/searchBar.php');
include('functions/back/sendQuestion.php');
include('functions/back/postUpdate.php');

// Front
include('functions/front/category_page.php');
include('functions/front/contribution.php');
