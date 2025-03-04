var wH = $(window).height();
$(window).resize(function(event) {
    resizer();
});

$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top + ($(window).height() /2);
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};
function loadVideos(){
    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
}

const initialiseStyleBackgroundIntersectionObserver = () => {
    const lazyBackgrounds = Array.from(document.querySelectorAll('[data-background-image]'));

    if (lazyBackgrounds.length === 0) {
      return;
    }

    let lazyBackgroundObserver;

    const loadBackgroundIfElementOnScreen = (entry) => {
      if (entry.isIntersecting) {
        entry.target.style.backgroundImage = `url('${entry.target.dataset.backgroundImage}')`;
        lazyBackgroundObserver.unobserve(entry.target);
      }
    };

    const observeElementVisibility = (lazyBackground) => {
      lazyBackgroundObserver.observe(lazyBackground);
    };

    const setBackground = (element) => {
      element.style.backgroundImage = `url('${entry.target.dataset.backgroundImage}')`;
    };

    if (typeof window.IntersectionObserver === 'function') {
      lazyBackgroundObserver = new IntersectionObserver((entries) => {
        entries.forEach(loadBackgroundIfElementOnScreen);
      });
      lazyBackgrounds.forEach(observeElementVisibility);
    } else {
      lazyBackgrounds.forEach(setBackground);
    }
  };


function loadImages(){
    var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

    if ("IntersectionObserver" in window) {
      let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            let lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.src;
            //lazyImage.srcset = lazyImage.dataset.srcset;
            lazyImage.classList.remove("lazy");
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });

      lazyImages.forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      // Possibly fall back to event handlers here
    }
}
document.addEventListener("DOMContentLoaded", function() {
    loadImages();
    loadVideos();
    initialiseStyleBackgroundIntersectionObserver();
  });

function call_livechat(){
    window.__lc = window.__lc || {};
    window.__lc.license = 11818395;
    // (function() {
    $('.callChat').bind("click", function(){
        console.log("s");
        var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    });
    // })();
}

function nextLetterInAlphabet(c) {
    var i = (parseInt(c, 36) + 1 ) % 36;
    return (!i * 10 + i).toString(36).toUpperCase();
}

function resizer(){
    wW = $(window).width();
}
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).ready(function () {
    if(getParameterByName('utm_source')!=null && getParameterByName('utm_source')!=""){
        $('#utm_source').val(getParameterByName('utm_source'));
    }
    if(getParameterByName('utm_medium')!=null && getParameterByName('utm_medium')!=""){
        $('#utm_medium').val(getParameterByName('utm_medium'));
    }
    if(getParameterByName('utm_campaign')!=null && getParameterByName('utm_campaign')!=""){
        $('#utm_campaign').val(getParameterByName('utm_campaign'));
    }
    if(getParameterByName('gclid')!=null && getParameterByName('gclid')!=""){
        $('#gclid').val(getParameterByName('gclid'));
    }

    $("#news").JPaging({
        pageSize: 6,
        visiblePageSize: 7

      });


    $(document).on('click', '.menuLink', function () {
        $(this).toggleClass('closer');
        $('nav').toggleClass('opened');
    });

    $(document).on('click', 'nav a', function () {
        $('.menuLink').removeClass('closer');
        $('nav').removeClass('opened');
    });

    $(document).on('click', 'a.scroll', function () {
        $('html, body').animate({scrollTop: $(window).height()}, 500);
        return false;
    });




    resizer();
    call_livechat();
    $('header nav a').click(function(event) {
        var $this =  $(this);
        $('html, body').animate({scrollTop: $($this.attr('href')).offset().top - $('header').outerHeight()}, 1000);
        return false;
    });

    var owl = $('#mainSlider');
    owl.owlCarousel({ smartSpeed: 700, loop: true, margin: 0, autoplay:true,responsiveClass: true, nav:true, dots:true, items: 1, animateOut: 'fadeOut',mouseDrag:false, thumbs: false, touchDrag:false, responsive: { 0: {}, 780:{} }});
    owl.on('changed.owl.carousel', function (e) {
        owl.trigger('stop.owl.autoplay');
        owl.trigger('play.owl.autoplay');
    });


    var owlAbout = $('#aboutSlider');
    owlAbout.owlCarousel({ smartSpeed: 700,startPosition: 2, loop: false, margin: 0, autoplay:true,responsiveClass: true, nav:false, dots:false, items: 1, thumbs: false, responsive: { 0: {}, 780:{} }});
    owlAbout.on('changed.owl.carousel', function (e) {
        $('.aboutNav li').removeClass('selected').eq(e.item.index).addClass('selected');
    });
    $('a.aPrev').click(function(event) {
        owlAbout.trigger('prev.owl.carousel');
        return false;
    });
    $('a.aNext').click(function(event) {
        owlAbout.trigger('next.owl.carousel');
        return false;
    });

    var owl6 = $('.gallerySlider');
    owl6.owlCarousel({ smartSpeed: 700, loop: true, margin: 0, autoplay:false,responsiveClass: true, nav:true, dots:true, items: 1, thumbs: false, thumbImage: false,lazyLoad:true, thumbContainerClass: 'owl-thumbs', thumbItemClass: 'owl-thumb-item', responsive: { 0: {}, 780:{} }});


    $('.planCategory a').click(function(event) {
        $this = $(this);
        if(!$this.hasClass('selected')){
            $('.planCategory a').removeClass('selected');
            $this.addClass('selected');
            $('.planTypes div').slideUp();
            $('.planTypes div').eq($this.index()).slideDown();
            $('.planTypes div').eq($this.index()).find('a:first-child').trigger('click');
        }
        return false;
    });

    $('.planTypes a').click(function(event) {
        $this = $(this);
        if(!$this.hasClass('selected')){
            $('.planTypes a').removeClass('selected');
            $this.addClass('selected');
            TweenLite.to($('.planImgList a'), .5, {css: { opacity: 0}, ease: Expo.easeInOut, onComplete:function(){
                var t = $this.attr('data-href');
                $('.planImgList a').hide();
                $('#' + t).show();
                TweenLite.to($('#' + t), .5, {css: { opacity: 1}, ease: Expo.easeInOut});
            }});

        }
        return false;
    });


    $('.resendSuccess').click(function(){
        var dataId = $('.phoneValidate input[name="dataId"]').val();
        $.get($(this).data("href")+"?dataId="+dataId,function(data){
            $.MessageBox('Onay:' + data.returnText);
        });
    });
    $('.closeFormData').click(function(){
        $('.codeFormData').fadeOut();
    });
    $('.phoneValidate').submit(function(e){
        e.preventDefault();
        $.get($(this).attr("action"),$(this).serialize(),function(data){
            if(data.status){
                $(".codeFormData").fadeOut();
                sendFormData();
            }else{
                $.MessageBox('Hata: Onay kodunuz hatalı veya onaylanmadı.');
            }
        })
    });

    $('a.callForm').click(function(event) {
        $('a.callForm').toggleClass('selected');
        $('#talep-formu').toggleClass('opened');
    });

    $('a.arrowLink').click(function(event) {
        $('a.arrowLink').toggleClass('selected');
        $('#talep-formu').toggleClass('opened');
    });

});




