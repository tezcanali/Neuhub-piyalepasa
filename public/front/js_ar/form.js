$(function () {

    $('.numbers-only').keypress(function (e) {


            if (isNaN(this.value + "" + String.fromCharCode(e.charCode)))
                return false;

        })
        .on("cut copy paste", function (e) {
            e.preventDefault();
        });


    function validateEmail(email) {
        var email = jQuery.trim(email);
        var regEmail = /^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
        email = email.toUpperCase();
        if (email.match(regEmail)) {
            return true;
        } else {
            return false;
        }
    }

    function validateCardno(num) {
        var num = jQuery.trim(num);
        var re16digit = /^\d{16}$/;
        if (num.match(re16digit)) {
            return true;
        } else {
            return false;
        }
    }

    function validateCVV(num) {
        var num = jQuery.trim(num);
        var re16digit = /^\d{3,4}$/;
        if (num.match(re16digit)) {
            return true;
        } else {
            return false;
        }
    }


    $(".num").keypress(function (event) {
        var controlKeys = [8, 9, 13, 43];
        var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
        if (!event.which ||
            (48 <= event.which && event.which <= 57) ||
            (48 == event.which && $(this).attr("value")) ||
            isControlKey) {
            return;
        } else {
            event.preventDefault();
        }
    });
    $('.num').bind("cut copy paste", function (e) {
        e.preventDefault();
    });

    $(".form-container").submit(function () {

        if (!$('form button').hasClass('clicked')) {
           var this_form = $(this);
            if (!validate_form(this_form)) {
                return false;
            } else {
                var data= 'name='+$(".name",this_form).val()+"&"+'email='+$(".email",this_form).val()+'&'+'phone='+$(".phone",this_form).val()+'&'+'message='+$(".message",this_form).val();
                $.ajax({
                    type: "POST",
                    url: "/assets/theme/mail.php",
                    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                    data: data,
                    success: function(response) {
                        if(response>0){
                            //alert(response)
                        window.location.assign("/assets/theme/thanks.php")
                        }
                        else{
                        window.location.assign("/assets/theme/fail.php")
                        }
                    }
                });

                $(".submit",this_form).attr('disabled','disabled').addClass('wait');
                $('form button').addClass('clicked');
                return false;
            }
        }
    });


    function validate_form(form) {
//        alert('ارسال الفورم');
        var valid = true;
        $('input').removeClass('has-error');
        $('.error').remove()

        $('.required', form).each(function () {
            if ($(this).val() == "") {
                valid = false;
                $(this).parent().append('<p class="error">يرجى تعبئة الحقل</p>');
                $(this).addClass('has-error')
//                alert(this.value.length )
            }

        });

        $('.phone', form).each(function () {
            if ($(this).val() != "") {
                if (this.value.length < 11) {
                    valid = false;
                    $(this).parent().append('<p class="error"> يرجى كتابة رقم الهاتف بشكل صحيح ولايقل عن 11 رقماً.</p>')
                $(this).addClass('has-error')
                }
            }
        });
        $('input.email', form).each(function () {
            if ($(this).val() != "") {
                if (!validateEmail($(this).val())) {
                    valid = false;
                    $(this).parent().append('<p class="error">يرجى كتابة البريد الالكتروني بشكل صحيح.</p>')
                $(this).addClass('has-error')
                }
            }
        });


//        alert(valid)
        return valid;
    }
});