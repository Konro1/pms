<h1><?php echo $heading ?></h1>
<hr>
<div class="col-sm-8">
	<?php echo Form::open($action, array('class' => 'form', 'role' => 'form')) ?>
		<div class="form-group">
			<label for="project">Project</label>
			<select name="project_id" id="project" class="form-control">
				<?php foreach ($projects_list as $key => $value): ?>
					<option value="<?php echo $key ?>" <?php if ($ticket['project_id'] == $key): ?> selected="selected" <?php endif ?>><?php echo $value['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo isset($ticket['name']) ? $ticket['name'] : '' ?>">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea class="form-control" name="description" rows="3" id="description" placeholder="Description"><?php echo isset($ticket['description']) ? $ticket['description'] : '' ?></textarea>
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<select name="status_id" id="status" class="form-control">
				<?php foreach ($statuses_list as $key => $value): ?>
					<option value="<?php echo $key ?>" <?php if ($ticket['status_id'] == $key): ?> selected="selected" <?php endif ?>><?php echo $value['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label for="type">Type</label>
			<select name="types_id" id="type" class="form-control">
				<?php foreach ($types_list as $key => $value): ?>
					<option value="<?php echo $key ?>" <?php if (isset($post['types_id']) && $post['types_id'] == $key): ?> selected="selected" <?php endif ?>><?php echo $value['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label for="assignee">Assignee</label>
			<select name="assignee_id" id="assignee" class="form-control">
				<?php foreach ($users_list as $key => $value): ?>
					<option value="<?php echo $key ?>" <?php if (isset($post['assignee_id']) && $post['assignee_id'] == $key): ?> selected="selected" <?php endif ?>><?php echo $value['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<input type="submit" class="btn btn-success" value="Create">
	<?php echo Form::close(); ?>
</div>