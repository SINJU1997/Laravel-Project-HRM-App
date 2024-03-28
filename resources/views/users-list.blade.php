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