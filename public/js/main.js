"use strict";

$(document).ready(function () {
    $('.slick-slider').slick({
        infinite: true,
        slidesToShow: 6,
        //количество слайдов, которые выводятся на экране
        slidesToScroll: 6
        //количество слайдов, которые перелистываются за один раз
    });
    $('.top-slider-big-content').slick({
        prevArrow: '.left-arrow-top-slider',
        nextArrow: '.right-arrow-top-slider',
    });
    $('.top-slider-small-left-content').slick({
        prevArrow: '.left-arrow-slider-small-left',
        nextArrow: '.right-arrow-slider-small-left',
    });

    $('.top-slider-small-right-content').slick({
        prevArrow: '.left-arrow-slider-small-right',
        nextArrow: '.right-arrow-slider-small-right',
    });
    $('.sidebar-menu-title').click(function () {
        $(this).toggleClass('in').next().slideToggle();
        $('.sidebar-menu-title').not(this).removeClass('in').next().slideUp();
    });

    $(".filter-tabs li").click(function () {
        if (!$(this).hasClass("filter-active")) {
            let i = $(this).index();
            $(".filter-tabs li.filter-active").removeClass("filter-active");
            $(".goods .filter-active").hide().removeClass("filter-active").addClass("filter-info");
            $(this).addClass("filter-active");
            $($(".goods").children(".filter-info")[i]).fadeIn(1000).addClass("filter-active");
        }
    });

    $(function () {
        $("#slider").slider({
            range: true,
            min: 0,
            max: 210000,
            values: [30000, 194500],
            stop: function (event, ui) {
                $("input#minCost").val($('#slider').slider("values", 0));
                $("input#maxCost").val($('#slider').slider("values", 1));
            },
            slide: function (event, ui) {
                $("input#minCost").val($("#slider").slider("values", 0));
                $("input#maxCost").val($("#slider").slider("values", 1));
            }
        })
        $("input#minCost").change(function () {
            let value1 = $("input#minCost").val();
            let value2 = $("input#maxCost").val();

            if (parseInt(value1) > parseInt(value2)) {
                value1 = value2;
                jQuery("input#minCost").val(value1);
            }
            $("#slider").slider("values", 0, value1);
        });


        $("input#maxCost").change(function () {
            let value1 = $("input#minCost").val();
            let value2 = $("input#maxCost").val();

            if (value2 > 210000) {
                value2 = 210000;
                $("input#maxCost").val(210000)
            }

            if (parseInt(value1) > parseInt(value2)) {
                value2 = value1;
                $("input#maxCost").val(value2);
            }
            $("#slider").slider("values", 1, value2);
        });
    });
});