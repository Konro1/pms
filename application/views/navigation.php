<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/dashboard">PMS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li <?php if (Request::current()->controller() == 'Dashboard'): ?>class="active"<?php endif ?>><a href="/dashboard">Dashboard</a></li>

        <?php if($current_user->is_permitted('view', 'projects') || $current_user->is_permitted('view', 'projects')) : ?>
        	<li <?php if (Request::current()->controller() == 'Projects'): ?>class="active"<?php endif ?>><a href="/projects">Projects</a></li>
    	<?php endif; ?>

    	<?php if($current_user->is_permitted('view', 'tickets') || $current_user->is_permitted('view', 'tickets')) : ?>
        	<li <?php if (Request::current()->controller() == 'Tickets'): ?>class="active"<?php endif ?>><a href="/tickets">Tickets</a></li>
    	<?php endif; ?>

        <?php if($current_user->is_permitted('view', 'roles') || $current_user->is_permitted('view', 'users')) : ?>
        	<li <?php if (Request::current()->controller() == 'Users'): ?>class="active"<?php endif ?>><a href="/users">Users</a></li>
    	<?php endif; ?>

      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown <?php if (in_array(Request::current()->controller(), array('Profile','Help'))): ?>active<?php endif ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-wrench"></span></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/profile">Profile</a></li>
            <li><a href="/help">Help</a></li>
            <li class="divider"></li>
            <li><a href="/auth/logout">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>