@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="my-4">Product Images ({{ $product->product_name }})</h1>
                    <form action="{{ url('/product/upload_image/'.$product->id) }}" method="POST" data-parsley-validate="" enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-center">
                            <div>
                                <label for="">Choose Images</label>
                                <div class="input-group mb-1">
                                    <input type="file" class="form-control" id="images" name="product_images[]" required="" data-parsley-required-message="Please choose at least one image" data-parsley-errors-container="#errorBlock" accept="image/*" multiple>
                                    <img src="#" alt="" id="previewImage">
                                    <label class="input-group-text">Upload</label>
                                </div>
                            </div>
                            <div class="mt-3 ml-3">
                                <button class="btn-success btn">Upload</button>
                            </div>
                        </div>
                        <div class="text-danger fw-bold">{{ $errors->first('product_images.*') }}</div>
                        <span id="errorBlock"></span>
                    </form>
                    <div class="container" id="product_images">
                        <div class="row" id="image_container">
                        </div>
                    </div>
                    <div class="container" id="already_images">
                        <div class="row">
                            @foreach ($product->product_images as $images)
                            <div id="" class="col-md-3 my-2">
                                <img src="{{ asset('product/images/'.$images->image_link) }}" class='card m-2 border border-dark p-2 image_preview' data-id="{{ $images->id}}">
                                <button class="btn  mx-auto d-block  remove_image" data-id="{{ $images->id }}"><i class="far fa-times-circle fa-lg text-danger"></i></button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
