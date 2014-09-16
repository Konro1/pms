<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tickets extends Controller_Base {

	public function action_index()
	{
		$this->template->content = 'hello, from Tickets!';
		$this->template->title = 'Tickets';
	}

} // End Welcome
