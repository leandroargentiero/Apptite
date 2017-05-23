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
            format: 'DD/MM/YYYY'
        });
    });


    // RATING SYSTEM
    var $star_rating = $('.star-rating .fa');

    var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };

    $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
    });

    SetRatingStar();

});
//# sourceMappingURL=all.js.map
