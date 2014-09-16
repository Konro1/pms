<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auth</title>
	<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.min.css">
	<style>
		.content {
			background-color: #eee;
			padding: 40px;
			-webkit-border-radius: 10px 10px 10px 10px;
			-moz-border-radius: 10px 10px 10px 10px;
			border-radius: 10px 10px 10px 10px;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			-moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
			box-shadow: 0 1px 2px rgba(0,0,0,.15);
			width: 600px;
			margin:  50px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="login-form">
				<?php echo Form::open('auth',array('class' => 'form-horizontal', 'role' => 'post')) ?>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Email/Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Email" name="user" value="<?php echo $user ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value="<?php echo $password ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-10">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember me
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-10">
								<button type="submit" class="btn btn-primary">Sign in</button>
							</div>
						</div>
					<?php echo Form::close(); ?>
				</div>
			</div>
		</div>
	</div>
	<script src="/media/js/jquery-1.11.1.min.js"></script>
	<script src="/media/js/bootstrap.min.js"></script>
</body>
</html>