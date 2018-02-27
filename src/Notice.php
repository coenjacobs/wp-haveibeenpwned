<?php

namespace CoenJacobs\HaveIBeenPwned;

class Notice
{
	public function setup()
	{
		add_action('all_admin_notices', [$this, 'outputNotice'], 10);
	}

	public function outputNotice()
	{
		$flagged = get_user_meta(get_current_user_id(), '_wphaveibeenpwned', true);

		if ( $flagged ) {
			$url = admin_url('profile.php');
			echo '<div class="error"><p><strong>WARNING:</strong> Your password has been compromised and it is recommended you <a href="'.$url.'">change your password immediately</a>.</p></div>';
		}
	}
}