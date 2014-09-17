<?php defined('SYSPATH') OR die('No direct script access.');

/**
* Project model
*/
class Model_Project_Status extends Jam_Model
{
	public static function initialize(Jam_Meta $meta)
	{
		$meta->name_key('id');
		$meta->primary_key('id');

		$meta->fields(array(
			'id'        => Jam::field('primary'),
			'name'      => Jam::field('string'),
			'type'      => Jam::field('string'),
		));
	}
}
?>