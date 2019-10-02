<?php

namespace CoenJacobs\HaveIBeenPwned;

class Login
{
	public function setup()
	{
		add_filter( 'check_password', [$this, 'checkPassword'], 10, 4 );
	}

	public function checkPassword($check, $password, $hash, $user_id)
	{
		// Bail out early on false password
		if ( ! $check ) {
			return $check;
		}

		$pwndhash = utf8_encode( strtoupper( sha1( $password ) ) );
		$k_anon   = substr( $pwndhash, 0, 5 );

		$service_url = 'https://api.pwnedpasswords.com/range/' . $k_anon;
		$response = wp_remote_get($service_url);

		// Unable to reach or failed something over at API
		if ( is_wp_error( $response )) {
			return $check;
		}

		if ( strpos( $response['body'], substr( $pwndhash, 5 ) ) ) {
			update_user_meta( $user_id, '_wphaveibeenpwned', time() );
		} else {
			delete_user_meta($user_id, '_wphaveibeenpwned');
		}

		return $check;
	}
}
