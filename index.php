<?php

/**
 * @package HOT
 * @version 0.1
 */
/*
Plugin Name: Visually impaired
Description:
Author: Pechenki
Version: 0.1
Author URI: https://pechenki.top/
*/
//////////////////////////////////
if ( ! defined( 'ABSPATH' )  &&  !defined( 'VIC_DIR' )) {
    exit;
}
define( 'VIC_DIR', plugin_dir_path( __FILE__ ) );
define( 'VIC_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'VIC_DIR_NAME', dirname( plugin_basename( __FILE__ ) ) );
define( 'VIC_SETTING', 'tsev__globalSetind' );



require_once( VIC_DIR . 'autoload.php' );
require_once( VIC_DIR . 'public/WicWidget.php' );

use pechenki\WIC\wic;

function true_top_posts_widget_load() {
    register_widget( 'WicWidget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );


$wic = new wic;
$wic->init();