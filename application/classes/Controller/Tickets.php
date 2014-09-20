<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tickets extends Controller_Base {

	public function before()
	{
		parent::before();

		$this->template->title = 'Tickets';

		View::set_global(array(
			'statuses_list' => $this->get_ticket_statuses(),
			'projects_list' => $this->get_projects_list(),
			'types_list'    => $this->get_types_list(),
			'users_list'    => $this->get_users_list(),
		));
	}

	public function action_index()
	{
		$tickets = Jam::all('Ticket')->as_array();

		$this->template->content = View::factory('tickets/index', array(
			'tickets' => $tickets,
		));
	}

	public function action_create()
	{
		$ticket = Jam::build('Ticket');

		if ($this->request->post()) 
		{
			$ticket->set($this->request->post());
			$ticket->creator_id = $this->current_user->id;
			$ticket->save();

			$this->redirect('tickets');
		}

		$this->template->content = View::factory('tickets/form', array(
			'ticket' => $ticket->as_array(),
			'action' => 'tickets/create',
			'heading' => 'Create a ticket',
		));
	}

	public function action_edit()
	{
		$ticket = Jam::find('Ticket', $this->request->param('id'));

		if ($this->request->post())
		{
			$ticket->set($this->request->post());
			$ticket->save();

			$this->redirect('tickets');
		}

		$this->template->content = View::factory('tickets/form',array(
			'action'  => 'tickets/edit/'.$this->request->param('id'),
			'heading' => 'Edit ticket #'.$ticket->id,
			'ticket'    => $this->request->post() ? $this->request->post() : $ticket->as_array(),
		));
	}

	public function action_delete()
	{
		$ticket = Jam::find('Ticket', $this->request->param('id'));
		$ticket->delete();

		$this->redirect('tickets');
	}

	private function get_types_list()
	{
		$types_list = array();
		$types = Jam::all('Ticket_Type');

		foreach ($types as $type) 
		{
			$types_list[$type->id] = array(
				'name' => $type->name,
			);
		}

		return $types_list;
	}

} // End Welcome
