<h1>Projects</h1>
<hr>
<style>
  .controls {
    margin-bottom: 20px;
  }
</style>
<div class="pull-right controls">
 <a href="/projects/create" class="btn btn-success">Create a project</a>
</div>
<div class="table-responsive">
	<table class="table table-striped">
    <thead>
     <tr>
      <td>Name</td>
      <td>Status</td>
      <td>Actions</td>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($projects as $project): ?>
    <tr>
     <td><?php echo $project->name ?></td>
     <td>
        <?php if (isset($statuses_list[$project->status_id])): ?>
        <span class="label <?php if ($statuses_list[$project->status_id]['type'] == 'open'): ?>label-success <?php else: ?>label-default<?php endif ?>">
            <?php echo $statuses_list[$project->status_id]['name'] ?>
        </span>
        <?php endif ?>
     </td>
     <td style="width: 100px;">
      <a href="projects/edit/<?php echo $project->id ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
      <a href="projects/delete/<?php echo $project->id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
    </td>
  </tr>
<?php endforeach ?>
<?php if (!$projects): ?>
  <tr>
   <td colspan="3">No projects</td>
 </tr>
<?php endif ?>
</tbody>
</table>
</div>