<?php defined('SYSPATH') OR die('No direct script access.');

/**
* Ticket status model
*/
class Model_Ticket_Type extends Jam_Model
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