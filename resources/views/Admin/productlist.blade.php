@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Products</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive ">
        <div class="card">
            <div class="card-body">
                @if(Session::has('message'))
                <p id="message" class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
                @endif
                @if(Session::has('delete_message'))
                <p id="delete_message" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('delete_message') }}</p>
                @endif
                <div class="flash-message"></div>
                <a href="{{ route('product.addproduct') }}" class="btn btn-primary d-inline float-right mb-2">Add</a>
                <table id="" class="table table-bordered basic-datatable">
                    <thead>
                        <tr>
                            <th>Ids</th>
                            <th>Products</th>
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
