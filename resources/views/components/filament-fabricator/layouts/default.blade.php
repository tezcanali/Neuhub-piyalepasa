@props(['page'])
    <!DOCTYPE html>
<html lang="tr">
<head>
    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.start') }}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="front/images/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="57x57" href="front/images/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="front/images/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="front/images/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="front/images/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="front/images/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="front/images/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="front/images/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="front/images/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="front/images/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="front/images/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="front/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="front/images/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="front/images/icon/favicon-16x16.png">
    <link rel="shortcut icon" href="front/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="/manifest.json">

    <link rel="stylesheet" type="text/css" href="{{asset('front/css/mainNew.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front/premium-theme/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front/premium-theme/js/fancybox/jquery.fancybox.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front/intl-tel-input/css/intlTelInput.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/premium-theme/css/icofont.min.css')}}" type="text/css" media="screen"
          charset="utf-8"/>
    <link rel="stylesheet" href="{{asset('front/premium-theme/js/owlcarousel/assets/owl.carousel.css')}}">

    @foreach (\Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getMeta() as $tag)
        {{ $tag }}
    @endforeach

    {!! seo()->for($page) !!}

    @foreach (\Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getStyles() as $name => $path)
        @if (\Illuminate\Support\Str::of($path)->startsWith('<'))
            {!! $path !!}
        @else
            <link rel="stylesheet" href="{{ $path }}"/>
        @endif
    @endforeach

    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.head.end') }}

    <script src="{{asset('front/js/lib/jquery-2.2.4.min.js')}}"></script>

    <style>
        @media screen and (max-width: 780px) {
            .slider-1 {
                background-image: url({{asset('front/premium-theme/images/slide/4-mobil.webp')}}) !important;
                background-position: top;
                margin-top: 27px;
            }
        }

        .slider-1 {
            background-position: top !important;
            background-image: url({{asset('front/premium-theme/images/slide/4.webp')}});
            margin-top: 70px;
        }

        .full p {
            max-width: none !important;
        }

        ul {
            margin: 10px 0;
        }

        ul li {
            padding-bottom: 4px;
            list-style: disc;
        }
    </style>
</head>

