<?php
/**
* Plugin Name: Kit Chase
* Plugin URI: http://web.bogonko.com
* Description: This is a checkout optimizer whose role is to increase the number of sales by optimizing checkouts and boosting engagements by providing discounts and smart coupons. 
* Version: 1.1.0
* Author: web.bogonko
* Author URI: http://web.bogonko.com
**/

//Adding details at body checkout
add_action('wp_body_open', 'tb_head');


function tb_head()
{
    echo '<h3 class="tb">' . get_user_or_websitename() . '</h3>';
}

//Adding CSS 
add_action('wp_print_styles', 'tb_css');

function tb_css()
{
    echo '
        <style>
		h3.tb {color: #fff; margin: 0; padding: 30px; text-align: center; background: black}
        </style>
    ';
}

//Bottom 

function bottombar_plugin_page() {
	$page_title = 'Bottom Bar Options';
	$menu_title = 'Bottom Bar';
	$capatibily = 'manage_options';
	$slug = 'bottombar-plugin';
	$callback = 'bottombar_page_html';
	$icon = 'dashicons-schedule';
	$position = 68;

	add_menu_page($page_title, $menu_title, $capatibily, $slug, $callback, $icon, $position);
}

add_action('admin_menu', 'bottombar_plugin_page');

function bottombar_register_settings() {
	register_setting('bottombar_option_group', 'bottombar_field');
}

add_action('admin_init', 'bottombar_register_settings');

function bottombar_page_html() { ?>
<div class="wrap bottom-bar-wrapper">
	<form method="post" action="options.php">
		<?php settings_errors() ?>
		<?php settings_fields('bottombar_option_group'); ?>
		<label for="bottombar_field_eat">Bottom Bar Text:</label>
		<input name="bottombar_field" id="bottombar_field_eat" type="text" value=" <?php echo get_option('bottombar_field'); ?> ">
		<?php submit_button(); ?>
	</form>
</div>

<?php }


add_action('admin_head', 'bottombarstyle');

function bottombarstyle() {
	echo '<style>
	.bottom-bar-wrapper {display: flex; align-items: center;justify-content: center;margin-top:35px}
	.bottom-bar-wrapper form {width: 100%; max-width: 800px;}
	.bottom-bar-wrapper label {font-size: 3em; display: block; line-height:normal; margin-bottom: 30px;font-weigth:bold}
	.bottom-bar-wrapper input {color:#666;width: 100%; padding: 30px; font-size: 3em}
	.bottom-bar-wrapper .button {font-size: 2em; text-transform: uppercase; background: rgba(59,173,227,1);
		background: linear-gradient(45deg, rgba(59,173,227,1) 0%, rgba(87,111,230,1) 25%, rgba(152,68,183,1) 51%, rgba(255,53,127,1) 100%);border:none}
  	</style>';
}