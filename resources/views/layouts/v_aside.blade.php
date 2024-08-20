<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="/dashboard" class="brand-link">
		<img src="{!! asset('template') !!}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ isPengaturan('nama_aplikasi') }} </span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
				<a href="#" class="d-block">{{ getAuth('nama') }}</a>
				@php
					if(getAuth('role') == 'admin'){
						$cl = 'success';
					}
					else if(getAuth('role') == 'dosen'){
						$cl = 'primary';
					}
					else{
						$cl = 'warning';
					}
				@endphp
				<small class="badge badge-{{ $cl }}"><i class="fas fa-user-circle"></i> {{ ucwords(getAuth('role')) }}</small>
			</div>
		</div>
		@include('layouts.v_sidebar_menu')
	</div>
</aside>