<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Flot library -->
<script src="{{ asset('js/flot.js') }}"></script>

<!-- Include Flot library -->
<script src="path/to/flot.js"></script>
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
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
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
        <h1 style="margin-bottom:30px; color:goldenrod;">Attendance Report</h1>
        <!-- attendance record -->
        <form action="/attendance-sheet" method="get">
            @csrf
            <label for="selectedDate">Select Date:</label>
            <input type="date" id="selectedDate" max="{{ date('Y-m-d') }}">
        </form>
        <div id="attendanceTable">
            @foreach($attendance as $punch)
            <p>{{ $punch->name }} - {{ $punch->punch_in }} - {{ $punch->punch_out }}</p>
            @endforeach

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<script>
    $(document).ready(function() {
        $('#selectedDate').on('change', function() {
            var selectedDate = $(this).val();
            $.ajax({
                url: '/attendance-sheet',
                type: 'GET',
                data: {
                    date: selectedDate
                },
                success: function(response) {
                    $('#attendanceTable').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection