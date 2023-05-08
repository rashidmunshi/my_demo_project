@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="my-3">Add Product</h1>
                    <form action="{{ route('add.products') }}" method="POST" enctype="multipart/form-data" data-parsley-validate="" id="abc">
                        @csrf
                        <div>
                            <div class="form-floating mb-3">
                                <label>Product name</label>
                                <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control" placeholder="Enter product name" required="" data-parsley-required-message="Please enter product name">
                            </div>
                            <div class="row align-items-center" id="category">
                                <div class="col-12">
                                    <div id="categorys" class="mb-3">
                                        <label>Category variant</label>
                                        <div class="form-floating d-flex">
                                            <input type="text" value="{{ old('category_variant[]') }}" name="category_variant[]" class="form-control" placeholder="Enter category variant" required="" data-parsley-required-message="Please enter category variant" data-parsley-errors-container="#errorBlock">
                                            <button class="btn btn-success ml-3" id="addproduct" type="button"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <span id="errorBlock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="variant" class="mb-3 col-10">
                                    <label>Variant</label>
                                    <div class="form-floating d-flex">
                                        <input type="text" value="{{ old('variant[]') }}" name="variant[][]" class="form-control" id="variant_0_0" placeholder="Enter variant" required="" data-parsley-required-message="Please enter variant" data-parsley-errors-container="#varianterror">
                                    </div>
                                    <span id="varianterror"></span>
                                </div>
                                <div class="col-2 mb-3">
                                    <div class="d-flex align-items-center" class="mb-3">
                                        <div id="quantity">
                                            <label>Quantity</label>
                                            <div class="form-floating d-flex">
                                                <input type="number" value="{{ old('quantity[]') }}" name="quantity[][]" class="form-control" id="" placeholder="Enter quantity" required="" data-parsley-required-message="Please enter quantity" data-parsley-errors-container="#quantity_error" min="1">
                                            </div>
                                        </div>
                                        <div class="ml-2 mt-3">
                                            <button class="btn btn-success add pb-2" count-id="0" data-id='adding_variant_0' type="button"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <span id="quantity_error"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="adding_variant_0"></div>
                            <hr class="border-top font-weight-bold my-3">
                        </div>
                        <div id="adding_variantx"></div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ url('/product/products') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
