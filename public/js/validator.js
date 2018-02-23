(function ($) {
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        onfocusout: false,
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $('form.form-validate').each(function () {
        var rules = {};
        var messages = {};
        var form = $(this);

        form.find('input.required').each(function () {
            var field = $(this);
            var name = field.attr('name');
            rules[name] = {};
            messages[name] = {};

            // Required
            rules[name].required = true;
            if (field.prev('label').length > 0) {
                messages[name].required = lang.required_field.replace('%s', field.prev('label').text());
            }

            // Email
            if (name === 'email') {
                rules[name].email = true;
                if (field.prev('label').length > 0) {
                    messages[name].email = lang.invalid_field_email;
                }
            }

            // Min Length
            if (field.hasClass('validate-min-length')) {
                var minLength = typeof field.data('min-length') !== 'undefined' ? parseInt(field.data('min-length')) : 6;
                rules[name].minlength = minLength;
                messages[name].minlength = lang.required_field_min_length.replace('%s', minLength);
            }

            // Equal To
            if (name.indexOf('_confirmation') > -1) {
                var equalTo = name.replace('_confirmation', '').trim();
                var originalField = $('#' + equalTo);
                rules[name].required = function () {
                    return originalField.val().trim() !== '' || originalField.hasClass('required');
                };
                rules[name].equalTo = '#' + equalTo;
                if (originalField.prev('label').length > 0) {
                    messages[name].equalTo = lang.required_field_equal_to.replace('%s', originalField.prev('label').text());
                }
            }
        });

        form.validate({
            rules: rules,
            messages: messages
        })
    });
})(jQuery);