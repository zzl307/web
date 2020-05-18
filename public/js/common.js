// JavaScript Document
var glmV4 = {
    init: function () {
        var _this = this;
        _this.navSlide();
        _this.bzTabs();
        _this.slideIndex();
    },
    /*navSlide*/
    navSlide: function () {
        var time = null;
        var list = $("#navlist");
        var box = $("#navbox");
        var listli = list.find(".subNav");
        var box_show = function (hei) {
            box.stop().animate({
                height: hei,
            }, 600);
        }
        var box_hide = function () {
            box.stop().animate({
                height: 0,
            }, 400);
        }
        listli.hover(function (e) {
            e.stopPropagation();
            listli.removeClass("on");
            listli.parent().addClass("navBg");
            $(this).addClass("on");
            clearTimeout(time);
            var index = listli.index($(this));
            box.find(".subMenu").hide().eq(index).show();
            if (index > 7) {
                _height = box.find(".subMenu").eq(index).height();
            } else {
                _height = box.find(".subMenu").eq(index).height() + 30;
            }
            box_show(_height);
        }, function () {
            time = setTimeout(function () {
                box.find(".subMenu").hide();
                box_hide();
            }, 50);
            listli.removeClass("on");
            listli.parent().removeClass("navBg");
        });

        box.find(".subMenu").hover(function (e) {
            e.stopPropagation();
            var _index = box.find(".subMenu").index($(this));
            listli.removeClass("on");
            listli.eq(_index).addClass("on");
            listli.parent().addClass("navBg");
            clearTimeout(time);
            $(this).show();
            if (_index > 7) {
                _height = $(this).height();
            } else {
                _height = $(this).height() + 30;
            }
            box_show(_height);
        }, function () {
            time = setTimeout(function () {
                $(this).hide();
                box_hide();
            }, 50);
            listli.removeClass("on");
            listli.parent().removeClass("navBg");
        });
    },
    /*topNavpub+bzTabs*/
    bzTabs: function () {
        /*topNavpub*/
        var topnavArr = [];
        var topnewurl = window.location.pathname;
        console.log(topnewurl);
        $(".topNav a").each(function (i) {
            topnavArr.push($(this).attr("href"));
        })
        for (var i = 0, j = topnavArr.length; i < j; i++) {
            if (topnewurl == topnavArr[i]) {
                $('.topNav a').eq(i).addClass('on').siblings('a').removeClass('on');
            }
        }
        /*bzTabs*/
        $(".bzpicSlide1").slide({
            titCell: ".bzpicHd1",
            mainCell: "ul",
            titOnClassName: 'on',
            autoPage: "<span></span>",
            effect: "leftLoop",
            autoPlay: true,
            interTime: 5000,
            delayTime: 800
        });
        $(".bzpicSlide2").slide({
            titCell: ".bzpicHd2",
            mainCell: "ul",
            titOnClassName: 'on',
            autoPage: "<span></span>",
            effect: "leftLoop",
            autoPlay: true,
            interTime: 6000,
            delayTime: 600
        });

        /*$(".c2zjOline li").eq(0).addClass("active");
        $(".c2zjOline li").each(function(i){
        	$(this).mouseover(function(){
        		$(".c2zjOline li").removeClass("active").eq(i).addClass("active");
        	})
        });	*/
    },
    slideIndex: function () {
        /*banner*/
        $(".anliSlide").slide({
            titCell: ".anlihd span",
            mainCell: ".anlibd",
            prevCell: '.anliPrev',
            nextCell: '.anliNext',
            titOnClassName: 'on',
            autoPage: false,
            effect: "fold",
            autoPlay: false,
            interTime: 5000,
            delayTime: 2000
        });
        $(".ppXushu").slide({
            mainCell: "ul",
            prevCell: '.ppPrev',
            nextCell: '.ppNext',
            effect: "fade",
            autoPlay: false,
            interTime: 5000,
            delayTime: 800
        });
        $(".ppSafe").slide({
            mainCell: "ul",
            prevCell: '.ppPrev',
            nextCell: '.ppNext',
            effect: "fade",
            autoPlay: false,
            interTime: 5000,
            delayTime: 800
        });
        $(".ppshebei").slide({
            mainCell: "ul",
            prevCell: '.ppPrev',
            nextCell: '.ppNext',
            effect: "fade",
            autoPlay: false,
            interTime: 5000,
            delayTime: 800
        });
        $(".ppEnvironment").slide({
            mainCell: "ul",
            prevCell: '.ppPrev',
            nextCell: '.ppNext',
            effect: "fade",
            autoPlay: false,
            interTime: 5000,
            delayTime: 800
        });

        $(".zjhd .zjtabBd li").each(function (i) {
            $(".zjhd .zjtabBd li").slice(i * 9, i * 9 + 9).wrapAll("<ul></ul>");
        });
        $(".zjhd").slide({
            titCell: ".zjtabHd ul",
            mainCell: ".zjtabBd",
            prevCell: '.zjtabPrev',
            nextCell: '.zjtabNext',
            autoPage: true,
            effect: "left",
            autoPlay: false
        });
        $(".zjContent").slide({
            titCell: ".zjhd .zjcicle",
            mainCell: ".zjlists",
            autoPage: false,
            effect: "fold",
            autoPlay: false,
            interTime: 5000,
            delayTime: 600
        });
        $(".bannerSwiper").hover(function () {
            $(this).find(".bannerButton").addClass("on");
        }, function () {
            $(this).find(".bannerButton").removeClass("on");
        });
        var mySwiper = new Swiper('.bannerSwiper', {
            loop: true,
            autoplay: 6000,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            pagination: '.swiper-pagination',
            paginationType: 'progress'
        });

    }
};