$(function () {

    var activeIndex = $('.active-tab').index(),
        $contentlis = $('.tabs-content .tabs'),
        $tabslis = $('.tabsBtn a');

    $contentlis.eq(activeIndex).show();

    $('.tabsBtn').on('click', 'a' , function (e) {
      var $current = $(e.currentTarget),
          index = $current.index();

      $tabslis.removeClass('active-tab');
      $current.addClass('active-tab');
      $contentlis.hide().eq(index).show();
       });
  });

$(function(){
        var say = 2000;
        $('textarea').bind('keydown keyup keypress change',function(){
            var thisValueLength = $(this).val().length;
            var saymax = (say)-(thisValueLength);
            $('.say').html(saymax);
        });
        $(window).load(function(){
            $('.say').html(say);
        });
    });

    var refreshCaptcha = function() {
        $.ajax({
            method : 'GET',
            url : '/api/captcha',
            success : function(data){
               $('.captchaImg img').remove();
               $('.captchaImg').html(data.captcha);
            }
        })
    };
    $('.captcha-wrap').hide();

    $('.intltelinput').not('.rendered').addClass('rendered').each(function () {
        var $this = $(this),
            target = $this.parent().parent().find('.phoneInput');

        $this.on('change keypress keyup keydown blur',function () {
            setTimeout(function () {
                var val = $this.val().replace(/\s|_/g,'');
                if(val) {
                    target.val('+' + $this.intlTelInput("getSelectedCountryData").dialCode + val);
                } else {
                    target.val('');
                }
            });
        });

        $this.intlTelInput({
            nativeMobileDropdown: true,
            autoPlaceholder: true,
            numberType: "MOBILE",
            formatOnInit: true,
            utilsScript: "/front/premium-theme/js/form/intl-tel-input/js/utils.js",
            initialCountry: 'tr',
            nationalMode: true,
            separateDialCode: true,
            preferredCountries: ["tr", "us", "gb"],
            customPlaceholder: function customPlaceholder(selectedCountryPlaceholder, selectedCountryData) {

                //if (selectedCountryData.iso2 == "tr") {
                //    selectedCountryPlaceholder = "501 123 4567";
                //}

                if (selectedCountryData.dialCode == 49) {
                    var mask = '999 999999{1,3}';
                }else if (selectedCountryData.dialCode == 90) {
                    var mask = '(599)999-9999';
                    selectedCountryPlaceholder = "(5__)___-____";
                }else if (selectedCountryData.dialCode == 43) {
                    var mask = '999 999999{1,3}';
                } else if (selectedCountryData.dialCode == 359) {
                    var mask = '99 999 999{1,3}';
                } else {
                    var mask = selectedCountryPlaceholder.replace(/[0-9]/g, "9");
                }

                $this.mask(mask);

                return selectedCountryPlaceholder;
            }
        });
    });

    var nameRequired = "@trans('common.validation.name')";
    //var surnameRequired = "@trans('common.validation.surname')";
    var nameMinLenght = "@trans('validation.min.numeric', ['attribute' => trans('common.nameAndSurname'), 'min' => 2])";
    var phoneRequired = "@trans('common.validation.phoneNumber')";
    var emailRequired = "@trans('common.validation.email')";
    var emailCheck = "E-posta adresiniz hatalı";
    var selectReqiured = "@trans('common.validation.select')";
    var messageRequired = "@trans('common.validation.message')";
    var captchaRequired = 'Güvenlik kodunu girdiniz';
    var agreedRequired = 'Lütfen Aydınlatma metni ve Açık Rıza Beyanını okuyarak kabul ediniz';

    var blockMultiClick = true;

    $("#form-talep").validate({
        ignore: [],
        errorElement:'span',
        rules: {
            name: {
                required: true,
                minlength: 2,
            },
            agreed: {
                required: true,
            },
            phoneNumber: 'required',
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            name: {
                required: nameRequired,
                minlength: nameMinLenght,
            },
            phoneNumber: phoneRequired,
            email: {
                required: emailRequired,
                email: emailCheck
            },
            agreed: agreedRequired,
            captcha: captchaRequired,
        },
        errorPlacement: function(label, elem){
            elem.parent().append(label);
            elem.parent().addClass('error');
        },
        submitHandler: function(form) {
            sendFormData();
            return false;
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function sendFormData() {
        if(blockMultiClick === true) {
            blockMultiClick = false;
            $('#send_button').css('opacity', 0.2).attr('disabled', true).text('Lütfen Bekleyiniz.');

            // Ülke kodunu ve telefon numarasını birleştir
            const dialCode = $('.selected-dial-code').text(); // Örn: +90
            const phoneInput = $('.intltelinput').val(); // Örn: 5348970934
            const fullPhoneNumber = dialCode + phoneInput; // Örn: +905348970934

            const formData = {
                firstName: $('input[name="name"]').val(),
                lastName: $('input[name="lastname"]').val(),
                phone: fullPhoneNumber,
                email: $('input[name="email"]').val(),
                message: $('textarea[name="message"]').val(),
                konu: 'PİYALEPAŞA İSTANBUL PREMIUM',
                _token: $('meta[name="csrf-token"]').attr('content'),
                language: $('input[name="language"]').val(),
            };

            $.ajax({
                type: 'POST',
                url: '/form-submit',
                data: formData,
                success: function(response) {
                    if(response.success) {
                        $('.codeFormData input[name="dataId"]').val(response.dataId);
                        $('.codeFormData input[name="phone"]').val(formData.phone);
                        $('.codeFormData').fadeIn();
                    } else {
                        $.alert({title: 'Hata', content: response.message});
                        resetFormButton();
                    }
                },
                error: function(xhr) {
                    $.alert({title: 'Hata', content: xhr.responseJSON.message || 'Bir hata oluştu'});
                    resetFormButton();
                }
            });
        }
    }

    $('.phoneValidate').submit(function(e) {
        e.preventDefault();

        // Ülke kodunu ve telefon numarasını birleştir
        const dialCode = $('.selected-dial-code').text(); // Örn: +90
        const phoneInput = $('.intltelinput').val(); // Örn: 5348970934
        const fullPhoneNumber = dialCode + phoneInput; // Örn: +905348970934

        const verifyData = {
            dataId: $('.phoneValidate input[name="dataId"]').val(),
            phone: fullPhoneNumber, // Birleştirilmiş tam telefon numarası
            code: $('.phoneValidate input[name="code"]').val(),
            firstName: $('input[name="name"]').val(),
            lastName: $('input[name="lastname"]').val(),
            email: $('input[name="email"]').val(),
            konu: 'PİYALEPAŞA İSTANBUL PREMIUM',
            _token: $('meta[name="csrf-token"]').attr('content'),
            language: $('input[name="language"]').val(),
        };

        $.ajax({
            type: 'POST',
            url: '/sms-submit',
            data: verifyData,
            success: function(response) {
                if(response.success && response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    $.alert({title: 'Hata', content: response.message || 'Bir hata oluştu'});
                }
            },
            error: function(xhr) {
                $.alert({title: 'Hata', content: xhr.responseJSON.message || 'Doğrulama başarısız oldu'});
            }
        });
    });

    function resetFormButton() {
        blockMultiClick = true;
        $('#send_button').css('opacity', 1)
            .attr('disabled', false)
            .text("Gönder");
    }

    window.addEventListener('load',function(){
        $('html,body').scrollTop(0);
        if(window.location.hash){
            var item = window.location.hash.replace('#','');
            console.log($('#' + item).offset().top);
            $('html,body').stop().animate({
                scrollTop : $('#' + item).offset().top - $('header').outerHeight()
            }),600;
        }
    })
