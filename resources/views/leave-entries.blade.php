@extends('admin-layout')
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
                            <li class="breadcrumb-item"><a href="/admin-dashboard">Home</a></li>
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