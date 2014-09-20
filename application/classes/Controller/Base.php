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

	public function get_project_statuses()
	{
		$statuses_list = array();
		$statuses = Jam::all('Project_Status');
		foreach ($statuses as $status)
		{
			$statuses_list[$status->id] = array(
				'name' => $status->name,
				'type' => $status->type,
			);
		}

		return $statuses_list;
	}
	public function get_ticket_statuses()
	{
		$statuses_list = array();
		$statuses = Jam::all('Ticket_Status');
		foreach ($statuses as $status)
		{
			$statuses_list[$status->id] = array(
				'name' => $status->name,
				'type' => $status->type,
			);
		}

		return $statuses_list;
	}

	public function get_projects_list()
	{
		$projects_list = array();
		$projects = Jam::all('Project');
		foreach ($projects as $project)
		{
			$projects_list[$project->id] = array(
				'name' => $project->name,
				'type' => $project->type,
			);
		}

		return $projects_list;
	}

	public function get_users_list()
	{
		$users_list = array();
		$users = Jam::all('User');
		foreach ($users as $user)
		{
			$users_list[$user->id] = array(
				'name' => $user->firstname.' '.$user->lastname,
				'type' => $user->type,
			);
		}

		return $users_list;
	}
} // End Base
