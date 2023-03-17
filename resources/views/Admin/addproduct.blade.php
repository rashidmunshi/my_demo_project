@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="{{ url('/insert_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6" id="data2">
                                <div class="mb-3">
                                    <label for="">Product Type</label>
                                    <select placaholder="role" name="product_type" id="drop" class="form-control">
                                        <option value="select_type" selected>Select Type</option>
                                        <option value="normal_product">Normal Product</option>
                                        <option value="single_varient">Single Variant</option>
                                        <option value="multi_varient">Multi Variant</option>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <label>product_name</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Enter product name">
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="multiple_image[]" multiple>
                                    <label class="input-group-text">Upload</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Quantity</label>
                                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" min="0">
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                </div>
                                <div id="single_varient" style="display: none">
                                    <div class="mb-3">
                                        <label for="">Type</label>
                                        <select name="type" class="form-control" id="type">
                                            <option value="select_type" selected>select Type</option>
                                            <option value="size">Size</option>
                                            <option value="color">Color</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="multi_varient" style="display: none" >
                                    <div class="my-3">
                                        <label for="">Select Size</label>
                                        <select name="size_select" class="form-control">
                                            <option value="Select Size" selected>Select Size</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" >
                                <div class="mb-3">
                                    <label>Category's</label>
                                    <select name="category_type" class="form-control">
                                        <option value="select_type" selected>Category Type</option>
                                        <option value="baby_care">Baby care</option>
                                        <option value="mens_cloth">mens cloth</option>
                                        <option value="women_cloth">women cloth</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image">
                                    <label class="input-group-text text-light bg-secondary">Upload</label>
                                </div>
                                <div class="form-floating">
                                    <label>Details</label>
                                    <textarea class="form-control" name="detail" placeholder="Details"></textarea>
                                </div>
                                <div class="form-floating mb-3" id="price">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="price" min="0">
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                </div>
                                <div id="multi_varient1" style="display: none">
                                    <div id="color" class="nn">
                                        <label class="" for="">Select Color</label>
                                        <div class="mb-3 d-flex">
                                            <select name="select_color" class="form-control">
                                                <option value="select_color" selected>select color</option>
                                                <option value="red">Red</option>
                                                <option value="blue">Blue</option>
                                            </select>
                                            <button type="button" id="add" class="ml-4 btn btn-success"><i class="fas fa-plus me-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-secondary me-4">submit</button>
                                    <a href="" class="btn btn-danger">Cancle</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
