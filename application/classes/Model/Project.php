<?php defined('SYSPATH') OR die('No direct script access.');

/**
* Project model
*/
class Model_Project extends Jam_Model
{
	public static function initialize(Jam_Meta $meta)
	{
		$meta->name_key('id');
		$meta->primary_key('id');

		$meta->association('users', Jam::association('manytomany'));
		$meta->association('user', Jam::association('hasone'));

		$meta->fields(array(
			'id'        => Jam::field('primary'),
			'name'      => Jam::field('string'),
		));
	}
}
?>