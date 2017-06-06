$( document ).ready(function() {

    //********************** AVATAR PICTURE UPLOAD PREVIEW ********************** /
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

    // //********************** MEALPICTURE UPLOAD PREVIEW ********************** /
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

    // //********************** OPEN DATETIMEPICKER ********************** /
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    });

    //********************** RATING STARS ********************** /
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

    //********************** FORM FIELDS ********************** /
    $.fn.floatLabels = function (options) {

        // Settings
        var self = this;
        var settings = $.extend({}, options);


        // Event Handlers
        function registerEventHandlers() {
            self.on('input keyup change', 'input, textarea', function () {
                actions.swapLabels(this);
            });
        }


        // Actions
        var actions = {
            initialize: function() {
                self.each(function () {
                    var $this = $(this);
                    var $label = $this.children('label');
                    var $field = $this.find('input,textarea').first();

                    if ($this.children().first().is('label')) {
                        $this.children().first().remove();
                        $this.append($label);
                    }

                    var placeholderText = ($field.attr('placeholder') && $field.attr('placeholder') != $label.text()) ? $field.attr('placeholder') : $label.text();

                    $label.data('placeholder-text', placeholderText);
                    $label.data('original-text', $label.text());

                    if ($field.val() == '') {
                        $field.addClass('empty')
                    }
                });
            },
            swapLabels: function (field) {
                var $field = $(field);
                var $label = $(field).siblings('label').first();
                var isEmpty = Boolean($field.val());

                if (isEmpty) {
                    $field.removeClass('empty');
                    $label.text($label.data('original-text'));
                }
                else {
                    $field.addClass('empty');
                    $label.text($label.data('placeholder-text'));
                }
            }
        }


        // Initialization
        function init() {
            registerEventHandlers();

            actions.initialize();
            self.each(function () {
                actions.swapLabels($(this).find('input,textarea').first());
            });
        }
        init();


        return this;
    };

    $(function () {
        $('.float-label-control').floatLabels();
    });

});
//# sourceMappingURL=all.js.map
