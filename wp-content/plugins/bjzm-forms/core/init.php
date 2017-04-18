<?php  

add_action('wp_enqueue_scripts', 'bjzm_forms_add_scripts');
function bjzm_forms_add_scripts() {
	wp_register_style('selectboxit', BJZM_FORM_URL.'/assets/css/selectboxit.css');
	wp_enqueue_style('selectboxit');

	wp_register_style('bjzm_forms_style', BJZM_FORM_URL.'/assets/css/bjzm_forms.css');
	wp_enqueue_style('bjzm_forms_style');

	wp_register_script('jquery_ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery'));
	wp_enqueue_script('jquery_ui');

	wp_register_script('selectboxit_script', BJZM_FORM_URL.'/assets/js/selectboxit.js', array('jquery'));
	wp_enqueue_script('selectboxit_script');

	wp_register_script('bjzm_forms_script', BJZM_FORM_URL.'/assets/js/bjzm_forms.js', array('jquery', 'selectboxit_script'));
	wp_localize_script('bjzm_forms_script', ASSETS, array(
		'assets_url' => get_template_directory_uri().'/assets/img',
		'ajaxurl' => admin_url('admin-ajax.php'),
	));
	wp_enqueue_script('bjzm_forms_script');
}


