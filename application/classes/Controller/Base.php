<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base extends Controller_Template {

	public $current_user = null;

	public function before()
	{
		parent::before();

		if (!Auth::instance()->logged_in())
		{
			$this->redirect('auth');
		}

		$current_user = Auth::instance()->get_user();
		$this->current_user = $current_user;
		View::bind_global('current_user', $current_user);
	}
} // End Base
