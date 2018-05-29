<?php
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size('300x300', 300, 300, true);

}

register_nav_menus( array(
	'top' => 'Top menu',
) );

require_once(get_template_directory() . '/includes/functions/services.php');


//Submit Call Form
require_once(get_template_directory().'/includes/functions/sign_up_form.php');
