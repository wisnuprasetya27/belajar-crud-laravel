<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{!! asset('template') !!}/dist/img/AdminLTELogo.png" type="image/x-icon"/>
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('template') !!}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{!! asset('template') !!}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('template') !!}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="assets/template/index2.html"><b>Login</b> User</a>
  </div>

	@if(Session::has('alert-status'))
		<div id="flash_alert" class="alert alert-{{ Session::get('alert-status') }} background-{{ Session::get('alert-status') }} alert-dismissible" style="border-radius: 0px;">
			{{ Session::get('alert-message') }}
		</div>
		<script>
			$(function (){
				$('#flash_alert').delay(5000).hide(500);
			});
		</script>
	@endif

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login/" method="post">
				{{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{!! asset('template') !!}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{!! asset('template') !!}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{!! asset('template') !!}/dist/js/adminlte.min.js"></script>
</body>
</html>