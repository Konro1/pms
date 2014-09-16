<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(

	'driver'       => 'Jam',
	'hash_method'  => 'sha256',
	'hash_key'     => 'AS486@*^$!GSGdhga27Q@$',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

);
