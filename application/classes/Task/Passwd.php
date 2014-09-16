<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Task for generating passwords.
 *
 * It can accept the following options:
 *  - length: length of generated password.
 *  - password: if this option is passed - task ignores length and generating new password.
 *  - user: if you want to set password for certain user - then provide his username/email in this option; it requires Jam and Jam-Auth
 *  - action: if you want to create or update password for certain user - then provide create/update in this option; it requires Jam and Jam-Auth
 *
 * @package    Tasks
 * @category   Helpers
 * @author     Serhiy Dmytriv
 */
class Task_Passwd extends Minion_Task
{
	protected $_options = array(
		'length' => 15,
		'password' => '',
		'user' => null,
		'action' => null,
		'email' => null
	);

	protected function _execute(array $params)
	{
		if(!$params['password'])
		{
			for($i=0; $i<$params['length']; $i++) $params['password'] .= chr(rand(33, 126));
		}

		$hash = Auth::instance()->hash_password($params['password']);

		if($params['user'])
		{
			if(Valid::email($params['user']))
			{
				$field = 'email';
			}
			else
			{
				$field = 'username';
			}

			if ($params['action'] == 'create')
			{
				$user = Jam::build('User')->set(array(
					'password' => $hash,
					'username' => $params['user'],
					'email' => $params['email'],
				))->save();

			}
			else
			{
				Jam::update('User')->where($field, '=', $params['user'])->set(array('password' => $hash))->execute();
			}
		}

		echo $params['password']." ".$hash.PHP_EOL;
	}

	public function build_validation(Validation $validation)
	{
		return parent::build_validation($validation)
			->rule('length', 'numeric');
	}
}
