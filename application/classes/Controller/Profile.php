<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Profile extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, from Profile!';
		$this->template->title = 'Profile';
	}

} // End Welcome
