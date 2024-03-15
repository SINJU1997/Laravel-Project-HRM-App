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
          <div style="color:red; text-align:center; margin-top:10px;">
            {{ session('success') }}
          </div>
        @endif
        <h1 style="margin-bottom:30px; color:goldenrod;">Leave Requests</h1>
            @if(count($leaves) > 0)
                <div class="container" style="width:1000px; overflow-y:scroll;height: 300px;">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" style="color:white;">Id</th>
                                <th scope="col" style="color:white;">Name</th>
                                <th scope="col" style="color:white;">Reason</th>
                                <th scope="col" style="color:white;">Days</th>
                                <th scope="col" style="color:white;">Approve/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $leave['userId'] }}</td>
                                <td>{{ $leave['name'] }}</td>
                                <td>{{ $leave['reason'] }}</td>
                                <td>{{ $leave['from_date'] }} <span style="color:red;">to</span> {{ $leave['to_date'] }}</td>
                                <td>
                                @if($leave['status'] == 'Pending')
                                    <form action="{{ route('updateLeaveStatus', ['id' => $leave['id']]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" name="status" value="Approved" class="btn btn-light approve" style="color:green; border:1px solid green;">Approve</button>
                                        <button type="submit" name="status" value="Rejected" class="btn btn-light reject" style="color:red; border:1px solid red;">Reject</button>
                                    </form>
                                @else
                                    <p style="color: 
                                    @if($leave->status == 'Approved') green;
                                    @elseif($leave->status == 'Rejected') red;
                                    @endif">{{ $leave['status'] }}</p>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color:red; margin-top:100px;">No records found.</p>
            @endif

        
    </div>
</div>

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
@endsection