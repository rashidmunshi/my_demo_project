@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-2">Register</h1>
                    <form action="{{ route('vender.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select  placaholder="role" name="role">
                                <option value="" selected>Role</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label>First-name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First_name">
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Last-name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last-name">
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Fullname">
                            <span class="text-danger">{{ $errors->first('fullname') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>Email-address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com">
                        </div>
                        <div class="form-floating mb-3">
                            <label>password</label>
                            <input type="password" name="password" class="form-control" placeholder="password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" value="1">
                            <label class="custom-control-label" for="customSwitch1">Status</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" id="image" name="image" class="form-control">
                            <label class="input-group-text">Upload</label>
                        </div>
                        <button type="submit"  class="ladda-button btn btn-primary" data-style="expand-right">Register</button>
                        <a href="{{ route('list') }}" class="btn btn-danger">cancle</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
