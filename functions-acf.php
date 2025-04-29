<?php 

// Option pages
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
		'menu_title'	=> 'Thema instellingen',
		'page_title'	=> 'Instellingen',
		'menu_slug' 	=> 'theme-settings',
		'redirect'		=> false 
	));
}

