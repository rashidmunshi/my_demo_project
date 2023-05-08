@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-2">Register</h1>
                    <form action="{{ route('vender.register') }}" method="POST" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        <div class="mb-3">
                            <label>Role</label>
                            <select placaholder="role" name="role" class="form-control" data-parsley-required-message="Please define role" required>
                                <option value="" selected>Role</option>
                                <option value="1" {{ "1" === old('role') ? 'selected' : '' }}>1</option>
                                <option value="2" {{ "2" === old('role') ? 'selected' : '' }}>2</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label>First-name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First_name" parsley-trigger="change" value="{{ old('first_name') }}" required="" data-parsley-required-message="Please insert your first name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Last-name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last-name" data-parsley-trigger="change" value="{{ old('last_name') }}" required="" data-parsley-required-message="Please insert your last name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Fullname" parsley-trigger="change" value="{{ old('fullname') }}" required="" data-parsley-required-message="Please insert your full name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Email-address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" value="{{ old('email') }}" data-parsley-type="email" data-parsley-type-message="must be a valid email address" required="">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <label>password</label>
                            <input type="password" id="pass1" name="password" class="form-control" placeholder="password" required data-parsley-minlength="8" data-parsley-required-message="Please enter your password">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Confirm Password</label>
                            <input type="password" data-parsley-equalto="#pass1" name="confirmpassword" class="form-control" placeholder="confirm_password" data-parsley-required-message="Confirm password required" required>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1" value="1" {{"1" == old('status') ? 'checked': '' }}  data-parsley-errors-container="#status_error" data-parsley-required-message="Please select status" required>
                            <label class="custom-control-label" for="customSwitch1">Status</label>
                        </div>
                        <span id="status_error"></span>
                        <div class="mt-3">
                            <div class="input-group">
                                <input type="file" id="image" name="image" class="form-control" required="" data-parsley-max-file-size="42" value="{{ old('image') }}" data-parsley-errors-container="#errorBlock" data-parsley-required-message="Please choose image">
                                <label class="input-group-text">Upload</label>
                            </div>
                            <span id="errorBlock"></span>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="ladda-button btn btn-success" data-style="expand-right">Register</button>
                            <a href="{{ route('list') }}" class="btn btn-danger">cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
