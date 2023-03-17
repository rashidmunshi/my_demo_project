@extends('layouts.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/update_user/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label>First-name</label>
                            <input type="text" value="{{ $data->first_name }}" name="first_name" class="form-control" placeholder="First_name">
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Last-name</label>
                            <input type="text" value="{{ $data->last_name }}" name="last_name" class="form-control" placeholder="Last-name">
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" value="{{ $data->fullname }}" name="fullname" class="form-control" placeholder="Fullname">
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Email-address</label>
                            <input type="email" value="{{ $data->email }}" name="email" class="form-control" placeholder="name@example.com" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <img src="{{ asset('upload/image/'.$data->image) }}" id="image_view" width="70px" alt="">
                            <input type="file" id="image" value="{{ $data->image }}" name="image" class="form-control">
                            <label class="input-group-text">Upload</label>
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-danger">cancle</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
