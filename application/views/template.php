<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($title) ? $title : 'PMS' ?></title>
	<link rel="stylesheet" type="text/css" href="/media/css/bootstrap.min.css">
</head>
<body>
	<section id="container" class="container-fluid">
		<div class="row">
			<?php echo View::factory('navigation'); ?>
		</div>
		<div class="clearfix" style="margin-bottom: 80px;"></div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo $content ?>
			</div>
		</div>
	</section>

	<script src="/media/js/jquery-1.11.1.min.js"></script>
	<script src="/media/js/bootstrap.min.js"></script>
</body>
</html>