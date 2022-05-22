<?php
$url = url()->current();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/img/paket-desktop.png')}}" alt="{{config('app.name')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block" data-toggle="tooltip" data-placement="top" title="{{Auth::user()->name}}">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('/home')}}" class="nav-link {{$url == url('/home') || $url == url('/') ? 'active':''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/kategori')}}" class="nav-link {{$url == url('/kategori')? 'active':''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Master Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/product')}}" class="nav-link {{$url == url('/product')? 'active':''}}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Master Product
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>