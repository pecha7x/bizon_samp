<?php /*

**************************************************************************

Plugin Name:  registered-users-only-2
Plugin URI:   http://jehy.ru/wp-plugins.en.html
Description:  Redirects all non-logged in users to your login form. Make sure to disable registration or install WP-invites plugin if you want your blog truely private. Original author - Viper007Bond.
Version:      0.3
Min WP Version: 2.6
Max WP Version: 2.9.2
Author:       Jehy
Author URI:   http://jehy.ru/index.en.html

**************************************************************************/

class RegisteredUsersOnly {
	var $exclusions = array();
	// Class initialization
	function RegisteredUsersOnly () 
  {
		// Register our hooks
		add_action( 'wp', array(&$this, 'MaybeRedirect') );
		add_action( 'init', array(&$this, 'LoginFormMessage') );
		add_action( 'login_head', array(&$this, 'NoIndex'), 1 );

	}


	// Depending on conditions, run an authentication check
	function MaybeRedirect() {
    global $bp;
		// If the user is logged in, then abort
		if ( current_user_can('read') ) return;
    
	if ($bp&&($bp->current_component == BP_REGISTER_SLUG ))//buddypress
		return;
			#'wp-trackback.php',
			#'wp-app.php',
		$this->exclusions = array(
			'wp-login.php',
			'wp-signup.php',
			'wp-register.php',
			'wp-activate.php',
			'wp-cron.php' // Just incase
		);
		// If the current script name is in the exclusion list, abort
		if ( in_array( basename($_SERVER['PHP_SELF']), apply_filters( 'registered-users-only_exclusions', $this->exclusions) ) ) return;

		// Still here? Okay, then redirect to the login form
		auth_redirect();
	}


	// Use some deprecate code (yeah, I know) to insert a "You must login" error message to the login form
	// If this breaks in the future, oh well, it's just a pretty message for users
	function LoginFormMessage() {
		// Don't show the error message if anything else is going on (registration, etc.)
		if ( 'wp-login.php' != basename($_SERVER['PHP_SELF']) || !empty($_POST) || ( !empty($_GET) && empty($_GET['redirect_to']) ) ) return;

		global $error;
		$error = __( 'Only registered users can watch this site. Please register or login.', 'registered-users-only' );
	}


	// Tell bots to go away (they shouldn't index the login form)
	function NoIndex() {
		echo "	<meta name='robots' content='noindex,nofollow' />\n";
	}

}

// Start this plugin once all other plugins are fully loaded
add_action( 'plugins_loaded', create_function( '', 'global $RegisteredUsersOnly; $RegisteredUsersOnly = new RegisteredUsersOnly();' ) );

?>