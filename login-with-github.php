<?php
/**
 * Plugin Name: Login with GitHub
 * Description: Allow users to login/register via Github.
 * Version: 1.0.0
 * Author: Parth Vataliya
 * Author URI: https://profiles.wordpress.org/parthvataliya/
 * Text Domain: login-with-github
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Github\login
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LWG_BASEFILE', __FILE__ );
define( 'LWG_VERSION', '1.0.0' );
define( 'LWG_ABSURL', plugins_url( '/', LWG_BASEFILE ) );

$vendor_file = __DIR__ . '/vendor/autoload.php';
if ( is_readable( $vendor_file ) ) {
	require_once $vendor_file;
}

/**
 * Plugin textdomain.
 */
function login_with_github_textdomain() {
	load_plugin_textdomain( 'login-with-github', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'plugins_loaded', 'login_with_github_textdomain', 20 );

/**
 * Plugin activation.
 */
function login_with_github_activation() {
}
register_activation_hook( __FILE__, 'login_with_github_activation' );

/**
 * Plugin deactivation.
 */
function login_with_github_deactivation() {
}
register_deactivation_hook( __FILE__, 'login_with_github_deactivation' );

/**
 * Initialization class.
 */
function login_with_github_init() {
	new \Github\Login\LoginWithGitHub();
}
add_action( 'plugins_loaded', 'login_with_github_init' );
