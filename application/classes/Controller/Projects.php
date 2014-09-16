<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller_Base 
{
	public function before()
	{
		parent::before();
		$this->template->title = 'Projects';
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
			$project->name = $this->request->post('name');
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
			$project->name = $this->request->post('name');
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