<body>
{{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.start') }}

@include('front.layout.header')

<main class="main-page">
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />


    {{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.start') }}

    @foreach (\Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getScripts() as $name => $path)
        @if (\Illuminate\Support\Str::of($path)->startsWith('<'))
            {!! $path !!}
        @else
            <script defer src="{{ $path }}"></script>
        @endif
    @endforeach
</main>

@stack('scripts')

{{ \Filament\Facades\Filament::renderHook('filament-fabricator.scripts.end') }}

{{ \Filament\Facades\Filament::renderHook('filament-fabricator.body.end') }}

@include('front.layout.footer')

<script src="{{asset('front/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"
        integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('front/js/lib/jquery-ui.min.js')}}"></script>
<script src="{{asset('front/js/lib/jquery.hammer.min.js')}}"></script>
<script src="{{asset('front/js/lib/jquery.mousewheel.min.js')}}"></script>
<script src="{{asset('front/js/lib/modernizr.min.js')}}"></script>
<script src="{{asset('front/js/lib/TweenMax.min.js')}}"></script>
<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion_async.js"
        charset="utf-8"></script>

<script src="{{asset('front/js/plugins/jquery.DEpreload.min.js')}}"></script>
<script src="{{asset('front/js/plugins/dragdealer.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery-confirm.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.validate.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.maskedinput-1.3.1.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.selectBoxIt.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.royalslider.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.maskMoney.min.js')}}"></script>
<script src="{{asset('front/js/plugins/jquery.autonumeric.min.js')}}"></script>
<script src="{{asset('front/js/plugins/TouchNSwipe.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="{{asset('front/premium-theme/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('front/premium-theme/js/owlcarousel/owl.carouselThumbs.js')}}"></script>
<script src='{{asset('front/premium-theme/js/fancybox/jquery.fancybox.js')}}'></script>
<script src="{{asset('front/premium-theme/js/messagebox.js')}}"></script>
<script src="{{asset('front/premium-theme/js/form/jquery.maskedinput-1.3.1.min.js')}}"></script>
<script src="{{asset('front/premium-theme/js/form/intl-tel-input/js/intlTelInput.min.js')}}"></script>
<script src="{{asset('front/premium-theme/js/form/jquery.validate.min.js')}}"></script>

<script src="{{asset('front/premium-theme/js/paging.js')}}"></script>
<script src='{{asset('front/premium-theme/js/functions.js')}}'></script>

<script>
    window.addEventListener('load', function () {
        $('html,body').scrollTop(0);
        if (window.location.hash) {
            var item = window.location.hash.replace('#', '');
            console.log($('#' + item).offset().top);
            $('html,body').stop().animate({
                scrollTop: $('#' + item).offset().top - $('header').outerHeight()
            }), 600;
        }
    })
</script>
<script type="text/javascript">

    $(document).ready(function () {
        // call_livechat();

        $(".tab-links .button").click(function (e) {
            var filter = $(this).attr('year');

            $(".tab-links .button").removeClass("aktif");
            if (filter) {
                $('#basin-tum-haberler li[year=' + filter + ']').show();
                //$('#basin-tum-haberler li:not([year='+filter+'])').hide();
            }

        });

        $('#basin-tum-haberler, #basin-haberler, #document, #basin-lang').on('click', 'li', function (e) {
            if ($(e.target).is('a') && !$(e.target).hasClass('document')) {
                var type = $(this).parent().parent().parent().find('ul').eq(0).data('type');
                var year = $(this).parent().parent().parent().find('ul').eq(0).data('year');
                var page = $(this).text();
                var section = $(this).closest(".section");

                var _ = this;

                $.get('/tr/blog-posts?page=' + page + (type == undefined ? '&type=' + 'ayin-elemani' : '&type=' + type) + (year == undefined ? '' : '&year=' + year), function (data) {

                    $(_).parent().parent().parent().html($(data));
                    ppasa.basicFunctions.modalOpener.init();
                    ppasa.layout.goTo(parseInt(section.attr("data-section")));

                })

                return false;
            }
        })

        $('#basin-tum-haberler, #basin-haberler, #document, #basin-lang').on('click', 'a[rel=prev], a[rel=next]', function (e) {
            if ($(e.target).is('a')) {
                var type = $(this).parent().parent().parent().find('ul').eq(0).data('type')
                var page = $(this).text()
                var _ = this

                var num = parseInt($(this).parent().parent().parent().find('.active').text())

                if ($(_).attr('rel') == 'prev') {
                    num--
                } else if ($(_).attr('rel') == 'next') {
                    num++
                }

                $(this).parent().parent().parent().find('a').each(function (i, el) {
                    if ($(el).text() == num) {
                        ppasa.basicFunctions.modalOpener.init();
                        $(el).trigger('click')
                    }
                })
            }

            return false;
        })

        $("body").off("click", ".plan-link").on("click", ".plan-link", function () {
            var self = $(this);

            var num = self.text().trim().split(' ')[0]
            var pid = self.text().trim().split(' ')[1]

            $('.selector .links a').each(function () {
                var index = $(this).index()

                if ($(this).text() == num) {
                    var text = $(this).text()
                    $(this).trigger('click')
                    $('.selector .tabs .tab').eq(index).find('a').each(function () {
                        var el = $(this).clone()
                        el.find('i').remove()
                        el.find('strong').remove()

                        if (el.text().trim() == num + ' ' + pid) {
                            $(this).trigger('click')
                            $('.selector .tabs .tab').eq(index).find('.active').removeClass('active')
                            $(this).addClass('active')
                        }
                    })
                }
            })
        });

    });

    function goBack() {
        window.history.back();
    }

    var hoverList = []

    Number.prototype.format = function (n, x, s, c) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
            num = this.toFixed(Math.max(0, ~~n));

        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };

    $('#cash-slider-Ppasa, #cash-slider-Garanti, #cash-slider-Ziraat, #cash-slider-Isbank').on('mousemove touchmove', function () {
        var name = $(this).attr('id').replace('cash-slider-', '').trim()

        if (hoverList.indexOf(name) == -1) {
            hoverList.push(name)

            var inputCash = $("input[name='cash" + name + "']");
            var minCash = parseInt(inputCash.attr("data-min"));
            var maxCash = parseInt(inputCash.attr("data-max"));
            var stepCash = maxCash - minCash;

            var cashSlider = new Dragdealer('cash-slider-' + name, {
                steps: stepCash,
                snap: true
            });

            window[name] = cashSlider

            setTimeout(function () {
                cashSlider.reflow();
            }, 100);
        } else {
            if ($(this).hasClass('active')) {
                var x = window[name].getValue()[0]
                var inputCash = $("input[name='cash" + name + "']");
                var minCash = parseInt(inputCash.attr("data-min"));
                var maxCash = parseInt(inputCash.attr("data-max"));
                var stepCash = maxCash - minCash;
                inputCash.val(money((Math.round(x * stepCash)) + minCash));
            }
        }
    })

    $('#cash-slider-Ppasa, #cash-slider-Garanti, #cash-slider-Ziraat, #cash-slider-Isbank').on('mousedown touchstart', function () {
        var name = $(this).attr('id').replace('cash-slider-', '').trim()

        $(this).addClass('down')

        if (hoverList.indexOf(name) == -1) {
            hoverList.push(name)

            var inputCash = $("input[name='cash" + name + "']");
            var minCash = parseInt(inputCash.attr("data-min"));
            var maxCash = parseInt(inputCash.attr("data-max"));
            var stepCash = maxCash - minCash;

            var cashSlider = new Dragdealer('cash-slider-' + name, {
                steps: stepCash,
                snap: true
            });

            window[name] = cashSlider

            setTimeout(function () {
                cashSlider.reflow();
            }, 100);
        } else {
            var x = window[name].getValue()[0]
            var inputCash = $("input[name='cash" + name + "']");
            var minCash = parseInt(inputCash.attr("data-min"));
            var maxCash = parseInt(inputCash.attr("data-max"));
            var stepCash = maxCash - minCash;
            inputCash.val(money((Math.round(x * stepCash)) + minCash));
        }
    })

    $('#cash-slider-Ppasa, #cash-slider-Garanti, #cash-slider-Ziraat, #cash-slider-Isbank').on('mouseup touchend', function () {
        var self = this

        setTimeout(function () {
            $(self).removeClass('down')
        }, 100)
    })

    var list = ['Ppasa', 'Garanti', 'Ziraat', 'Isbank']

    window.sliderInterval = setInterval(function () {
        for (var i in list) {
            try {
                if ($('#cash-slider-' + list[i]).hasClass('active') || $('#cash-slider-' + list[i]).hasClass('down')) {
                    var x = window[list[i]].getValue()[0]
                    var inputCash = $("input[name='cash" + list[i] + "']");
                    var minCash = parseInt(inputCash.attr("data-min"));
                    var maxCash = parseInt(inputCash.attr("data-max"));
                    var stepCash = maxCash - minCash;
                    inputCash.val(money((Math.round(x * stepCash)) + minCash));
                }
            } catch (e) {
            }
        }
    }, 100)

    $('input[name=pricePpasa], input[name=priceGaranti], input[name=priceZiraat], input[name=priceIsbank]').keyup(function () {
        var self = this
        var val = $(this).val()
        var name = $(this).attr('name').replace('price', '').trim()

        var f = 0.20;

        // if($(this).attr('name') == 'pricePpasa' || $(this).attr('name') == 'priceZiraat'){
        // 	f = 0.35;
        // }else{
        // 	f = 0.20;
        // }

        $(this).parent().parent().find('input').eq(1).attr('data-min', (parseInt(val.replace(/,/g, '')) * f).toString().replace(/,/, ''))

        $(this).parent().parent().find('input').eq(1).attr('data-max', $(this).val().replace(/,/g, ''))

        val = val.split('.')[0].replace(/[,.]/g, '')

        $(this).parent().parent().find('input').eq(1).autoNumeric('set', val == '' ? 0 : Math.ceil(parseInt(val) * f).toFixed())
        ppasa.form.labelRefresh();
    })

    var money = function money(num) {
        var _ = num.toString().split('').reverse(),
            n = [];

        for (var i = 0; i < Math.ceil(_.length / 3); i++) {
            n = n.concat(_.slice(i * 3, i * 3 + 3), ",");
        }

        n.pop();

        return n.reverse().join('');
    };

    var keyUpTimer = null;

    $("body").off("keyup", "input[name=cashPpasa], input[name=cashGaranti], input[name=cashZiraat], input[name=cashIsbank]").on("keyup", "input[name=cashPpasa], input[name=cashGaranti], input[name=cashZiraat], input[name=cashIsbank]", function () {
        var self = $(this);
        var parent = self.closest(".form");
        var price = $("input:first", parent).val();
        var f = null;

        if ($(this).attr('name') == 'pricePpasa' || $(this).attr('name') == 'priceGaranti') {
            f = 0.35;
        } else {
            f = 0.20;
        }

        //peşinat min max işlemi
        clearTimeout(keyUpTimer);
        keyUpTimer = setTimeout(function () {
            var val = self.val();
            price = parseInt(price.split('.')[0].replace(/[,.]/g, ''));
            val = parseInt(val.split('.')[0].replace(/[,.]/g, ''));
            minPrice = parseInt(self.attr('data-min'));
            maxPrice = parseInt(self.attr('data-max'));

            // %50 peşinat Piyalepaşa işlemi
            if (self.attr('name') == 'cashPpasa' && (price / 2) <= val) {

                $('input[name=maturityPpasa]').attr('data-max', 36);
                ppasa.form.init(true);
                self.val(val);
            } else if (self.attr('name') == 'cashPpasa' && (price / 2) > val) {

                $('input[name=maturityPpasa]').attr('data-max', 24);
                ppasa.form.init(true);
                self.val(val);
            }

        }, 700);

    });

    $('input[name=maturityPpasa]').keyup(function () {
        var self = $(this);

        var price = $('input[name=pricePpasa]').val().replace(/[,.]/g, '');
        var cash = $('input[name=cashPpasa]').val().replace(/[,.]/g, '');
        var maturity = parseInt(self.val());
        var maxMaturity = parseInt(self.attr('data-max'));
        var minMaturity = parseInt(self.attr('data-min'));

        if (maturity > maxMaturity) {
            self.val(maxMaturity);
        }

        self.parent().parent().find('.inf strong').text("0,00 %");
        // if (maturity > 24 && maturity <= 36 && (price/2) > cash) {
        // 	$(this).parent().parent().find('.inf strong').text("0,3 %")
        // } else if(maturity <= 36 && (price/2) >= cash) {
        // 	$(this).parent().parent().find('.inf strong').text("0,00 %")
        // }else if(maturity >= 36 && maturity <= 48) {
        // 	$(this).parent().parent().find('.inf strong').text("0,45 %")
        // } else {
        // 	$(this).parent().find('.inf strong').text("0,00 %")
        // }
    })

    $('input[name=maturityZiraat], input[name=maturityIsbank]').keyup(function () {
        var self = $(this);
        var maturity = parseInt(self.val())
        var maxMaturity = parseInt(self.attr('data-max'))
        var minMaturity = parseInt(self.attr('data-min'))

        if (maturity > maxMaturity) {
            self.val(maxMaturity)
        }

        if (maturity > 0 && maturity <= 48) {
            self.parent().parent().find('.inf strong').text("0,00 %")
        } else if (maturity >= 49 && maturity <= 60) {
            self.parent().parent().find('.inf strong').text("0,20 %")
        } else if (maturity >= 61 && maturity <= 72) {
            self.parent().parent().find('.inf strong').text("0,35 %")
        } else if (maturity >= 73 && maturity <= 84) {
            self.parent().parent().find('.inf strong').text("0,45 %")
        } else if (maturity >= 85 && maturity <= 96) {
            self.parent().parent().find('.inf strong').text("0,50 %")
        } else if (maturity >= 97 && maturity <= 108) {
            self.parent().parent().find('.inf strong').text("0,57 %")
        } else if (maturity >= 109 && maturity <= 120) {
            self.parent().parent().find('.inf strong').text("0,98 %")
        } else {
            self.parent().find('.inf strong').text("0,00 %")
        }
    })
    $('input[name=maturityGaranti]').keyup(function () {
        var self = $(this);
        var maturity = parseInt(self.val())
        var maxMaturity = parseInt(self.attr('data-max'))
        var minMaturity = parseInt(self.attr('data-min'))

        if (maturity > maxMaturity) {
            self.val(maxMaturity)
        }

        if (maturity > 0 && maturity <= 48) {
            self.parent().parent().find('.inf strong').text("0,00 %")
        } else if (maturity >= 49 && maturity <= 60) {
            self.parent().parent().find('.inf strong').text("0,20 %")
        } else if (maturity >= 61 && maturity <= 72) {
            self.parent().parent().find('.inf strong').text("0,35 %")
        } else if (maturity >= 73 && maturity <= 84) {
            self.parent().parent().find('.inf strong').text("0,45 %")
        } else if (maturity >= 85 && maturity <= 96) {
            self.parent().parent().find('.inf strong').text("0,50 %")
        } else if (maturity >= 97 && maturity <= 108) {
            self.parent().parent().find('.inf strong').text("0,57 %")
        } else if (maturity >= 109 && maturity <= 120) {
            self.parent().parent().find('.inf strong').text("0,98 %")
        } else {
            self.parent().find('.inf strong').text("0,00 %")
        }
    })

    setInterval(function () {
        for (var i in list) {
            switch (list[i]) {
                case 'maturityPpasa':
                    var maturity = $('input[name=maturityPpasa]').val()
                    var price = $('input[name=pricePpasa]').val().replace(/[,.]/g, '');
                    var cash = $('input[name=cashPpasa]').val().replace(/[,.]/g, '');

                    $(this).parent().parent().find('.inf strong').text("0,00 %")

                    // if (maturity > 24 && maturity <= 36 && (price/2) > cash) {
                    // 	$(this).parent().parent().find('.inf strong').text("0,3 %")
                    // } else if(maturity <= 36 && (price/2) >= cash) {
                    // 	$(this).parent().parent().find('.inf strong').text("0,00 %")
                    // } else if(maturity >= 36 && maturity <= 48) {
                    // 	$(this).parent().parent().find('.inf strong').text("0,45 %")
                    // } else {
                    // 	$(this).parent().find('.inf strong').text("0,00 %")
                    // }
                    break
                case 'maturityGaranti':
                    var maturity = $('input[name=maturityGaranti]').val()

                    if (maturity > 0 && maturity <= 48) {
                        $(this).parent().parent().find('.inf strong').text("0,00 %")
                    } else if (maturity >= 49 && maturity <= 60) {
                        $(this).parent().parent().find('.inf strong').text("0,20 %")
                    } else if (maturity >= 61 && maturity <= 72) {
                        $(this).parent().parent().find('.inf strong').text("0,35 %")
                    } else if (maturity >= 73 && maturity <= 84) {
                        $(this).parent().parent().find('.inf strong').text("0,45 %")
                    } else if (maturity >= 85 && maturity <= 96) {
                        $(this).parent().parent().find('.inf strong').text("0,50 %")
                    } else if (maturity >= 97 && maturity <= 108) {
                        $(this).parent().parent().find('.inf strong').text("0,57 %")
                    } else if (maturity >= 109 && maturity <= 120) {
                        $(this).parent().parent().find('.inf strong').text("0,98 %")
                    } else {
                        $(this).parent().find('.inf strong').text("0,00 %")
                    }

                    break
                case 'maturityIsbank':
                    var maturity = $('input[name=maturityIsbank]').val()

                    if (maturity > 0 && maturity <= 48) {
                        $(this).parent().parent().find('.inf strong').text("0,00 %")
                    } else if (maturity >= 49 && maturity <= 60) {
                        $(this).parent().parent().find('.inf strong').text("0,20 %")
                    } else if (maturity >= 61 && maturity <= 72) {
                        $(this).parent().parent().find('.inf strong').text("0,35 %")
                    } else if (maturity >= 73 && maturity <= 84) {
                        $(this).parent().parent().find('.inf strong').text("0,45 %")
                    } else if (maturity >= 85 && maturity <= 96) {
                        $(this).parent().parent().find('.inf strong').text("0,50 %")
                    } else if (maturity >= 97 && maturity <= 108) {
                        $(this).parent().parent().find('.inf strong').text("0,57 %")
                    } else if (maturity >= 109 && maturity <= 120) {
                        $(this).parent().parent().find('.inf strong').text("0,98 %")
                    } else {
                        $(this).parent().find('.inf strong').text("0,00 %")
                    }
                    break
                case 'maturityZiraat':
                    var maturity = $('input[name=maturityZiraat]').val()

                    if (maturity > 0 && maturity <= 48) {
                        $(this).parent().parent().find('.inf strong').text("0,00 %")
                    } else if (maturity >= 49 && maturity <= 60) {
                        $(this).parent().parent().find('.inf strong').text("0,20 %")
                    } else if (maturity >= 61 && maturity <= 72) {
                        $(this).parent().parent().find('.inf strong').text("0,35 %")
                    } else if (maturity >= 73 && maturity <= 84) {
                        $(this).parent().parent().find('.inf strong').text("0,45 %")
                    } else if (maturity >= 85 && maturity <= 96) {
                        $(this).parent().parent().find('.inf strong').text("0,50 %")
                    } else if (maturity >= 97 && maturity <= 108) {
                        $(this).parent().parent().find('.inf strong').text("0,57 %")
                    } else if (maturity >= 109 && maturity <= 120) {
                        $(this).parent().parent().find('.inf strong').text("0,98 %")
                    } else {
                        $(this).parent().find('.inf strong').text("0,00 %")
                    }
                    break
            }
        }
    }, 100)

    setTimeout(function () {
        $('.money').focus(function () {
            if ($(this).val() == 0)
                $(this).val('')
        })
    }, 10)

    $('.money').autoNumeric('init')

    $('#maturity-slider-Ppasa').on('mousemove touchmove', function () {
        var maturity = $(this).parent().parent().find('input').eq(2).val()
        var price = $('input[name=pricePpasa]').val().replace(/[,.]/g, '');
        var cash = $('input[name=cashPpasa]').val().replace(/[,.]/g, '');

        $(this).parent().parent().find('.inf strong').text("0,00 %");
        //if (maturity > 24 && maturity <= 36 && (price/2) > cash) {
        // 	$(this).parent().find('.inf strong').text("0,3 %")
        // } else if(maturity <= 36 && (price/2) >= cash) {
        // 	$(this).parent().parent().find('.inf strong').text("0,00 %")
        // } else if(maturity >= 36 && maturity <= 48) {
        // 	$(this).parent().find('.inf strong').text("0,45 %")
        // } else {
        // 	$(this).parent().find('.inf strong').text("0,00 %")
        // }
    })

    $('#maturity-slider-Isbank, #maturity-slider-Ziraat ').on('mousemove touchmove', function () {
        var maturity = $(this).parent().parent().find('input').eq(2).val()

        if (maturity > 0 && maturity <= 48) {
            $(this).parent().find('.inf strong').text("0,00 %")
        } else if (maturity >= 49 && maturity <= 60) {
            $(this).parent().find('.inf strong').text("0,20 %")
        } else if (maturity >= 61 && maturity <= 72) {
            $(this).parent().parent().find('.inf strong').text("0,35 %")
        } else if (maturity >= 73 && maturity <= 84) {
            $(this).parent().find('.inf strong').text("0,45 %")
        } else if (maturity >= 85 && maturity <= 96) {
            $(this).parent().parent().find('.inf strong').text("0,50 %")
        } else if (maturity >= 97 && maturity <= 108) {
            $(this).parent().find('.inf strong').text("0,57 %")
        } else if (maturity >= 109 && maturity <= 120) {
            $(this).parent().find('.inf strong').text("0,98 %")
        } else {
            $(this).parent().find('.inf strong').text("0,00 %")
        }
    })
    $('#maturity-slider-Garanti').on('mousemove touchmove', function () {
        var maturity = $(this).parent().parent().find('input').eq(2).val()

        if (maturity > 0 && maturity <= 48) {
            $(this).parent().find('.inf strong').text("0,00 %")
        } else if (maturity >= 49 && maturity <= 60) {
            $(this).parent().find('.inf strong').text("0,20 %")
        } else if (maturity >= 61 && maturity <= 72) {
            $(this).parent().parent().find('.inf strong').text("0,35 %")
        } else if (maturity >= 73 && maturity <= 84) {
            $(this).parent().find('.inf strong').text("0,45 %")
        } else if (maturity >= 85 && maturity <= 96) {
            $(this).parent().parent().find('.inf strong').text("0,50 %")
        } else if (maturity >= 97 && maturity <= 108) {
            $(this).parent().find('.inf strong').text("0,57 %")
        } else if (maturity >= 109 && maturity <= 120) {
            $(this).parent().find('.inf strong').text("0,98 %")
        } else {
            $(this).parent().find('.inf strong').text("0,00 %")
        }
    })

    var span = function (num) {
        return "<span class='numeric'>" + num + "</span>"
    }

    var jsonGET = function jsonGET(json) {
        var _ = "";
        for (var i in json) {
            _ += i + '=' + json[i] + '&';
        }

        if (_.split('').reverse()[0] == '&') {
            _ = _.split('');
            _.pop();
            _ = _.join('');
        }

        return _;
    }

    $('#form-kredi-ppasa, #form-kredi-garanti, #form-kredi-ziraat, #form-kredi-isbank').submit(function () {
        var success = $(this).parent().find('.success-content');
        var payment = success.find('.payment-table .t-table');
        success.find('.icon-print').click(function () {
            window.print()
        });
        var price = success.parent().parent().find('form').find('input').eq(0).val().replace(/[,.]/g, ''),
            cash = success.parent().parent().find('form').find('input').eq(1).val().replace(/[,.]/g, ''),
            matur = success.parent().parent().find('form').find('input').eq(2).val(),
            inf = success.parent().parent().find('form').find('.inf strong').text().split(' ')[0];

        var formId = success.parent().parent().attr('id');

        var total = parseInt(price) + parseInt(price) * 0.01;
        var rate = parseFloat(inf.replace(',', '.')) * 0.01;
        var amount = parseInt(price) - parseInt(cash);
        var debt = amount;
        var tableDebt = amount;
        var maturity = parseInt(matur);
        var fiveHundredKey = 500000;
        var oneM = 1000000;

        if (parseInt(cash) == 0 || parseInt(price) == 0 || isNaN(parseInt(cash)) === true || isNaN(parseInt(price)) === true) {
            $.alert({
                title: 'UYARI !',
                content: 'Evin fiyatı veya peşinat girilmedi lütfen bilgileri tekrar kontrol ediniz.',
            });
            return false;
        }

        if (formId == 'kredi-ziraat') {
            /* >= 500K TL Kredi */
            if (amount >= fiveHundredKey) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Ziraat Bankası ' + fiveHundredKey + ' TL \'ye kadar kredi sağlamaktadır.'
                });
                return false;
            }
        }
        if (formId == 'kredi-garanti') {
            /* >= 1M TL Kredi */
            if (amount >= oneM) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Garanti Bankası ' + oneM + ' TL \'ye kadar kredi sağlamaktadır.'
                });
                return false;
            }
        }

        if (formId == 'kredi-ziraat' || formId == 'kredi-isbank') {
            // uyarı ver eger 60 ayın altında ve pesinat %5 in altındaysa
            if (maturity < 61 && parseInt(cash) < (parseInt(price) * 5) / 100) {
                $.alert({
                    title: 'UYARI !',
                    content: '61 ay vade altında seçim yaptığınız için %5 altında peşinat giremezsiniz. Minimun girmeniz gereken vade tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 5) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }
            // uyarı ver eger  altındaysa %5 peşin 61- 120 ay
            if (maturity >= 61 && maturity < 121 && parseInt(cash) < (parseInt(price) * 5) / 100) {
                $.alert({
                    title: 'UYARI !',
                    content: '61 - 120 ay vade altında seçim yaptığınız için %5 altında peşinat giremezsiniz. Minimun girmeniz gereken vade tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 5) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }
            if (maturity >= 61 && parseInt(cash) > parseInt(price)) {
                $.alert({
                    title: 'UYARI !',

                    content: 'Evin fiyatından fazla peşinat girdiniz. Minimun girmeniz gereken vade tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 5) / 100).format(0, 3, ',') + '</strong>',

                });
                return false;
            }
            //%5 peşin 1-60 ay 0.45 faiz
            if (maturity < 61 && parseInt(cash) > parseInt(price)) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Evin fiyatından fazla peşinat girdiniz. Minimun girmeniz gereken peşinat tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 5) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }

        } else if (formId == 'kredi-garanti') {

            if (parseInt(cash) < (parseInt(price) * 20) / 100) {
                $.alert({
                    title: 'UYARI !',
                    content: '%20 altında peşinat giremezsiniz. Minimun girmeniz gereken vade tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 20) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }

            if (maturity > 61 && parseInt(cash) > parseInt(price)) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Evin fiyatından fazla peşinat girdiniz. Minimun girmeniz gereken vade tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 20) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }

            if (maturity < 61 && parseInt(cash) > parseInt(price)) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Evin fiyatından fazla peşinat girdiniz. Minimun girmeniz gereken peşinat tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 20) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }

            if (maturity >= 61 && maturity < 121 && (parseInt(cash) < (parseInt(price) * 20) / 100)) {
                $.alert({
                    title: 'UYARI !',
                    content: '60 ay vade altında seçim yaptığınız için %20 altında peşinat giremezsiniz. Minimun girmeniz gereken peşinat tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 35) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }

        } else {
            if (parseInt(cash) < (parseInt(price) * 35) / 100) {
                $.alert({
                    title: 'UYARI !',
                    content: '%35 altında peşinat giremezsiniz. Minimun girmeniz gereken peşinat tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 35) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }
            if (parseInt(cash) > parseInt(price)) {
                $.alert({
                    title: 'UYARI !',
                    content: 'Evin fiyatından fazla peşinat girdiniz. Minimun girmeniz gereken peşinat tutarı: </br> </br> <strong style="font-size:20px; font-weight: bold;"> ' + ((parseInt(price) * 35) / 100).format(0, 3, ',') + '</strong>',
                });
                return false;
            }
        }

        $(this).parent().addClass('success')

        if (success.parent().parent().attr('id') == 'kredi-ppasa') {

            rate = 0.00;
            inf = "0,0";
            // if (maturity > 24 && maturity <= 36 && (price/2) > cash) {
            // 	rate = 0.003
            // 	inf   = "0,3"
            // } else if(maturity <= 36 && (price/2) >= cash) {
            // 	rate = 0.00
            // 	inf   = "0,0"
            // } else if(maturity >= 36 && maturity <= 48) {
            // 	rate = 0.0045
            // 	inf   = "0,45"
            // }
        }

        var calculator = function (amount, rate, maturity) {
            return amount * ((rate * Math.pow(1 + rate, maturity)) / (Math.pow(1 + rate, maturity) - 1))
        }

        var hirepurc = null
        var kdv = ((amount + parseInt(cash)) * 0.01);
        if (rate != 0)
            hirepurc = Math.ceil(calculator(amount, rate, maturity))
        else
            hirepurc = Math.ceil(amount / maturity)

        success.find('.right i').eq(0).html(span(cash) + ' TL')
        success.find('.right i').eq(2).html(span(price) + ' TL') //hirepurc * maturity) + parseInt(cash) + kdv
        success.find('.left i').eq(0).html(inf)
        success.find('.left i').eq(1).html(span(hirepurc) + ' TL')
        success.find('.right i').eq(1).html(span(kdv.toFixed()) + ' TL')
        success.find('.left i').eq(2).html(span(price - cash) + ' TL')

        success.find('.left i').eq(3).html(span(parseInt(price) * 0.15) + ' TL')

        payment.find('tr').remove()

        var tr = $('<tr>')

        var expires = []

        for (var i = 0; i < maturity; i++) {

            if (rate != 0) {
                var exp = hirepurc - Math.ceil(debt * rate)

                expires.push(Math.ceil(exp))

                debt -= exp
            } else {
                expires.push(Math.ceil(hirepurc))
            }

        }

        tr.append('<td>Taksit Sayısı</td>' +
            '<td>Taksit Tutarı</td>' +
            '<td>Anapara</td>' +
            '<td>Faiz Tutarı</td>')

        payment.append(tr)

        for (var i = 0; i < parseInt(matur); i++) {
            var trClone = tr.clone()
            trClone.find('td').eq(0).text(i + 1)
            trClone.find('td').eq(1).html(span(hirepurc) + ' TL')
            trClone.find('td').eq(2).html(span(expires[i]) + ' TL')
            trClone.find('td').eq(3).html((span(hirepurc - expires[i])) + ' TL')
            payment.append(trClone)
        }

        $('.numeric').autoNumeric("init");

        $('.numeric').each(function (i, el) {
            $(el).text($(el).text().replace(/\.\d{2,}/, ''))
        })

        $(this).parent().find('.t-header').find('a').eq(2).attr('href', '/export?' + jsonGET({
            type: 'pdf',
            maturity: maturity,
            hirepurc: hirepurc,
            rate: rate,
            debt: tableDebt,
            bank: success.parent().parent().attr('id').replace(/kredi-/, '')
        }))
        $(this).parent().find('.t-header').find('a').eq(1).attr('href', '/export?' + jsonGET({
            type: 'excel',
            maturity: maturity,
            hirepurc: hirepurc,
            rate: rate,
            debt: tableDebt,
            bank: success.parent().parent().attr('id').replace(/kredi-/, '')
        }))

        return false
    });

    var count = 1;
    var dataCount = '0';
    var lang = 'tr';

    var pagination = function () {
        var self = this;
        $(self).unbind('click', pagination);

        $.get('/gallery-posts?count=' + count + '&lang=' + lang, function (data) {
            $('.groupul').append(data);

            ppasa.basicFunctions.modalOpener.init();
            count++;

            if (data.length == 0 || count >= dataCount) {
                $(self).remove();
            } else {
                $(self).bind('click', pagination);
            }

        })
    }

    $('.more').bind('click', pagination)
</script>
<script>
    $('*[google-href]').on('click', function () {
        var data = $(this).attr("google-href");
        ga('send', 'event', data, 'click to ' + data, data);
    });
</script>
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 944312178;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="./www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="./googleads.g.doubleclick.net/pagead/viewthroughconversion/944312178/?value=1&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>

</body>

</html>
