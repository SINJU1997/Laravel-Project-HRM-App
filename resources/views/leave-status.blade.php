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
                            <li class="breadcrumb-item active" aria-current="page">Leave Status</li>
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
  
    <div style="height:380px; text-align:center; padding-top:20px;">
        <h1 style="margin-bottom:30px;">Leave Status</h1>
        
            @if(count($leaves) > 0)
                <div class="container" style="width:1000px; overflow-y:scroll;height: 300px;">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" style="color:white;">Reason</th>
                                <th scope="col" style="color:white;">Date</th>
                                <th scope="col" style="color:white;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{ $leave['reason'] }}</td>
                                <td>{{ $leave['from_date'] }} <span style="color:red;">to</span> {{ $leave['to_date'] }}</td>
                                <td style="color: 
                                    @if($leave->status == 'Pending') blue;
                                    @elseif($leave->status == 'Approved') green;
                                    @elseif($leave->status == 'Rejected') red;
                                    @endif">
                                        {{ $leave->status }}
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