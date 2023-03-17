@extends('layouts.master')


@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body p-4">
                    @if(Session::has('message'))
                    <p id="message" class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
                    @endif
                    <h4 class="fs-4">Change Password</h4>
                    <form action="{{ route('admin.passwordupdate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                        </div>

                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="New Password">
                            <span class="text-danger fw-bold">{{ $errors->first('password') }}</span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Confrim New Password">
                        </div>

                        <div class="d-md-block">
                            <input type="submit" class="btn btn-success" value="Submit">
                            <a class="btn btn-danger" href="{{route('dashboard')}}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
