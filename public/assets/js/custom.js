$(document).ready(function () {
    $(document).on('click', '.delete_product', function () {
        var id = $(this).attr('data-id');
        Swal.fire({
            title: "Delete?"
            , text: "Are you sure you want to delete this product?"
            , type: "warning"
            , showCancelButton: !0
            , confirmButtonText: "Yes, delete it!"
            , cancelButtonText: "No, cancel!"
            , reverseButtons: !0
        }).then((e) => {
            if (e.value == true) {
                $.ajax({
                    type: 'POST',
                    url: '/product/delete/' + id,
                    DataType: 'json',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    }, success: function (response) {
                        if (response.success) {
                            swal.fire("Done!", response.message, "success");
                        }
                        $('.basic-datatable').DataTable().ajax.reload(null, false);
                    },
                    error: function (error) {
                        swal.fire("Error!", error.message, "error");
                    }
                });
            }
        });
    });
});

//-----Add product this js-----//

$(document).ready(function () {
    var count = 0;
    $(document).on('click', '#addproduct', function () {
        count++;
        $('#adding_variantx').append('<div><div id = "adding_variant_' + count + '" class= "categorys"><div class="row align-items-center"><div class="col-12"><div class="mb-3"><label>Category variant</label><div class="form-floating d-flex"><input type="text" value="" name="category_variant[]" class="form-control" placeholder="Enter category variant" id="category_' + count + '" required="" data-parsley-required-message="Please enter category variant" data-parsley-errors-container="#category_error' + count + '"><button class="btn btn-danger ml-3 remove_categorys" id="' + count + '" type="button"><i class="fas fa-minus"></i></button></div><span id="category_error' + count + '"></span></div></div></div><div class="row"><div id="' + count + '" class="mb-3 col-10"><label>Variant</label><div class="form-floating d-flex " id="variant_' + count + '_0"><input type="text" name="variant[' + count + '][]" class="form-control variant" placeholder="Enter variant" required="" data-parsley-required-message="Please enter variant" data-parsley-errors-container="#varianterror' + count + '"></div><span id="varianterror' + count + '"></span></div><div class="col-2"><div class="d-flex align-items-center"><div id="quantity"><label>Quantity</label><div class="form-floating d-flex"><input type="number" value="" name="quantity[' + count + '][]" class="form-control" id="quantity_" placeholder="Enter quantity" min="1" required="" data-parsley-required-message="Please enter quantity" data-parsley-errors-container="#qty_errors' + count_variant + '"></div></div><div class="ml-2 mt-3"><button class="btn btn-success  add" count-id="' + count + '" data-id="adding_variant_' + count + '" type="button"><i class="fas fa-plus"></i></button></div></div><span id="qty_errors' + count_variant + '"></span></div></div></div><hr class="border-top font-weight-bold my-3 hr"></div>');
    })

    $(document).on('click', '.remove_categorys', function () {
        $(this).closest('.categorys').remove();
        $('.hr').remove();

    })

    var count_variant = 0;
    $(document).on('click', '.add', function () {
        var btnid = $(this).data('id');
        var count_id = $(this).attr('count-id');
        count_variant++;

        $('#' + btnid).append('<div class="variant row"><div id="' + count_variant + '" class="mb-3 col-10"><label>Variant</label><div class="form-floating  d-flex" id="variant_' + count_id + '_' + count_variant + '"><input type="text" value="" name="variant[' + count_id + '][]" class="form-control" placeholder="Enter varinat" required="" data-parsley-required-message="Please enter variant" data-parsley-errors-container="#variant_error' + count_variant + '"></div> <span id="variant_error' + count_variant + '"></span> </div><div class="col-2 mb-3"><div class="d-flex align-items-center"><div id="quantity" class=""><label>Quantity</label><div class="  form-floating d-flex"><input type="number" name="quantity[' + count_id + '][]" class="form-control" id="quantity_" placeholder="Enter quantity" required="" data-parsley-required-message="Please enter quantity" data-parsley-errors-container="#qty_error' + count_variant + '" min="1"></div></div><div class="ml-2 mt-3"><button class="btn btn-danger remove" data-id="' + count_variant + '" type="button"><i class="fas fa-minus"></i></button></div> </div><span id="qty_error' + count_variant + '"></span></div></div>');
    })

    $(document).on('click', '.remove', function () {
        var buttonid = $(this).data('id');
        $(this).closest('.variant').remove();
    })
})

