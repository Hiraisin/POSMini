<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/adminlte/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <span class="brand-text font-weight-dark">{{config('app.name')}}</span>
                </a>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <!-- Default box -->
                <div class="card card-solid mt-3">
                    <div class="card-header">
                        Product
                    </div>
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-3 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0 text-center">
                                        <div class="col-12">
                                            <img src="{{asset('assets/img/paket-desktop.png')}}" alt="user-avatar" class="img-circle img-fluid">
                                        </div>
                                        Majoo Pro
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="lead text-center"><b>Rp 2.750.000</b></h2>
                                                <p class="text-muted text-sm">
                                                    Lorem ipsum is simply dummy text of the printing and typesetting industry
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <a href="#" class="btn btn-sm bg-teal">
                                                Beli
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div> -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <!-- Default to the left -->
            <strong>2019 &copy; PT {{config('app.name')}}
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/adminlte/dist/js/demo.js')}}"></script>
</body>

</html>