<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title ?? 'Opsgreat' }}</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset("qh/dashboard/template/admin/plugins/fontawesome-free/css/all.min.css")}}">
<!-- icheck bootstrap -->
<link rel="stylesheet"
      href="{{asset("qh/dashboard/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset("qh/dashboard/template/admin/dist/css/adminlte.min.css")}}">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@vite("resources/css/app.css")
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head')