$(function () {
    glmV4.init();
})





(function ($) {

    $.fn.imgscroll = function (options) {

        var elements = this;
        var settings = {
            itemName: "a",
            mWidth: "44px",
            mHeight: "44px",
            mTimer: 100,
            direction: "y"
        };

        return elements.each(function () {
            if (options) {
                $.extend(settings, options);
            }
            var ti = settings.mTimer;

            $(this).children("li").each(function (index, element) {
                $(this).find(settings.itemName).hover(function () {
                    $(this).stop(true);
                    if (ti != 0) {
                        $(this).css({
                            "filter": "alpha(opacity=20)",
                            "-moz-opacity": "0.2",
                            "-khtml-opacity": "0.2",
                            "opacity": "0.2"
                        });
                        if (settings.direction == "y")
                            $(this).animate({
                                "margin-top": "-" + settings.mHeight,
                                "filter": "alpha(opacity=100)",
                                "-moz-opacity": "1",
                                "-khtml-opacity": "1",
                                "opacity": "1"
                            }, ti);
                        else
                            $(this).animate({
                                "margin-left": "-" + settings.mHeight,
                                "filter": "alpha(opacity=100)",
                                "-moz-opacity": "1",
                                "-khtml-opacity": "1",
                                "opacity": "1"
                            }, ti);
                    } else
                    if (settings.direction == "y")
                        $(this).css({
                            "margin-top": "-" + settings.mHeight
                        });
                    else
                        $(this).css({
                            "margin-left": "-" + settings.mHeight
                        });
                }, function () {
                    $(this).stop(true);
                    $(this).css({
                        "filter": "alpha(opacity=100)",
                        "-moz-opacity": "1",
                        "-khtml-opacity": "1",
                        "opacity": "1"
                    });
                    if (ti != 0)
                        if (settings.direction == "y")
                            $(this).animate({
                                "margin-top": "0px"
                            }, ti);
                        else
                            $(this).animate({
                                "margin-left": "0px"
                            }, ti);

                    if (settings.direction == "y")
                        $(this).css({
                            "margin-top": "0px"
                        });
                    else
                        $(this).css({
                            "margin-left": "0px"
                        });
                });
            });
        });

    };


    $.fn.bgmove = function (options) {
        var elements = this;
        var settings = {
            bg: "",
            cg: ""
        };

        return elements.each(function () {

            if (options) {
                $.extend(settings, options);
            }
            $(this).hover(function () {
                $(this).find(settings.cg).stop(true);
                $(this).find(settings.bg).stop(true);

                $(this).find(settings.cg).animate({
                    "top": "0px"
                }, 500);
                $(this).find(settings.bg).animate({
                    "left": "-436px"
                }, 500);
            }, function () {
                $(this).find(settings.cg).stop(true);
                $(this).find(settings.bg).stop(true);

                $(this).find(settings.cg).animate({
                    "top": "375px"
                }, 500);
                $(this).find(settings.bg).animate({
                    "left": "0px"
                }, 500);
            });
        });

    };

    $.fn.mytabs = function (options) {
        var elements = this;
        var settings = {
            main: "",
            context: "",
            active: "active",
            afocus: "a"
        };

        return elements.each(function () {

            if (options) {
                $.extend(settings, options);
            }

            function resetTab() {
                $(settings.context + "> div").hide(); //Hide all content
                $(settings.main + " " + settings.afocus).attr("id", ""); //Reset id's   
            }

            function inits() {
                resetTab();

                $(settings.main + " li:first " + (settings.afocus == "a" ? settings.afocus : "")).attr("id", settings.active); // Activate first tab
                $(settings.context + " > div:first").fadeIn(); // Show first tab content

            }
            inits();
            $(this).children("li").each(function (index, element) {
                var _li = $(this),
                    _obj;
                if (settings.afocus == "a")
                    _obj = _li.find("a");
                else
                    _obj = $(this);
                var _id = _obj.attr("name");

                _li.hover(function () {
                    resetTab();

                    _obj.attr("id", settings.active);
                    $(_id).css("display", "block");

                }, function () {

                });

            });
        });

    };

    $.fn.myfocus = function (options) {
        var elements = this;
        var settings = {
            main: "",
            context: ""

        };

        return elements.each(function () {

            if (options) {
                $.extend(settings, options);
            }

            function resetTab() {
                $(settings.context + "> div").hide(); //Hide all content
                $(settings.main + " a").attr("id", ""); //Reset id's   
            }

            function inits() {
                resetTab();
                $(settings.main + " li:first a").attr("id", settings.active); // Activate first tab
                $(settings.context + " > div:first").fadeIn(); // Show first tab content

            }
            inits();
            $(this).children("li").each(function (index, element) {
                var _li = $(this);
                var _obj = _li.find("a");
                var _id = _obj.attr("name");

                _li.hover(function () {
                    resetTab();

                    $(this).find("a").attr("id", settings.active);
                    $(_id).css("display", "block");

                }, function () {

                });

            });
        });

    };
})(jQuery);

