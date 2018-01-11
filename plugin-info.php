<?php
/*
 * Plugin Name: Plugin Info
 * Version: 1.0.0
 * Author: Smartcat
 * Author URI: https://smartcatdesign.net
 * License: GPL2
*/

namespace pinfo;



/**
 * Include constants and Options definitions
 */
include_once dirname( __FILE__ ) . '/constants.php';


/**
 * Includes required files and initializes the plugin.
 *
 * @since 1.0.0
 */
function init() {

    if ( PHP_VERSION >= Defaults::MIN_PHP_VERSION ) {
                
        include_once dirname( __FILE__ ) . '/includes/functions.php';
        
    } else {
        
        make_admin_notice( __( 'Your version of PHP (' . PHP_VERSION . ') does not meet the minimum required version (5.4+) to run Plugin Info' ) );
        
    }

}

add_action( 'plugins_loaded', 'pinfo\init' );

function make_admin_notice( $message, $type = 'error', $dismissible = true ) {

    add_action( 'admin_notices', function () use ( $message, $type, $dismissible ) {

        echo '<div class="notice notice-' . esc_attr( $type ) . ' ' . ( $dismissible ? 'is-dismissible' : '' ) . '">';
        echo '<p>' . $message . '</p>';
        echo '</div>';

    } );

}

/**
 * Runs on plugin activation.
 *
 * @since 1.0.0
 */
function activate() {}

register_activation_hook( __FILE__, 'pinfo\activate' );

/**
 * Registers scripts that are only needed on admin pages
 * @since 1.0.0
 */
function register_admin_scripts() {

    

}

add_action( 'admin_enqueue_scripts', 'pinfo\register_admin_scripts' );

/**
 * Enqueue scripts on front end
 * @since 1.0.0
 */
function enqueue_scripts() {

    wp_enqueue_style( 'pinfo-style', asset( 'css/style.css' ), null, VERSION );
    
    wp_enqueue_script( 'action-js', asset( 'js/action.js' ), array( 'jquery' ), VERSION );       
                
}

add_action( 'wp_enqueue_scripts', 'pinfo\enqueue_scripts' );

/**
 * Get the URL of an asset from the assets folder.
 *
 * @param string $path
 * @return string
 * @since 1.0.0
 */
function asset( $path = '', $url = true ) {

    if( $url ) {
        $file = trailingslashit( plugin_dir_url( __FILE__ ) );
    } else {
        $file =  trailingslashit( plugin_dir_path( __FILE__ ) );
    }

    return $file . 'assets/' . ltrim( $path, '/' );

}
/**
 * Get the path of a template file.
 *
 * @param  string      $template The file name in the format of file.php.
 * @return bool|string           False if the file does not exist, the path if it does.
 */
function template_path( $template ) {

    $template = trim( $template, '/' );
    $template = rtrim( $template, '.php' );

    $base = trailingslashit( dirname( __FILE__ ) . '/templates' );

    $file = $base . $template . '.php';

    if( file_exists( $file ) ) {
        return $file;
    }

    return false;

}
/**
 * Returns the plugin path from this file (root)
 * @since 1.0.0
 * @return type string   Path of root plugin
 */
function root_path() {
    return plugin_dir_path(__FILE__);
}



