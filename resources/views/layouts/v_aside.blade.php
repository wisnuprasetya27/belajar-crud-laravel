<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="/dashboard" class="brand-link">
		<img src="{!! asset('template') !!}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ isPengaturan('nama_aplikasi') }} </span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		@include('layouts.v_sidebar_menu')
	</div>
</aside>