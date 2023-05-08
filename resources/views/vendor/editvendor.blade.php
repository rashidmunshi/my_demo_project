@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                {{-- @if(Session::has('message'))
                <p id="message" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                @endif --}}
                <div class="card-body">
                    <h1 class="text-center mb-2">Edit Vendor</h1>
                    <form action="{{ url('/vendor/update/'.$user->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        <div class="form-floating mb-3">
                            <label>First-name</label>
                            <input type="text" value="{{old('first_name', $user->first_name)}}" name="first_name" class="form-control" placeholder="First_name" required data-parsley-required-message="Please insert your first name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Last-name</label>
                            <input type="text" value="{{ old('last_name', $user->last_name) }}" name="last_name" class="form-control" placeholder="Last-name" required data-parsley-required-message="Please insert your last name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" value="{{ old('fullname', $user->fullname) }}" name="fullname" class="form-control" placeholder="Fullname" required data-parsley-required-message="Please insert your full name">
                        </div>
                        <div class="form-floating mb-3">
                            <label>Email-address</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="name@example.com" data-parsley-type="email" data-parsley-type-message="must be a valid email address" @if ($user->email==old('email'))
                            return true;
                            @endif>
                            <span class="alert-class alert-danger" id="message">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="input-group">
                            <input type="file" id="image" value="{{ $user->image }}" name="image" class="form-control">
                            <label class="input-group-text">Upload</label>
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('vendor/image/'.$user->image) }}" id="image_view" width="100px" alt="">
                        </div>
                        <button type="submit" class="ladda-button btn btn-success" data-style="expand-right">update</button>
                        <a href="{{ route('list') }}" class="btn btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
