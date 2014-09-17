<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller_Base
{
	private $statuses_list = array();

	public function before()
	{
		parent::before();
		$this->template->title = 'Projects';

		$statuses = Jam::all('Project_Status');
		foreach ($statuses as $status)
		{
			$this->statuses_list[$status->id] = array(
				'name' => $status->name,
				'type' => $status->type,
			);
		}

		View::set_global(array(
			'statuses_list' => $this->statuses_list,
		));
	}

	public function action_index()
	{
		$projects = Jam::all('Project')->as_array();

		$this->template->content = View::factory('projects/index', array(
			'projects' => $projects,
		));
	}

	public function action_create()
	{
		if ($this->request->post())
		{
			$project = Jam::build('Project');

			$project->name       = $this->request->post('name');
			$project->status_id  = $this->request->post('status_id');
			$project->creator_id = $this->current_user->id;

			$project->save();

			$this->redirect('projects');
		}

		$this->template->content = View::factory('projects/form',array(
			'action'  => 'projects/create',
			'heading' => 'Create project',
			'post'    => $this->request->post(),
		));
	}

	public function action_edit()
	{
		$project = Jam::find('Project', $this->request->param('id'));

		if ($this->request->post())
		{
			$project->name      = $this->request->post('name');
			$project->status_id = $this->request->post('status_id');

			$project->save();

			$this->redirect('projects');
		}

		$this->template->content = View::factory('projects/form',array(
			'action'  => 'projects/edit/'.$this->request->param('id'),
			'heading' => 'Edit project #'.$project->id,
			'post'    => $this->request->post() ? $this->request->post() : $project->as_array(),
		));
	}

	public function action_delete()
	{
		$project = Jam::find('Project', $this->request->param('id'));
		$project->delete();

		$this->redirect('projects');
	}

} // End Welcome
