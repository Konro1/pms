<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller {

	public function before()
	{
		parent::before();

		if(!Auth::instance()->logged_in() && !in_array($this->request->action(), array('index', 'logout')))
		{
			Session::instance()->set('__auth_redirect_url', $this->request->uri());
			$this->redirect('auth');
		}
	}

	public function action_index()
	{
		if(Auth::instance()->logged_in())
		{
			$this->redirect(Session::instance()->get_once('__auth_redirect_url', '/dashboard/'));
		}

		$view = View::factory('auth/login');
		$view->user     = '';
		$view->password = '';

		if ($this->request->post('user') && $this->request->post('password'))
		{
			$login = Auth::instance()->login($this->request->post('user'), $this->request->post('password'));

			if ($login)
			{
				$this->redirect(Session::instance()->get_once('__auth_redirect_url', '/dashboard/'));
			}

			$view->user     = $this->request->post('user');
			$view->password = $this->request->post('password');
		}


		$this->response->body($view);
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		$this->redirect('auth');
	}

} // End Welcome
