<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, from projects!';
		$this->template->title = 'Projects';
	}

} // End Welcome
