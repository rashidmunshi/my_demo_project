
$(".btn_click").click(function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
        title: "Delete?"
        , text: "Please ensure and then confirm!"
        , type: "warning"
        , showCancelButton: !0
        , confirmButtonText: "Yes, delete it!"
        , cancelButtonText: "No, cancel!"
        , reverseButtons: !0
    }).then((e) => {
        if (e.value == true) {
            $.ajax({
                type: 'POST',
                url: 'delete/user/' + id,
                DataType: 'json',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                }, success: function (response) {
                    if (response.success) {
                        swal.fire("Done!", response.message, "success");
                        $('#xyz').load(' .abc');
                        //  $(id).closest('tr').remove();
                    }
                },
                error: function (error) {
                    swal.fire("Error!", error.message, "error");
                }
            });
        }
    })
});

$(document).ready(function () {

    $('.status').change(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'edit/status/' + id
            , type: "POST"
            , DataType: 'json'
            ,
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content')
            }
            , success: function (response) {
                Swal.fire({
                    title: 'status updated success',
                    text: 'You clicked the button!',
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }, 1000)
            }
            , error: function (error) {
                swal.fire("Error!", error.message, "error");
            }
        });
    })
})
















// var drop = document.getElementById('drop');

// var normal_product = document.getElementById('normal_product');
// var single_varient = document.getElementById('single_varient');
// var multi_varient = document.getElementById('multi_varient');
// var multi_varient1 = document.getElementById('multi_varient1');
// drop.addEventListener('change', () => {
//     var value = drop.value;
//     if (value == 'normal_product') {
//         single_varient.style.display = 'none';
//         multi_varient.style.display = 'none';
//         multi_varient1.style.display = 'none';
//     }
//     else if (value == 'single_varient') {
//         single_varient.style.display = "block";
//         multi_varient.style.display = 'none';
//         multi_varient1.style.display = 'none';
//     }
//     else if (value == 'multi_varient') {
//         multi_varient.style.display = "block";
//         multi_varient1.style.display = "block";
//         single_varient.style.display = 'none';
//     }
//     else if (value == 'select_type') {
//         single_varient.style.display = 'none';
//         multi_varient.style.display = 'none';
//         multi_varient1.style.display = 'none';
//     }
// })


// $(document).ready(function () {
//     var i = 1;
//     $(document).on('click', '#add', function () {
//         i++;
//         $('.nn').append('<div id="row' + i + '" class"mt-3"><label class="" for="">Select Color</label><div class="mb-3 d-flex"><select name="type" class="form-control"><option value="select_color" selected>select color</option><option value="red">Red</option><option value="blue">Blue</option></select> <button type="button" id="' + i + '" class="btn btn-danger btn-remove"><i class="fas fa-minus"></i></button></div></div>' + '<div class="form-floating mb-3" id="row2' + i + '"><label>Price</label><input type="number" name="price1[]" class="form-control mb-3" placeholder="price" min="0"></div>');


//         $('#data2').append('<div id="row3' + i + '" class="my-3"><label for="">Select Size</label><select name="type" class="form-control"><option value="Select Size"selected>Select Size</option><option value="xl">XL</option><option value="xxl">XXL</option></select></div>' + '<div id="row4' + i + '" class="form-floating mt-3"> <label>Quantity</label> <input type="number" name="quantity1[]" class="form-control" placeholder="Quantity" min="0"></div>');
//     });
//     $(document).on('click', '.btn-remove', function () {
//         var button_id = $(this).attr('id');
//         $('#row' + button_id + '').remove()
//         $('#row2' + button_id + '').remove()
//         $('#row3' + button_id + '').remove()
//         $('#row4' + button_id + '').remove()
//     })
// });

// //single variant js
// $(document).ready(function () {
//     var counter = 0;

//     $(document).on('change', '#type', function () {
//         var type_value = $(this).val()
//         counter++;
//         if (type_value == 'size' && counter < 4) {
//             console.log('hello');
//             $('#price').append('<div class="my-3 bb" id="size" name="size"><label for="">Select Size</label><select name="size_select[]" class="form-control"><option value="Select Size" selected>Select Size</option><option value="xl">XL</option><option value="xxl">XXL</option></select><button type="button" id="addbtn"  class="btn btn-success "><i class="fas fa-plus me-2"></i></button></div>');
//             $('#color').hide()
//         }
//         else if (type_value == 'color' && counter < 4) {
//             $('#price').append('<div class="my-3 bb" id="color" name="color"><label for="">Select color</label><select name="select_color" class="form-control"><option value="Select Size" selected>Select color</option><option value="red">Red</option><option value="yellow">Yellow</option></select><button type="button" id="addbtn" class="btn btn-success"><i class="fas fa-plus me-2"></i></button></div>');
//             $('#size').hide()
//         }
//     });
//     var i = 1;
//     $(document).on('click', '#addbtn', function () {
//         i++;
//         var value = $('#type').val();
//         if (value == 'size') {
//             $('.bb').append('<div class="my-3"  id="row' + i + '"><label for="">Select Size</label><select name="size_select[]" class="form-control"><option value="Select Size" selected>Select Size</option><option value="xl">XL</option><option value="xxl">XXL</option></select><button type="button" id="' + i + '" class="btn btn-danger btn-remove"><i class="fas fa-minus"></i></button></div>' + '<div class="form-floating mb-3" id="row2' + i + '"><label>Price</label><input type="number" name="price1[]" class="form-control mb-3" placeholder="price" min="0"></div>');

//             $('#data2').append('<div id="row4' + i + '" class="form-floating mt-3"> <label>Quantity</label> <input type="number" name="quantity1[]" class="form-control" placeholder="Quantity" min="0"></div>')
//         }
//         if (value == 'color') {
//             $('.bb').append('<div id="row' + i + '" class"mt-3"><label class="" for="">Select Color</label><div class="mb-3 d-flex"><select name="select_color" class="form-control"><option value="select_color" selected>select color</option><option value="red">Red</option><option value="blue">Blue</option></select> <button type="button" id="' + i + '" class="btn btn-danger btn-remove"><i class="fas fa-minus"></i></button></div></div>' + '<div classs="form-floating mb-3" id="row2' + i + '"><label>Price</label><input type="number" name="price1[]" class="form-control mb-3" placeholder="price" min="0"></div>');

//             $('#data2').append('<div id="row4' + i + '" class="form-floating mt-3"> <label>Quantity</label> <input type="number" name="quantity1[]" class="form-control" placeholder="Quantity" min="0"></div>')
//         }
//     });
// });



