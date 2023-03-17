@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@section('content')

@if(Session::has('message'))
<p id="message" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
@endif

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Datatables</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<a href="{{ route('register') }}" class="btn btn-primary">Add</a>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Basic Data Table</h4>
                <table id="basic-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>fullName</th>
                            <th>email</th>
                            <th>status</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key=>$users)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $users->fullname }}</td>
                            <td>{{ $users->email }}</td>
                            <td>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" data-id="{{ $users->id }}" name="status" class="custom-control-input status" id="customSwitch{{ $key }}" value="1" {{  ($users->status == 1 ? ' checked' : '')}}>
                                    <label class="custom-control-label" for="customSwitch{{ $key }}"></label>
                                </div>
                            </td>
                            <td><img src="{{ asset('vendor/image/' .$users->image) }}" alt="" width="70px"></td>
                            <td>
                                <a href="{{ url('/vendor/edit/'. $users->id)}}" class="ladda-button btn btn-success" data-style="expand-right">update</a>
                                <button class="ladda-button btn btn-danger btn_click" data-id="{{$users->id}}" class="btn btn-danger sa-warning"  data-style="slide-left">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
{{-- @section('script') --}}


{{-- <script>
$(".btn_click").click(function() {
    var id = $(this).attr('data-id');
    Swal.fire({
        title: "Delete?"
        , text: "Please ensure and then confirm!"
        , type: "warning"
        , showCancelButton: !0
        , confirmButtonText: "Yes, delete it!"
        , cancelButtonText: "No, cancel!"
        , reverseButtons: !0
    }).then((result) => {
        if (result['isConfirmed']) {
            $.ajax({
                url: "{{url('delete/user')}}/" + id
                , type: 'POST'
                , DataType: 'json'
                , data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                }
                , success: function(response) {
                    swal.fire("Done!", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
                , error: function(error) {
                    swal.fire("Error!", error.message, "error");
                }
            });
        }
    })
});
</script> --}}
{{-- @endsection --}}


