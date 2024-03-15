@extends('layout')
@section('content')
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard"
                        aria-expanded="false"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/profile" aria-expanded="false" active>
                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/status" aria-expanded="false"><i class="me-3 fa fa-table"
                            aria-hidden="true"></i><span class="hide-menu">Leave Status</span></a></li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/" aria-expanded="false"><i class="me-3 fa fa-font"
                            aria-hidden="true"></i><span class="hide-menu">Icon</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/" aria-expanded="false"><i class="me-3 fa fa-globe"
                            aria-hidden="true"></i><span class="hide-menu">Google Map</span></a></li> -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/apply-leave"
                        aria-expanded="false"><i class="me-3 fa fa-columns" aria-hidden="true"></i><span
                            class="hide-menu">Apply for Leave</span></a></li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/"
                        aria-expanded="false"><i class="me-3 fa fa-info-circle" aria-hidden="true"></i><span
                            class="hide-menu">Error 404</span></a></li> -->
                <li class="text-center p-20 upgrade-btn">
                    <!-- <a href="/logout" class="btn btn-danger text-white mt-4"
                        target="_blank">Logout</a> -->
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger text-white mt-4">Logout</button>
                    </form>
                </li>
                
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center d-flex justify-content-between" style="width:1020px;">
                <!-- <h3 class="page-title mb-0 p-0">Dashboard</h3> -->
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
                <h3 class="page-title mb-0 p-0">{{ $userName }}</h3>
            </div>
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div style="height:380px; text-align:center;">
        <h1>Profile Details</h1>
        <div class="container mt-5" style="width:600px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold;">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $userName }}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label" style="font-weight:bold;">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" value="{{ $userEmail }}" readonly>
            </div>
            <div>
                <a href="/edit" class="btn btn-primary">Edit</a>
            </div>
            
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
@endsection