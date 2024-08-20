<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="fas fa-user-circle"></i> Hallo
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">
					<b><u>{{ getAuth('nama') }}</u></b>
					<br>
					<b class="text-info">- {{ ucwords(getAuth('role')) }} -</b>
				</span>
				<div class="dropdown-divider"></div>
				<a href="/logout" class="dropdown-item">
					<i class="fas fa-sign-out-alt text-danger mr-2"></i> Keluar
				</a>
				<div class="dropdown-divider"></div>
				<a href="#!" class="dropdown-item dropdown-footer"></a>
			</div>
		</li>
	</ul>
</nav>