$(function () {
    $("#ul1").imgscroll({
        "itemName": "a",
        "mWidth": "44px",
        "mHeight": "44px",
        "mTimer": "0"
    });
    $("#ul2").imgscroll({
        "itemName": "a",
        "mWidth": "85px",
        "mHeight": "85px",
        "mTimer": "20"
    });


    //$("#news").bgmove({"bg":".storey1","cg":".storey2"});
    $("#tabs1").mytabs({
        "main": "#tabs1",
        "context": "#tab1context",
        "afocus": "a"
    });
    //$("#tabs2").mytabs({"main":"#tabs2","context":"#tab2context","afocus":"a"});
    $("#tabs3").mytabs({
        "main": "#tabs3",
        "context": "#tab3context",
        "afocus": "a"
    });

    $("#tabs4").mytabs({
        "main": "#tabs4",
        "context": "#tab4context",
        "afocus": "a"
    });
    $("#tabs5").mytabs({
        "main": "#tabs5",
        "context": "#tab5context",
        "afocus": "a"
    });
    $("#tabst1").mytabs({
        "main": "#tabst1",
        "context": "#tabst1context",
        "afocus": "a"
    });
    $("#tabot1").mytabs({
        "main": "#tabot1",
        "context": "#tabot1context",
        "afocus": "a"
    });
    $("#tabs6").mytabs({
        "main": "#tabs6",
        "context": "#tab6context",
        "afocus": "a"
    });
    $("#tabs7").mytabs({
        "main": "#tabs7",
        "context": "#tab7context",
        "afocus": "a"
    });
    $("#tabs8").mytabs({
        "main": "#tabs8",
        "context": "#tab8context",
        "afocus": "a"
    });
    $("#tabs9").mytabs({
        "main": "#tabs9",
        "context": "#tab9context",
        "afocus": "a"
    });
    $("#tabs10").mytabs({
        "main": "#tabs10",
        "context": "#tab10context",
        "afocus": "a"
    });

});
