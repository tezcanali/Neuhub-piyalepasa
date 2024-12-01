/**
 * Created by pc on 2/23/2017.
 */
$(document).ready(function () {
    try{

        var visit = "/assets/theme/visit.php?type=visit";
        $.ajax({
            type: "GET",
            url: visit,
            async: false
        });
    }catch (ex){

    }

    $('.whatsapp').on('click', function () {
        var url = "/assets/theme/visit.php?type=whatsapp";
        $.ajax({
            type: "GET",
            url: url,
            async: false
        });
    });


    $(function () {

        var activeIndex = $('.active-tab').index(),
            $contentlis = $('.tabs-content li'),
            $tabslis = $('.tabs li');

        // Show content of active tab on loads
        $contentlis.eq(activeIndex).show();

        $('.tabs').on('click', 'li', function (e) {
            var $current = $(e.currentTarget),
                index = $current.index();

            $tabslis.removeClass('active-tab');
            $current.addClass('active-tab');
            $contentlis.hide().eq(index).show();
        });
    });

    $('nav  a').on('click', function (e) {
        // e.preventDefault();
        e.stopPropagation();
        var link = $(this).attr('href').replace('#', '');
        $('html, body').animate({
            scrollTop: $('#'+link).offset().top
        }, 1000);
    });

       $(window).load(function () {
       $('.loader').fadeOut(300);
   });

    // $(window).scroll(function () {
    //     if ($(window).width() > 768) {
    //         var curentPosition = Math.round($(this).scrollTop());
    //         $('.midground').css({
    //             'transform': 'translate(0px, -' + (curentPosition / 4) + '%)'
    //         });
    //         $('.text').css({
    //             'transform': 'translate(0px, ' + -(curentPosition / 4) + '%)'
    //         });
    //     }
    // });

    var swiper = new Swiper('.featured--sliders .swiper-container', {
        autoplay: 2500,
        speed: 600,
        pagination: '.featured--sliders  .swiper-pagination',
        paginationClickable: true,
//            loop:true,
        effect: 'fade',

    });
    var swiper1 = new Swiper('.tabs-section .hotelApartments  .swiper-container', {
        autoplay: 2500,
        speed: 600,
        // pagination: '.tabs-section  .swiper-pagination',
        paginationClickable: true,
//            loop:true,
//        effect: 'fade',
        nextButton: '.tabs-section  .hotelApartments .swiper-button-next',
        prevButton: '.tabs-section .hotelApartments  .swiper-button-prev'

    });

    var swiper2 = new Swiper('.tabs-section .residenceApartments  .swiper-container', {
        autoplay: 2500,
        speed: 600,
        // pagination: '.tabs-section  .swiper-pagination',
        paginationClickable: true,
//            loop:true,
//        effect: 'fade',
        nextButton: '.tabs-section .residenceApartments  .swiper-button-next',
        prevButton: '.tabs-section  .residenceApartments .swiper-button-prev'

    });

    $('ul.tabs').delegate('li:not(.current)', 'click', function () {
        $(this).addClass('current').siblings().removeClass('current')
            .parents('div').find('div.box').removeClass('visible').eq($(this).index()).addClass('visible')
    })

    var floor1 = new Swiper('.apartments  .swiper-container-m', {
        pagination: '.apartments .pagination',
        paginationClickable: true,
        nextButton: '.apartments  .swiper-button-next',
        prevButton: '.apartments  .swiper-button-prev',
        autoplay: false,
        // simulateTouch: false,
        speed: 200,
        slideClass:'main-slide',
        loop:false,
        slidesPerView: 1,
        // effect: 'fade',
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .apartments .swiper-container-m').find('.main-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }

    });
    var swiperV = new Swiper('.apartments .swiper-container-a', {
        pagination: '.swiper-pagination-a',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
    bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
        var slide = $(' .apartments .swiper-container-a').find('.swiper-slide').eq(index);
        return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
    }
    });   var swiperV = new Swiper('.apartments .swiper-container-b', {
        pagination: '.swiper-pagination-b',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
    bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
        var slide = $(' .apartments .swiper-container-b').find('.swiper-slide').eq(index);
        return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
    }
    });   var swiperV = new Swiper('.apartments .swiper-container-c', {
        pagination: '.swiper-pagination-c',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
    bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
        var slide = $(' .apartments .swiper-container-c').find('.swiper-slide').eq(index);
        return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
    }
    });

    var floor2 = new Swiper('.houses  .swiper-container-m', {
        pagination: ' .houses .pagination',
        paginationClickable: true,
        nextButton: ' .houses  .swiper-button-next',
        prevButton: ' .houses  .swiper-button-prev',
        autoplay: false,
        speed: 200,
        // loop:true,
        // effect: 'fade',
        // simulateTouch: false,
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .houses   .swiper-container-m').find('.main-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }

    });
    var swiperV = new Swiper('.houses .swiper-container-a', {
        pagination: '.swiper-pagination-a',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .houses .swiper-container-a').find('.swiper-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }
    });    var swiperV = new Swiper('.houses .swiper-container-b', {
        pagination: '.swiper-pagination-b',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .houses .swiper-container-b').find('.swiper-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }
    });
    var swiperV = new Swiper('.houses .swiper-container-c', {
        pagination: '.swiper-pagination-c',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .houses .swiper-container-c').find('.swiper-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }
    });
    var swiperV = new Swiper('.houses .swiper-container-d', {
        pagination: '.swiper-pagination-d',
        paginationClickable: true,
        // direction: 'vertical',
        // spaceBetween: 50;
        bulletActiveClass: 'active',
        paginationBulletRender: function (floor, index, className) {
            var slide = $(' .houses .swiper-container-d').find('.swiper-slide').eq(index);
            return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
        }
    });
    // var floor = new Swiper('.offices  .swiper-container', {
    //     pagination: ' .offices .pagination',
    //     paginationClickable: true,
    //     nextButton: ' .offices  .swiper-button-next',
    //     prevButton: ' .offices  .swiper-button-prev',
    //     autoplay: false,
    //     speed: 200,
    //     // loop:true,
    //     // effect: 'fade',
    //     bulletActiveClass: 'active',
    //     paginationBulletRender: function (floor, index, className) {
    //         var slide = $(' .offices   .swiper-container').find('.swiper-slide').eq(index);
    //         return '<span class="' + className + '">' + $(slide).attr('data-plan') + '</span>';
    //     }

    // });

    $(' .floors .pagination').delegate('li', 'click', function (e) {
        var index = $(this).index();
        $('.pagination li').removeClass('active')
        $(this).addClass('active')
        floor.slideTo(index)

    });


    var timer = 0;
    function recheck() {
        var window_top = $(this).scrollTop();
        var window_height = $(this).height();
        var view_port_s = window_top;
        var view_port_e = window_top + window_height;
        if (timer) {
            clearTimeout(timer);
        }
        $('.fly').each(function () {
            var block = $(this);
            var block_top = block.offset().top;
            var block_height = block.height();
            if (block_top < view_port_e) {
                timer = setTimeout(function () {
                    block.addClass('show-block');
                }, 20);
            } else {
                timer = setTimeout(function () {
                    // block.removeClass('show-block');
                }, 100);
            }
        });
    }
    $(function () {
        $(window).scroll(function () {
            recheck();
        });
        $(window).resize(function () {
            recheck();
        });
        recheck();
        // });
    });

});