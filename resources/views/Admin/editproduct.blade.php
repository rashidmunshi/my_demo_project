@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-3">Edit Product</h1>
                    <form action="{{ url('/product/update/'.$product->id) }}" method="POST" data-parsley-validate="">
                        @csrf
                        <div class="form-floating mb-3">
                            <label>Product name</label>
                            <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control" placeholder="Enter product name" required="" data-parsley-required-message="Please enter product name">
                        </div>
                        @foreach ($product->category_variants as $key =>$value)
                        <div class="row">
                            <div id="category_id_{{ $key }}" class="mb-3 col-12">
                                <label>Category variant</label>
                                <div class="form-floating d-flex">
                                    <input type="text" value="{{ $value->category_name}}" name="category_variant[]" class="form-control" placeholder="Enter Category variant" required="" data-parsley-required-message="Please enter category variant" data-id="{{ $value->id }}" id="category_{{ $key }}" data-parsley-errors-container="#errorBlock{{ $key }}">
                                    @if ($key == 0)
                                    <button class="btn btn-success ml-3" id="addcategory" count-id='' type="button"><i class="fas fa-plus"></i></button>
                                    @else
                                    <button class="btn btn-danger ml-3 remove_category" type="button"><i class="fas fa-minus"></i></button>
                                    @endif
                                </div>
                                <span id="errorBlock{{ $key }}"></span>
                            </div>
                        </div>
                        <div class="category " >
                            @foreach ($value->variants as $keys => $variants)
                            <div class="row variant">
                                <div id="{{ $key }}" class="mb-3 col-10">
                                    <label>Variant</label>
                                    <div class="form-floating d-flex">
                                        <input type="text" value="{{ old('variant',$variants->variant_name) }}" name="variant[{{ $key }}][]" class="form-control" id="variant_{{ $key }}_{{ $keys }}" placeholder="Enter variant" required="" data-parsley-required-message="Please enter variant" data-parsley-errors-container="#variant_error{{$key. $keys}}">
                                    </div>
                                    <input type="hidden" name="cat_variant_id" value="{{ $variants->category_variant_id  }}">
                                    <span id="variant_error{{$key. $keys}}"></span>
                                </div>
                                <div class="col-2 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div id="quantity">
                                            <label>Quantity</label>
                                            <div class="form-floating d-flex">
                                                <input type="number" value="{{ old('quantity',$variants->quantity  ) }}" name="quantity[{{ $key }}][]" class="form-control" id="" placeholder="Enter quantity" required="" data-parsley-required-message="Please enter quantity" data-parsley-errors-container="#quantity_error{{ $key.$keys }}" min="1">
                                            </div>
                                        </div>
                                        @if ($keys == 0)
                                        <div class="ml-2 mt-3">
                                            <button class="btn btn-success add" count-id="{{ $key }}" data-id='adding_variant_{{ $key }}' type="button"><i class="fas fa-plus"></i></button>
                                        </div>
                                        @else
                                        <div class="ml-2 mt-3">
                                            <button class="btn btn-danger remove" data-id='{{ $key }}' type="button"><i class="fas fa-minus"></i></button>
                                        </div>
                                        @endif
                                    </div>
                                    <span id="quantity_error{{ $key.$keys }}"></span>
                                </div>
                            </div>
                            @endforeach
                            <div>
                                <div id="adding_variant_{{ $key }}"></div>
                                <hr class="border-top font-weight-bold my-3">
                            </div>
                        </div>
                        @endforeach
                        <div id="last-id" data-last-id="{{ $key }}"></div>
                        <div id="adding_categorys" class="category"></div>
                        <div class="float-right mt-3">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="{{ route('product.productlist') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
