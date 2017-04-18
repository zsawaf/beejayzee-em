<?php
/*
Plugin Name: BJZM Forms
Description: A forms plugin that isn't a piece of shit. 
Version: 1.0.0
Author: Zafer Sawaf
*/

define('BJZM_FORM_PATH', plugin_dir_path(__FILE__));
define('BJZM_FORM_URL', plugins_url('', __FILE__));

require (BJZM_FORM_PATH.'forms/init_forms.php');
require (BJZM_FORM_PATH.'fields/init_fields.php');
require (BJZM_FORM_PATH.'core/init.php');

