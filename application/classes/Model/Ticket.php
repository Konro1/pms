<?php defined('SYSPATH') OR die('No direct script access.');

/**
* Ticket model
*/
class Model_Ticket extends Jam_Model
{
	public static function initialize(Jam_Meta $meta)
	{
		$meta->name_key('id');
		$meta->primary_key('id');

		$meta->association('project', Jam::association('belongsto'));
		$meta->association('creator', Jam::association('belongsto', array(
			'foreign_model' => 'User',
			)));
		$meta->association('assignee', Jam::association('belongsto', array(
			'foreign_model' => 'User',
			)));
		$meta->association('status', Jam::association('hasone', array(
			'foreign_model' => 'Ticket_Status',
			)));
		$meta->association('type', Jam::association('hasone', array(
			'foreign_model' => 'Ticket_Type',
			)));

		$meta->fields(array(
			'id'          => Jam::field('primary'),
			'name'        => Jam::field('string'),
			'description' => Jam::field('text'),
			'status_id'   => Jam::field('integer'),
			'types_id'    => Jam::field('integer'),
			'creator_id'  => Jam::field('integer'),
			'assignee_id' => Jam::field('integer'),
		));
	}
}
?>