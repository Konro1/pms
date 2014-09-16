<?php defined('SYSPATH') OR die('No direct script access.');

class Model_User extends Model_Auth_User
{
	protected $_access_table = null;

	public function is_permitted($action, $resource)
	{
		if($this->roles->has('admin'))
		{
			return true;
		}

		if(is_object($resource))
		{
			$resource = $resource->get_resource();
		}

		if(is_null($this->_access_table))
		{
			$this->build_access_table();
		}

		return Arr::path($this->_access_table, $resource.'.'.$action, false);
	}

	protected function build_access_table()
	{
		$roles = $this->roles->as_array('id');
		$resources = Jam::all('Resource')->execute()->as_array('id');
		$permissions = Jam::all('Permission')->where('role', 'IN', array_keys($roles))->execute()->as_array();

		foreach($permissions as $permission)
		{
			$this->_access_table[$resources[$permission['resource']]['name']]['view'] = $this->get_ability($permission, 'view', $resources[$permission['resource']]['name']);
			$this->_access_table[$resources[$permission['resource']]['name']]['edit'] = $this->get_ability($permission, 'edit', $resources[$permission['resource']]['name']);
			$this->_access_table[$resources[$permission['resource']]['name']]['delete'] = $this->get_ability($permission, 'delete', $resources[$permission['resource']]['name']);
		}
	}

	protected function get_ability($permission, $action, $resource)
	{
		switch($permission[$action])
		{
			case 'allow':
				return true;
			break;

			case 'deny':
				return false;
			break;

			case 'ignore':
				$ability = Arr::path($this->_access_table, $resource.'.'.$action, null);
				return is_null($ability) ? true : $ability;
			break;
		}
	}
}
