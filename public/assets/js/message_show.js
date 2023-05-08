setTimeout(function () {
    $('#message').slideUp('fast');
}, 3000)

setTimeout(function () {
    $('#success_message').slideUp('fast');
}, 3000)
setTimeout(function () {
    $('#user_message').slideUp('fast');
}, 3000)
setTimeout(function () {
    $('#delete_message').slideUp('fast');
}, 4000)

//file
$(document).ready(function () {
    $(document).on('change', '#image', function () {
        var file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('#image_view').attr('src', event.target.result).css('width', "70px");
            }
            reader.readAsDataURL(file);
        }
    });
});
