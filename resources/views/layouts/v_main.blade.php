<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{!! asset('template') !!}/dist/img/AdminLTELogo.png" type="image/x-icon"/>
  <title>{{  isPengaturan('nama_aplikasi') }}</title>

  @include('layouts.v_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    {{-- <img class="animation__shake" src="{!! asset('template') !!}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
    <center>
      <h1>
        <i class="fas fa-spinner fa-pulse"></i>
        <br>
        Mohon Tunggu..
      </h1>
    </center>
  </div>

  
  
  @include('layouts.v_navbar')
  @include('layouts.v_aside')


  {{-- has = untuk cek apakah ada session atau tidak --}}
  {{-- get = untuk mendapatkan value session --}}
  <div class="content-wrapper">
    @if(Session::has('status'))
      <div id="flash_alert" class="alert alert-{{ Session::get('status') }} mt-3 flat" role="alert" style="border-radius: 0px">
        {{ Session::get('message') }}
      </div>
      <script>
        $(function (){
          $('#flash_alert').delay(5000).hide(500);
        });
      </script>
    @endif

    @yield('content')
  </div>
  
  @include('layouts.v_footer')
  @include('modal.v_modal')
</div>

@include('layouts.v_js')
</body>
</html>
