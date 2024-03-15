@extends('admin-layout')
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
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin-dashboard"
                        aria-expanded="false"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/users-list" aria-expanded="false">
                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span class="hide-menu">Users List</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/leave-entries" aria-expanded="false"><i class="me-3 fa fa-table"
                            aria-hidden="true"></i><span class="hide-menu">Leave Entries</span></a></li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/" aria-expanded="false"><i class="me-3 fa fa-font"
                            aria-hidden="true"></i><span class="hide-menu">Icon</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/" aria-expanded="false"><i class="me-3 fa fa-globe"
                            aria-hidden="true"></i><span class="hide-menu">Google Map</span></a></li> -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/attendance"
                        aria-expanded="false"><i class="me-3 fa fa-columns" aria-hidden="true"></i><span
                            class="hide-menu">Attendance</span></a></li>
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
                            <li class="breadcrumb-item active" aria-current="page">Users-List</li>
                        </ol>
                    </nav>
                </div>
   
            </div>
            
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
  
    <div style="height:380px; text-align:center; padding-top:20px;">
        @if(session('success'))
            <div style="color:red; text-align:center; margin-top:10px; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif
        <h1 style="margin-bottom:30px; color:goldenrod;">Registered Users</h1>
                <div class="container" style="width:1000px; overflow-y:scroll;height: 300px;">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" style="color:white;">Name</th>
                                <th scope="col" style="color:white;">email</th>
                                <th scope="col" style="color:white;">Remove User</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light" style="color:red; border:1px solid red;">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            

        
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
@endsection