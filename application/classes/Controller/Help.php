<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Help extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, from Help!';
		$this->template->title = 'Help';
	}

} // End Welcome
