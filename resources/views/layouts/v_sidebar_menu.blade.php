@php 
$sg1 = Request::segment(1); 
$sg2 = Request::segment(2,1); 
$sg3 = Request::segment(3,1); 
@endphp
<!-- Sidebar Menu -->
<nav class="mt-2">
	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<li class="nav-item">
			<a href="/dashboard" class="nav-link">
				<i class="fas fa-th-large nav-icon"></i> 
				<p>Dashboard</p>
			</a>
		</li>
		@if (getAuth('role') == 'admin')
			<li class="nav-item">
				<a href="/user/admin" class="nav-link {{ $sg2 == 'admin' ? 'active' : '' }}">
					<i class="fas fa-users nav-icon"></i> 
					<p>Admin</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="/user/dosen" class="nav-link {{ $sg2 == 'dosen' ? 'active' : '' }}">
					<i class="fas fa-user-tie nav-icon"></i> 
					<p>Dosen</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="/user/mahasiswa" class="nav-link {{ $sg2 == 'mahasiswa' ? 'active' : '' }}">
					<i class="fas fa-user-graduate nav-icon"></i> 
					<p>Mahasiswa</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="/mata-kuliah" class="nav-link {{ $sg1 == 'mata-kuliah' ? 'active' : '' }}">
					<i class="fas fa-users nav-icon"></i> 
					<p>Mata Kuliah</p>
				</a>
			</li>
		@endif

		<li class="nav-item">
			<a href="/kelas" class="nav-link {{ $sg1 == 'kelas' ? 'active' : '' }}">
				<i class="fas fa-chalkboard-teacher nav-icon"></i> 
				<p>Kelas</p>
			</a>
		</li>
	</ul>
</nav>