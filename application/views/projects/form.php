<h1><?php echo $heading ?></h1>
<hr>
<div class="col-sm-8">
	<?php echo Form::open($action, array('class' => 'form', 'role' => 'form')) ?>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo isset($post['name']) ? $post['name'] : '' ?>">
		</div>
		<input type="submit" class="btn btn-success" value="Create">
	<?php echo Form::close(); ?>
</div>