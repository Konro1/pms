<h1>Tickets</h1>
<hr>
<style>
  .controls {
    margin-bottom: 20px;
  }
</style>
<div class="pull-right controls">
 <a href="/tickets/create" class="btn btn-success">Create a ticket</a>
</div>
<div class="table-responsive">
	<table class="table table-striped">
    <thead>
     <tr>
      <td>Name</td>
      <td>Status</td>
      <td>Assignee</td>
      <td>Actions</td>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($tickets as $ticket): ?>
    <tr>
     <td>#<?php echo $ticket->id.' '.$ticket->name ?></td>
     <td>
        <?php if (isset($statuses_list[$ticket->status_id])): ?>
        <span class="label <?php if ($statuses_list[$ticket->status_id]['type'] == 'open'): ?>label-success <?php else: ?>label-default<?php endif ?>">
            <?php echo $statuses_list[$ticket->status_id]['name'] ?>
        </span>
        <?php endif ?>
     </td>
     <td><?php echo $ticket->assignee->firstname .' '.$ticket->assignee->lastname ?></td>
     <td style="width: 100px;">
      <a href="/tickets/edit/<?php echo $ticket->id ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
      <a href="/tickets/delete/<?php echo $ticket->id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
  </tr>
<?php endforeach ?>
<?php if (!$tickets): ?>
  <tr>
   <td colspan="4">No tickets</td>
 </tr>
<?php endif ?>
</tbody>
</table>
</div>