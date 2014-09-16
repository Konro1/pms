<h1>Projects</h1>
<hr>
<div class="pull-right">
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
  					<td></td>
  					<td>
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