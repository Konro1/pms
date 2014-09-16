<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, from users!';
		$this->template->title = 'Users';
	}

} // End Welcome
