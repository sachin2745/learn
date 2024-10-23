<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->

    <style>
        html,
        body {
            height: 100% !important;
        }
    </style>

</head>

<body class="bg-light">


    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }} <!-- Update 'success' to 'message' -->
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }} <!-- Update 'success' to 'error' -->
    </div>
    @endif



    <div class="wrapper d-flex w-100 align-items-center justify-content-center">
        <div class="col-sm-4">
            <div class="card card-info">
                <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-2">
                            <label for="email" class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" required name="userEmail" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="password" class="col-sm-12 col-form-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" required name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info">Sign in</button>
                        <!-- <button type='button' class="btn btn-default float-right">Cancel</button> -->
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>