@extends('layout')
@section('content')

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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
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