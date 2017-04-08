$( document ).ready(function() {

    // AVATAR UPLOAD PREVIEW
    $(".avatar-upload").on('change', function () {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#avatar-preview");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar-preview').attr('src', e.target.result);

            }
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });


});