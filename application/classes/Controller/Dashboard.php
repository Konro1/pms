<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, world!';
	}

} // End Welcome
