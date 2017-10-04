<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */

function lesfrancas_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer_right',
		'before_widget' => '<div class="footer__socials">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_widget( 'Social_Link_Widget' );

	register_sidebar( array(
		'name'          => 'Popups',
		'id'            => 'popups',
		'before_widget' => '<div class="footer__contactPopup">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );
	register_widget( 'Contact_Popup_Widget' );

}
add_action( 'widgets_init', 'lesfrancas_widgets_init' );