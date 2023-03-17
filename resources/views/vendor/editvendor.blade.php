@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-2">Edit Vendor</h1>
                    <form action="{{ url('/vendor/edit/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <label>First-name</label>
                            <input type="text" value="{{ $user->first_name }}" name="first_name" class="form-control" placeholder="First_name">
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Last-name</label>
                            <input type="text" value="{{ $user->last_name }}" name="last_name" class="form-control" placeholder="Last-name">
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" value="{{ $user->fullname }}" name="fullname" class="form-control" placeholder="Fullname">
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Email-address</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="name@example.com" disabled>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" value="1" {{ ($user->status == 1 ? ' checked' : '')}}>
                            <label class="custom-control-label" for="customSwitch1">Status</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" id="image" name="image" class="form-control">
                            <label class="input-group-text">Upload</label>
                        </div>
                        <button type="submit"  class="ladda-button btn btn-primary" data-style="expand-right">update</button>
                        <a href="{{ route('list') }}" class="btn btn-danger">cancle</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
