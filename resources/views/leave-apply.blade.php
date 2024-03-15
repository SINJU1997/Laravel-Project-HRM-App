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
                        href="/profile" aria-expanded="false">
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
    <div style="height:750px; text-align:center;">
        <h1>Leave Application</h1>
        <div class="container mt-5" style="width:600px;">
        
            <form action="/leave" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label" style="font-weight:bold;">User Id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" value="{{ $userId }}" name="userId" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold;">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $userName }}" name="name" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label" style="font-weight:bold;">Reason</label>
                    <textarea name="reason" id="exampleFormControlInput2" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <h3 style="color:red; margin:30px 0px;">Leave Days</h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label" style="font-weight:bold;">From Date</label>
                    <input type="date" class="form-control" onchange="setToDateMin()" id="exampleFormControlInput3" name="from_date">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label" style="font-weight:bold;">To Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput4" name="to_date">
                </div>
                <div>
                    <button class="btn btn-primary">Apply</button>
                </div>
            </form>    
        </div>
    </div>
</div>
<script>
    // Get current date
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    
    if(dd<10) {
        dd = '0'+dd
    } 
    
    if(mm<10) {
        mm = '0'+mm
    } 
    
    today = yyyy + '-' + mm + '-' + dd;
    
    // Set min attribute of date input to today's date
    document.getElementById("exampleFormControlInput3").setAttribute("min", today);
    document.getElementById("exampleFormControlInput4").setAttribute("min", today);

    function setToDateMin() {
        var fromDateInput = document.getElementById('exampleFormControlInput3');
        var toDateInput = document.getElementById('exampleFormControlInput4');
        toDateInput.min = fromDateInput.value; // Set minimum date for 'to_date' input
        
        // Disable Sundays in 'to_date' input
        toDateInput.addEventListener('input', function() {
            var selectedDate = new Date(this.value);
            if (selectedDate.getDay() === 0) { // Check if selected date is Sunday
                alert("Sunday is also holiday");
                this.value = ""; // Reset the value
            }
        });
    }
</script>

<style>
    label{
        color:green;
    }
</style>

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
@endsection