//-----edit product this js-----//

$(document).ready(function () {
    var last_id = $('#last-id').data('last-id');

    var count = last_id;
    $(document).on('click', '#addcategory', function () {
        count++;
        $('#adding_categorys').append('<div id="adding_variant_' + count + '"><div id="categroy_id_' + count + '" class="mt-3 "><label class="">Category variant</label><div class="form-floating  d-flex"><input type="text" value="" name="category_variant[]" class="form-control" id="category_' + count + '" placeholder="Category Variant" required="" data-parsley-required-message="Please enter category variant" data-parsley-errors-container="#categroy_id_' + count + '"><button class="btn btn-danger ml-3 remove_category" id="categroy_id_' + count + '" type="button"><i class="fas fa-minus"></i></button></div></div><div id="categroy_id_' + count + '"></div><div class="row mt-3"><div class="col-10"><div id="variant" class="mb-3"><label>Variant</label><div class="form-floating d-flex"><input type="text" name="variant[' + count + '][]" class="form-control" id="variant_' + count + '_0" placeholder="Enter variant" required="" data-parsley-required-message="Please enter variant" data-parsley-errors-container="#varianterrors' + count + '"></div><span id="varianterrors' + count + '"></span></div></div><div class="col-2"><div class="d-flex align-items-center"><div id="quantity"><label>Quantity</label><div class="form-floating d-flex"><input type="number" value="{{ old("quantity") }}" name="quantity[][]" class="form-control" id="" placeholder="Enter quantity" required="" data-parsley-required-message="Please enter quantity" data-parsley-errors-container="#quantity_errors'+count+'" min="1"></div></div><div class="ml-2 mt-3"><button class="btn btn-success  add" count-id="  ' + count + '" data-id="adding_variant_' + count + '" type="button"><i class="fas fa-plus"></i></button></div></div><span id="quantity_errors' + count + '"></span></div></div></div><hr class="border-top font-weight-bold my-3 hr">');
    })
    $(document).on('click', '.remove_category', function () {
        $(this).closest('.category').remove();
    });
});

$(document).ready(function () {
    $(document).on('change', '#images', function () {
        var input = $(this)[0];
        $('#image_container').empty();
        if (input.files && input.files[0]) {
            for (var i = 0; i < input.files.length; i++) {
                var file = input.files[i];
                // console.log(file);x
                if (file.type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_container').append('<div class="col-md-3 mb-3"><img src="' + e.target.result + '" class=" card m-2 border border-dark p-2 image_preview"></div>');
                    };
                    reader.readAsDataURL(input.files[i]);
                } else {
                    $('#image_container').append('<div class="col-md-3 mb-3"><img src="/image/no-image.png" alt="No Image" class="card m-2 border border-dark p-2 image_preview"></div>');
                }
            }
        }
    })
})

//-----datatable js-----//
$(function () {

    var table = $('.basic-datatable').DataTable({
        processing: true
        , serverSide: true
        , ajax: "/product/productdata"
        , columns: [{
            data: 'id'
            , name: 'id'
        }
            , {
            data: 'product_name'
            , name: 'product_name'
        }
            , {
            data: 'category_variants.category_name'
            , name: 'category_variants.category_name'
        },
        {
            data: 'action'
            , name: 'action'
            , orderable: false
            , searchable: false
        }
            ,],
        "order": [[0, "desc"]]
    });
});

$(document).ready(function () {

    $(document).on('click', '.remove_image', function () {
        var imageid = $(this).data('id')
        Swal.fire({
            title: "Delete?"
            , text: "Are you sure you want to delete this image?"
            , type: "warning"
            , showCancelButton: !0
            , confirmButtonText: "Yes, delete it!"
            , cancelButtonText: "No, cancel!"
            , reverseButtons: !0
        }).then((e) => {
            if (e.value == true) {
                $.ajax({
                    type: 'POST',
                    url: '/product/image_delete/' + imageid,
                    DataType: 'json',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function (response) {
                        if (response.success) {
                            swal.fire("Done!", response.message, "success");
                            $('#already_images').load(location.href + ' #already_images');
                        }
                    }
                })
            }
        })
    })
})
