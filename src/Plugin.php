<?php

namespace CoenJacobs\HaveIBeenPwned;

class Plugin
{
	/** @var Login */
	public $login;

	/** @var Notice */
	public $notice;

	public function setup()
	{
		$this->login = new Login();
		$this->login->setup();

		$this->notice = new Notice();
		$this->notice->setup();
	}
}