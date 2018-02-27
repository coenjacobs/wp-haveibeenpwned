<?php

/**
 * Plugin Name: Have I Been Pwned
 * Description: Checks if the password for each user account has been compromised via haveibeenpwned.com as soon as the user logs in. This will never send the actual password of your users, but it rather fetches a list to do the check locally.
 * Author: Coen Jacobs
 * Author URI: https://coenjacobs.me
 * Version: 0.1
 */

require('vendor/autoload_52.php');

/**
 * @return \CoenJacobs\HaveIBeenPwned\Plugin
 */
function _haveibeenpwned()
{
	static $plugin;

	if ( is_null( $plugin ) ) {
		$plugin = new \CoenJacobs\HaveIBeenPwned\Plugin();
		$plugin->setup();
	}

	return $plugin;
}

$checker = new HIBP_WPUpdatePhp('5.4');
$checker->set_plugin_name('Have I Been Pwned');

if ( $checker->does_it_meet_required_php_version() ) {
	require('vendor/autoload.php');

	add_action( 'plugins_loaded', '_haveibeenpwned' );
}