$( document ).ready(function() {

    // AVATAR UPLOAD PREVIEW
    $(".avatar-upload").on('change', function () {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $(".upload-preview");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-preview').attr('src', e.target.result);

            }
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });

    // AVATAR UPLOAD PREVIEW
    $(".meal-upload").on('change', function () {
        if (typeof (FileReader) != "undefined") {

            var image_holder = $(".upload-preview");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-preview').attr('src', e.target.result);
                $('.upload-preview').show();

            }
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });

    // OPEN DATETIMEPICKER
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY/MM/DD'
        });
    });


});
//# sourceMappingURL=all.js.map
