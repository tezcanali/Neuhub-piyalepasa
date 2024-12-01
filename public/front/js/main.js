jQuery.fn.outerHTML = function() {
    return (this[0]) ? this[0].outerHTML : ''
};
(function($) {
    $.fn.isOnScreen2 = function(x, y) {
        if (x == null || typeof x == 'undefined') x = 1;
        if (y == null || typeof y == 'undefined') y = 1;
        var win = $(window);
        var viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();
        var height = this.outerHeight();
        var width = this.outerWidth();
        if (!width || !height) {
            return !1
        }
        var bounds = this.offset();
        bounds.right = bounds.left + width;
        bounds.bottom = bounds.top + height;
        var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
        if (!visible) {
            return !1
        }
        var deltas = {
            top: Math.min(1, (bounds.bottom - viewport.top) / height),
            bottom: Math.min(1, (viewport.bottom - bounds.top) / height),
            left: Math.min(1, (bounds.right - viewport.left) / width),
            right: Math.min(1, (viewport.right - bounds.left) / width)
        };
        return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y
    }
})(jQuery);
jQuery.fn.isOnScreen = function() {
    var win = $(window);
    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height() / 1.5;
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = (bounds.top + this.outerHeight() / 3);
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom))
};
var ppasa = {
    debug: !1,
    rtime: 0,
    timeout: !1,
    delta: 200,
    currentSection: 0,
    maxSection: 0,
    main: null,
    isMainPage: !1,
    scrollAspect: "none",
    lastScrollTop: 0,
    wHeight: 0,
    wWidth: 0,
    scroller: !1,
    establishmentMask: null,
    establishmentHtml: "",
    footer: null,
    contactMenu: null,
    zoomTout: null,
    landing: !1,
    landingButton: null,
    landingForm: null,
    keyyup: null,
    tns: null,
    fixedMenu: {
        enabled: !1,
        showUpHeight: 0,
    },
    videoOn: !1,
    layout: {
        winInit: function() {
            ppasa.wHeight = $(window).height();
            ppasa.wWidth = $(window).width();
            if ($("#scroller").length && !$("main").hasClass("no-scroller")) {
                ppasa.scroller = !0
            }
            if ($(".fix-menu").length) {
                ppasa.fixedMenu.enabled = !0;
                if ($(".fix-menu").hasClass("small")) {
                    ppasa.fixedMenu.showUpHeight = 150000 / ppasa.wWidth
                } else {
                    ppasa.fixedMenu.showUpHeight = ppasa.wHeight - 200
                }
            }
            if (ppasa.wWidth <= 1024) {
                ppasa.videoOn = !1
            } else {
                ppasa.videoOn = !0
            }
            setTimeout(function() {
                $(window).scroll()
            }, 100)
        },
        init: function() {
            ppasa.main = $("main");
            ppasa.wHeight = $(window).height();
            ppasa.wWidth = $(window).width();
            ppasa.maxSection = $(".section").length;
            ppasa.footer = $("footer");
            ppasa.contactMenu = $(".contact-menu:first");
            ppasa.landingButton = $(".landing .sticky:first");
            ppasa.landingForm = $(".landing .section.type-10");
            if (!ppasa.contactMenu.length) {
                ppasa.contactMenu = !1
            }
            if (ppasa.landingButton.length) {
                ppasa.landing = !0
            } else {
                ppasa.landing = !1
            }
            if ($("main").hasClass("main-page")) {
                ppasa.isMainPage = !0
            }
            $(".section").each(function(i) {
                var self = $(this);
                var imageContainer = $(".image", self);
                if (ppasa.isMainPage) {
                    var initialImage = imageContainer.attr("data-image");
                    imageContainer.append('<img src="' + initialImage + '" alt="Piyalepaşa" />')
                }
                var image = $("img", imageContainer);
                var imageSource = "" + image.attr("src");
                var imageName = imageSource.substring(imageSource.lastIndexOf("/") + 1, imageSource.lastIndexOf("."));
                var imagePath = imageSource.replace('.jpg', '');
                var imageNormalName = imageName + ".jpg";
                var imageMobileName = imageName + "-mobile.jpg";
                var imageVideoName = imageName + "-video.jpg";
                var wWidth = $(window).width();
                imagePath = imagePath.replace(imageName, '');
                imageContainer.attr("data-image", imageSource);
                imageContainer.attr("data-mobile-image", (imagePath + imageMobileName));
                imageContainer.attr("data-video-image", (imagePath + imageVideoName));
                if (wWidth > 1024 && self.hasClass("has-video")) {
                    image.attr("src", (imagePath + imageVideoName))
                } else if (wWidth > 640 && wWidth <= 1024) {
                    image.attr("src", imageSource)
                } else if (wWidth <= 640) {
                    image.attr("src", (imagePath + imageMobileName))
                }
                if (!self.hasClass("no-height") && ppasa.wWidth > 640) {
                    self.height(ppasa.wHeight)
                }
                self.attr("data-section", i)
            });
            $(window).resize(function() {
                ppasa.rtime = new Date();
                if (ppasa.timeout === !1) {
                    ppasa.timeout = !0;
                    setTimeout(ppasa.resizeend, ppasa.delta)
                }
            });
            $(window).scroll(function() {
                if (ppasa.landing) {
                    if (ppasa.landingForm.isOnScreen2(0.1, 0.1)) {
                        ppasa.landingButton.hide()
                    } else {
                        ppasa.landingButton.show()
                    }
                }
                if (ppasa.fixedMenu.enabled) {
                    if ($(window).scrollTop() > ppasa.fixedMenu.showUpHeight) {
                        $(".fix-menu").addClass("animate")
                    } else {
                        $(".fix-menu").removeClass("animate")
                    }
                }
                if (ppasa.scroller && ppasa.wWidth > 640) {
                    if ($(window).scrollTop() > 100) {
                        $("#scroller").removeClass("animate")
                    } else {
                        $("#scroller").addClass("animate")
                    }
                } else {
                    $("#scroller").hide()
                }
                $(".section").each(function() {
                    self = $(this);
                    if (self.isOnScreen()) {
                        var number = parseInt(self.attr("data-section"));
                        ppasa.currentSection = number;
                        if (ppasa.fixedMenu.enabled) {
                            $(".fix-menu a").removeClass("active");
                            $(".fix-menu a[data-href='" + number + "']").addClass("active")
                        }
                        if (ppasa.videoOn) {
                            if (self.hasClass("has-video") && self.find("video").length == 0) {
                                var vidUrl = self.attr("data-vid");
                                $(".image", self).addClass("hide");
                                self.addClass("video-inited");
                                self.prepend('<div class="section-video"><video autoplay muted loop><source src="' + vidUrl + '" type="video/mp4"></video></div>')
                            }
                        }
                    } else {
                        if (ppasa.videoOn) {
                            if (self.hasClass("has-video")) {
                                var $videoElement = $(".section-video video", self);
                                var videoElement = $(".section-video video", self)[0];
                                if ($videoElement.length) {
                                    videoElement.pause();
                                    delete videoElement;
                                    videoElement.src = "";
                                    videoElement.load();
                                    if (typeof videoElement.remove == 'function') {
                                        videoElement.remove()
                                    }
                                    $(".section-video", self).html("");
                                    $(".section-video", self).remove()
                                }
                            }
                            $(".image", self).removeClass("hide");
                            self.removeClass("video-inited")
                        }
                    }
                })
            });
            var hash = window.location.hash;
            hash = hash.replace('_', '');
            hash = hash + "_";
            if (ppasa.debug) {
                console.log("Debug: hash: " + hash)
            }
            if (hash != "_" && $(hash).length) {
                if ($("main").hasClass("gallery-page") || $("main").hasClass("virtual-page")) {
                    $(".tab-links a").removeClass("active");
                    var link = $(".tab-links a[href='" + hash + "']");
                    link.addClass("active");
                    $(".tab-content").hide();
                    $(hash).show();
                    setTimeout(function() {
                        $(window).scrollTop(0)
                    }, 300)
                } else {
                    var href = parseInt($(hash).attr("data-section"));
                    setTimeout(function() {
                        ppasa.layout.goTo(href)
                    }, 400)
                }
            }
            if ($("#establishment-mask").length) {
                ppasa.establishmentHtml = $("#establishment-mask").outerHTML()
            }
            ppasa.layout.establishment()
        },
        establishment: function() {
            if ($("#establishment-mask").length && ppasa.establishmentMask == null && ppasa.wWidth <= 640) {
                ppasa.establishmentMask = new Dragdealer('establishment-mask', {
                    x: 0.5,
                    y: 0.5,
                    vertical: !0,
                    speed: 0.2,
                    loose: !0,
                    requestAnimationFrame: !0
                });
                setTimeout(function() {
                    ppasa.establishmentMask.reflow()
                }, 100)
            } else if ($("#establishment-mask").length && ppasa.establishmentMask != null && ppasa.wWidth > 640) {
                $("#establishment-mask").remove();
                $(".section.type-29").append(ppasa.establishmentHtml);
                ppasa.establishmentMask = null;
                setTimeout(function() {
                    ppasa.basicFunctions.modalOpener.init()
                }, 100)
            }
        },
        resize: function() {
            ppasa.wHeight = $(window).height();
            ppasa.wWidth = $(window).width();
            if ($(".fix-menu").length) {
                if ($(".fix-menu").hasClass("small")) {
                    ppasa.fixedMenu.showUpHeight = 20000 / ppasa.wWidth
                } else {
                    ppasa.fixedMenu.showUpHeight = ppasa.wHeight - 200
                }
            }
            if (ppasa.wWidth > 640) {
                setTimeout(function() {
                    $(".section:not(.no-height)").height(ppasa.wHeight)
                }, 300)
            }
            setTimeout(function() {
                if (ppasa.wWidth > 1024) {
                    ppasa.videoOn = !0;
                    $(window).scroll()
                } else {
                    ppasa.videoOn = !1;
                    $(window).scroll()
                }
            }, 200);
            $(".section").each(function() {
                var self = $(this);
                var imageContainer = $(".image", self);
                if (imageContainer.length) {
                    var image = $("img", imageContainer);
                    var imageNormal = "" + imageContainer.attr("data-image");
                    var imageMobile = "" + imageContainer.attr("data-mobile-image");
                    var imageVideo = "" + imageContainer.attr("data-video-image");
                    if (ppasa.wWidth > 1024 && self.hasClass("has-video")) {
                        image.attr("src", imageVideo)
                    } else if (ppasa.wWidth > 640 && ppasa.wWidth <= 1024) {
                        image.attr("src", imageNormal)
                    } else if (ppasa.wWidth <= 640) {
                        image.attr("src", imageMobile)
                    }
                }
            });
            ppasa.layout.establishment();
            $("body").on("click", ".section.type-14 .pagination li a", function() {
                ppasa.layout.goTo(0)
            });
            $(window).scroll();
            if (ppasa.debug) {
                console.log("Debug: layout yeniden boyutlandırıldı")
            }
        },
        goTo: function(section, force) {
            section = typeof section !== 'undefined' ? section : !1;
            force = typeof force !== 'undefined' ? force : !1;
            if (section == "top" || section == !1) {
                section: 0
            } else if (section == "bottom") {
                section = ppasa.maxSection - 1
            }
            var element = $(".section:eq(" + section + ")");
            if (ppasa.debug) {
                console.log("Debug: scroll başladı")
            }
            if (ppasa.scroller) {
                $("#scroller").removeClass("animate")
            }
            ppasa.main.addClass("scrolling");
            $('html, body').stop(!0).animate({
                scrollTop: (element.offset().top)
            }, 1000, function() {
                ppasa.currentSection = section;
                ppasa.main.removeClass("scrolling");
                if (ppasa.debug) {
                    console.log("Debug: scroll bitti")
                }
                if (ppasa.currentSection == 0) {
                    if (ppasa.scroller) {
                        $("#scroller").addClass("animate")
                    }
                }
            })
        },
    },
    loader: {
        init: function() {
            if (ppasa.debug) {
                console.log('Debug: Loader init edildi')
            }
            var loader = $("body").DEPreLoad({
                OnStep: function(percent) {
                    if (ppasa.debug) {
                        console.log("Debug: %" + percent + ' Yüklendi')
                    }
                    $("#loader span").css("width", (percent + "%"))
                },
                OnComplete: function() {
                    if (ppasa.debug) {
                        console.log('Debug: yükleme tamamlandı')
                    }
                }
            })
        }
    },
    indicator: {
        html: '<div class="cs-loader"><div class="cs-loader-inner"><label>&nbsp;●</label><label>&nbsp;●</label><label>&nbsp;●</label><label>&nbsp;●</label><label>&nbsp;●</label><label>&nbsp;●</label></div></div>',
        show: function(href) {
            var parent = $(href);
            if (parent.length && !$("> .cs-loader", parent).length) {
                var position = parent.css("position");
                if (!(position == "fixed" || position == "relative" || position == "absolute")) {
                    parent.css("position", "relative");
                    parent.attr("data-indicator-position", "true")
                }
                parent.prepend(ppasa.indicator.html);
                return !0
            } else if ($("> .cs-loader", parent).length) {
                if (ppasa.debug) {
                    console.log("indicator hatası: " + href + " elementinde zaten indicator var")
                }
                return !1
            } else {
                if (ppasa.debug) {
                    console.log("indicator hatası: " + href + " diye bir element bulamadım")
                }
            }
        },
        hide: function(href) {
            href = typeof href !== 'undefined' ? href : !1;
            var parent = $(href);
            if (parent.length) {
                $("> .cs-loader", parent).remove();
                if (parent.attr("data-indicator-position") == "true") {
                    parent.css("position", "initial");
                    parent.removeAttr("data-indicator-position")
                }
                return !0
            } else if (href == !1) {
                $(".cs-loader").each(function() {
                    var self = $(this);
                    var parentA = self.parent();
                    if (parentA.attr("data-indicator-position") == "true") {
                        parentA.css("position", "initial");
                        parentA.removeAttr("data-indicator-position")
                    }
                    self.remove()
                });
                return !0
            } else {
                if (ppasa.debug) {
                    console.log("indicator hatası: " + href + " diye bir element bulamadım")
                }
                return !1
            }
        }
    },
    paginateScroll: function(element) {
        var section = element.closest(".section");
        var href = parseInt(section.attr("data-section"));
        ppasa.layout.goTo(href)
    },
    menu: {
        init: function() {
            $("body").off("click", ".menu-toggle").on("click", ".menu-toggle", function() {
                ppasa.menu.toggle()
            });
            $("body").off("click", ".menu-close").on("click", ".menu-close", function() {
                ppasa.menu.toggle(!1)
            });
            $("body").off("click", "#menu > ul > li > a").on("click", "#menu > ul > li a", function() {
                var self = $(this);
                var parent = self.closest("li");
                var ul = $("> ul", parent);
                if (ul.length) {
                    if (parent.hasClass("active")) {
                        $("#menu > ul > li").removeClass("active");
                        $("#menu > ul > li > ul").stop(!0).slideUp("fast")
                    } else {
                        $("#menu > ul > li").removeClass("active");
                        parent.addClass("active");
                        $("#menu > ul > li > ul").stop(!0).slideUp("fast");
                        ul.stop(!0).slideDown("fast")
                    }
                }
            });
            $("body").off("click", "#menu > ul > li > ul > li > a, #footer-menu > ul > li > ul > li > a").on("click", "#menu > ul > li > ul > li > a, #footer-menu > ul > li > ul > li > a", function(e) {
                var self = $(this);
                var href = self.attr("href");
                var hashref = href.substring(href.indexOf("#"));
                if (hashref != href) {
                    var obj = $(hashref + '_');
                    if (obj.length) {
                        var go = parseInt(obj.attr("data-section"));
                        ppasa.menu.toggle(!1);
                        ppasa.layout.goTo(go);
                        e.preventDefault()
                    }
                }
            })
        },
        toggle: function(close) {
            close = typeof close !== 'undefined' ? close : !0;
            if ($("#menu").hasClass("open") || !close) {
                $(".award-ribbon").removeClass('close');
                $("#menu").removeClass("open");
                $(".overlay").stop(!0, !0).fadeOut("fast");
                $("body").removeClass("hide-scroll")
            } else {
                $(".award-ribbon").addClass('close');
                $(window).scrollTop(0);
                $("#menu").addClass("open");
                $(".overlay").stop(!0, !0).fadeIn(500);
                $("body").addClass("hide-scroll");
                $("#menu").innerHeight($(window).innerHeight())
            }
        },
        resize: function() {
            $("#menu").innerHeight($(window).innerHeight())
        },
    },
    tab: {
        init: function() {
            if ($(".tab").length) {
                $(".tab-links a:not(.no-tab-releated)").each(function() {
                    var self = $(this);
                    var parent = self.closest(".tab");
                    if (self.hasClass("active")) {
                        $(".tab-content", parent).hide();
                        $(self.attr("href")).show()
                    }
                });
                $("body").off("click", ".tab-links a:not(.no-tab-releated)").on("click", ".tab-links a:not(.no-tab-releated)", function(e) {
                    var self = $(this);
                    var parent = self.closest(".tab");
                    $(".tab-links a", parent).removeClass("active");
                    self.addClass("active");
                    $(".tab-content", parent).stop(!0, !0).hide();
                    $(self.attr("href")).stop(!0, !0).fadeIn("fast");
                    e.preventDefault()
                })
            }
        }
    },
    plan: {
        init: function() {
            if ($(".plans").length) {
                $("body").off("click", ".selector .links a").on("click", ".selector .links a", function() {
                    var self = $(this);
                    var parent = self.closest(".selector");
                    var href = self.index();
                    $(".links a", parent).removeClass("active");
                    self.addClass("active");
                    $(".tabs .tab", parent).stop(!0, !0).hide();
                    $(".tabs .tab:eq(" + href + ")").stop(!0, !0).fadeIn("fast")
                });
                $("body").off("click", ".selector .tabs .tab a").on("click", ".selector .tabs .tab a", function() {
                    var self = $(this);
                    var parent = self.closest(".selector");
                    var href = self.index();
                    $(".tabs .tab a", parent).removeClass("active");
                    self.addClass("active")
                });
                $(".tabs .tab").stop(!0, !0).hide();
                $(".tabs .tab:first").stop(!0, !0).show()
            }
        },
    },
    form: {
        init: function(type) {
            type = typeof type !== 'undefined' ? type : !1;
            $("body").off("focus", "textarea, input[type='text']").on("focus", "textarea, input[type='text']", function() {
                var self = $(this);
                var parent = self.closest(".form-item");
                parent.addClass("active")
            });
            $("body").off("blur", "textarea, input[type='text']").on("blur", "textarea, input[type='text']", function() {
                var self = $(this);
                var parent = self.closest(".form-item");
                if (self.val() == "") {
                    parent.removeClass("active")
                } else {
                    parent.addClass("active")
                }
            });
            $(".form input, .form textarea").each(function() {
                var self = $(this);
                var parent = self.closest(".form-item");
                if (self.val() != "") {
                    parent.addClass("active")
                } else {
                    parent.removeClass("active")
                }
            });
            if ($("select").length) {
                $("select").each(function() {
                    var self = $(this);
                    var placeholder = self.attr("data-placeholder");
                    var check = !!placeholder;
                    if (check) {
                        self.selectBoxIt({
                            defaultText: placeholder,
                            native: !0
                        })
                    } else {
                        self.selectBoxIt({
                            native: !0
                        })
                    }
                })
            }
            if ($("#cash-slider-Ppasa").length) {
                var inputCashPpasa = $("input[name='cashPpasa']");
                var minCashPpasa = parseInt(inputCashPpasa.attr("data-min"));
                var maxCashPpasa = parseInt(inputCashPpasa.attr("data-max"));
                var stepCashPpasa = maxCashPpasa - minCashPpasa;
                var cashSliderPpasa = new Dragdealer('cash-slider-Ppasa', {
                    steps: stepCashPpasa,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputCashPpasa.val((Math.floor(x * stepCashPpasa)) + minCashPpasa)
                    },
                });
                setTimeout(function() {
                    cashSliderPpasa.reflow()
                }, 100);
                inputCashPpasa.change(function() {
                    cashSliderPpasa.options.steps = inputCashPpasa.val()
                })
            }
            if ($("#maturity-slider-Ppasa").length) {
                var inputMaturityPpasa = $("input[name='maturityPpasa']");
                var minMaturityPpasa = parseInt(inputMaturityPpasa.attr("data-min"));
                var maxMaturityPpasa = parseInt(inputMaturityPpasa.attr("data-max"));
                var stepMaturityPpasa = maxMaturityPpasa - minMaturityPpasa;
                var maturitySliderPpasa = new Dragdealer('maturity-slider-Ppasa', {
                    steps: stepMaturityPpasa,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputMaturityPpasa.val((Math.floor(x * stepMaturityPpasa)) + minMaturityPpasa)
                    },
                });
                setTimeout(function() {
                    maturitySliderPpasa.reflow()
                }, 100)
            }
            if ($("#cash-slider-Garanti").length) {
                var inputCashGaranti = $("input[name='cashGaranti']");
                var minCashGaranti = parseInt(inputCashGaranti.attr("data-min"));
                var maxCashGaranti = parseInt(inputCashGaranti.attr("data-max"));
                var stepCashGaranti = maxCashGaranti - minCashGaranti;
                var cashSliderGaranti = new Dragdealer('cash-slider-Garanti', {
                    steps: stepCashGaranti,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputCashGaranti.val((Math.floor(x * stepCashGaranti)) + minCashGaranti)
                    },
                });
                setTimeout(function() {
                    cashSliderGaranti.reflow()
                }, 100)
            }
            if ($("#maturity-slider-Garanti").length) {
                var inputMaturityGaranti = $("input[name='maturityGaranti']");
                var minMaturityGaranti = parseInt(inputMaturityGaranti.attr("data-min"));
                var maxMaturityGaranti = parseInt(inputMaturityGaranti.attr("data-max"));
                var stepMaturityGaranti = maxMaturityGaranti - minMaturityGaranti;
                var maturitySliderGaranti = new Dragdealer('maturity-slider-Garanti', {
                    steps: stepMaturityGaranti,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputMaturityGaranti.val((Math.floor(x * stepMaturityGaranti)) + minMaturityGaranti)
                    },
                });
                setTimeout(function() {
                    maturitySliderGaranti.reflow()
                }, 100)
            }
            if ($("#maturity-slider-Isbank").length) {
                var inputMaturityIsbank = $("input[name='maturityIsbank']");
                var minMaturityIsbank = parseInt(inputMaturityIsbank.attr("data-min"));
                var maxMaturityIsbank = parseInt(inputMaturityIsbank.attr("data-max"));
                var stepMaturityIsbank = maxMaturityIsbank - minMaturityIsbank;
                var maturitySliderIsbank = new Dragdealer('maturity-slider-Isbank', {
                    steps: stepMaturityIsbank,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputMaturityIsbank.val((Math.floor(x * stepMaturityIsbank)) + minMaturityIsbank)
                    },
                });
                setTimeout(function() {
                    maturitySliderIsbank.reflow()
                }, 100)
            }
            if ($("#cash-slider-Ziraat").length) {
                var inputCashZiraat = $("input[name='cashZiraat']");
                var minCashZiraat = parseInt(inputCashZiraat.attr("data-min"));
                var maxCashZiraat = parseInt(inputCashZiraat.attr("data-max"));
                var stepCashZiraat = maxCashZiraat - minCashZiraat;
                var cashSliderZiraat = new Dragdealer('cash-slider-Ziraat', {
                    steps: stepCashZiraat,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputCashZiraat.val((Math.floor(x * stepCashZiraat)) + minCashZiraat)
                    },
                });
                setTimeout(function() {
                    cashSliderZiraat.reflow()
                }, 100)
            }
            if ($("#maturity-slider-Ziraat").length) {
                var inputMaturityZiraat = $("input[name='maturityZiraat']");
                var minMaturityZiraat = parseInt(inputMaturityZiraat.attr("data-min"));
                var maxMaturityZiraat = parseInt(inputMaturityZiraat.attr("data-max"));
                var stepMaturityZiraat = maxMaturityZiraat - minMaturityZiraat;
                var maturitySliderZiraat = new Dragdealer('maturity-slider-Ziraat', {
                    steps: stepMaturityZiraat,
                    snap: !0,
                    animationCallback: function(x, y) {
                        inputMaturityZiraat.val((Math.floor(x * stepMaturityZiraat)) + minMaturityZiraat)
                    },
                });
                setTimeout(function() {
                    maturitySliderZiraat.reflow()
                }, 100)
            }
            if (!type) {
                if ($(".section.type-30").length) {
                    $(".section.type-30 input").each(function() {
                        var self = $(this);
                        self.focus();
                        $(window).scrollTop(0);
                        self.blur()
                    })
                }
                setTimeout(function() {
                    $(".type-30-loader").fadeOut("fast")
                }, 300)
            }
        },
        labelRefresh: function() {
            $(".form input, .form textarea").each(function() {
                var self = $(this);
                var parent = self.closest(".form-item");
                if (self.val() != "") {
                    parent.addClass("active")
                } else {
                    parent.removeClass("active")
                }
            })
        },
        creditSuccess: function(id) {
            var form = $(id);
            if (form.length) {
                var parent = form.closest(".tab-content");
                parent.addClass("success")
            }
        }
    },
    basicFunctions: {
        goTo: {
            init: function() {
                $("body").off("click", ".go-to").on("click", ".go-to", function() {
                    var href = parseInt($(this).attr("data-href"));
                    ppasa.layout.goTo(href)
                });
                $("body").off("click", ".go-to-element").on("click", ".go-to-element", function(e) {
                    var self = $(this);
                    var href = $(self.attr("href"));
                    if (href.length) {
                        ppasa.main.addClass("scrolling");
                        $('html, body').stop(!0).animate({
                            scrollTop: (href.offset().top)
                        }, 1000, function() {
                            ppasa.main.removeClass("scrolling")
                        })
                    } else {
                        if (ppasa.debug) {
                            console.log("Hedef elementi bulamadım")
                        }
                    }
                    e.preventDefault()
                })
            }
        },
        printImage: {
            init: function() {
                $("body").off("click", ".print-image").on("click", ".print-image", function(e) {
                    var self = $(this);
                    var imageSource = self.attr("href");
                    var popup;
                    var html = '<!DOCTYPE html><html lang="tr"><head><title>Piyalepaşa</title></head><body><img src="' + imageSource + '" onload="window.print();" alt="" /></body></html>';

                    function closePrint() {
                        if (popup) {
                            popup.close()
                        }
                    }
                    popup = window.open('', '', 'width=500,height=500');
                    popup.document.open()
                    popup.document.write(html);
                    popup.onbeforeunload = closePrint;
                    popup.onafterprint = closePrint;
                    popup.focus();
                    e.preventDefault()
                })
            },
        },
        showHide: {
            init: function() {
                if ($(".basic-function-show").length) {
                    $(".basic-function-show").each(function() {
                        var href = $($(this).attr("data-href"));
                        if ($(this).hasClass("active")) {
                            href.show()
                        } else {
                            href.hide()
                        }
                    });
                    $(".basic-function-show").click(function(e) {
                        var href = $($(this).attr("data-href"));
                        if ($(this).hasClass("active")) {
                            $(this).removeClass("active")
                            href.stop(!0, !0).fadeOut("fast")
                        } else {
                            $(this).addClass("active")
                            href.stop(!0, !0).fadeIn("fast")
                        }
                        e.preventDefault()
                    })
                }
            }
        },
        modalOpener: {
            init: function() {
                if ($(".modal-open").length) {
                    $(".modal-open").each(function() {
                        var self = $(this);
                        if (self.hasClass("img")) {
                            self.magnificPopup({
                                type: 'image',
                                closeOnContentClick: !0,
                                removalDelay: 160,
                                mainClass: 'mfp-fade',
                                fixedContentPos: !0
                            })
                        } else if (self.hasClass("vid")) {
                            self.magnificPopup({
                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: !1,
                                fixedContentPos: !0,
                                callbacks: {
                                    close: function() {
                                        if ($('video').length) {
                                            $('video').stop();
                                            $('video').load()
                                        }
                                    }
                                }
                            })
                        } else if (self.hasClass("vid-mp4")) {
                            var id = self.parent().index();
                            var vid = self.attr("href");
                            var id_ = "#vid-" + id;
                            self.attr("data-href", id_);
                            $("#modals").append('<div id="vid-' + id + '" class="vid-modal modal"></div>');
                            self.click(function(e) {
                                if (!$(id_).hasClass("inited")) {
                                    $(id_).append('<video width="100%" height="auto" controls autoplay><source src="' + vid + '" type="video/mp4"></video>');
                                    $(id_).addClass("inited")
                                }
                                $.magnificPopup.open({
                                    items: {
                                        src: id_,
                                        type: 'inline'
                                    },
                                    mainClass: 'mfp-fade',
                                    removalDelay: 160,
                                    fixedContentPos: !0,
                                });
                                e.preventDefault()
                            })
                        } else if (self.hasClass("est")) {
                            var id = "pin-modal-" + self.index();
                            self.attr("data-href", ("#" + id));
                            $("#modals").append('<div id="' + id + '" class="pin-modal modal"></div>');
                            $("body").off("click", ".modal-open.est").on("click", ".modal-open.est", function() {
                                var self = $(this);
                                var dataText = self.attr("data-types");
                                if (dataText != "") {
                                    var data = self.attr("data-types").split(',')
                                } else {
                                    var data = 0
                                }
                                var length = data.length;
                                var inner = "";
                                if (length > 0) {
                                    inner = "<ul>";
                                    for (i = 0; i < length; i++) {
                                        inner += '<li><a href="javascript:;" class="button inverted plan-link modal-close go-to" data-href="1">' + data[i] + '</a></li>'
                                    }
                                    inner += "</ul>"
                                    $("#" + id).html(inner);
                                    $.magnificPopup.open({
                                        items: {
                                            src: ('#' + id),
                                            type: 'inline'
                                        },
                                        mainClass: 'mfp-fade',
                                        removalDelay: 160,
                                        fixedContentPos: !0,
                                    })
                                }
                            })
                        } else {
                            self.magnificPopup({
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                fixedContentPos: !0,
                            })
                        }
                    })
                }
                if ($(".news").length) {
                    $('.news ul li').not('.pagination li').each(function() {
                        $(this).magnificPopup({
                            delegate: 'a',
                            type: 'image',
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            gallery: {
                                enabled: !0
                            }
                        })
                    })
                }
                if ($(".gallery-image").length) {
                    $('.gallery-image').each(function() {
                        $(this).magnificPopup({
                            delegate: 'a',
                            type: 'image',
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            gallery: {
                                enabled: !0
                            }
                        })
                    })
                }
                $("body").off("click", ".zoom-open").on("click", ".zoom-open", function(e) {
                    clearTimeout(ppasa.zoomTout);
                    var self = $(this);
                    if (self.hasClass("zoom-gallery")) {
                        self.addClass("active");
                        var slider = null;
                        var index = 0;
                        if (self.hasClass("construct-img")) {
                            var slideCont = self.closest("ul")
                        } else if (self.hasClass("press-image")) {
                            var slideCont = self.closest("ul")
                        } else {
                            var slideCont = self.closest(".rsContainer")
                        }
                        var html = '<div class="tns"><div class="sliderHolder" data-elem="sliderHolder"><div class="slider" data-elem="slider" data-options="" data-show="" data-hide=""><div class="slides" data-elem="slides" data-options="preloaderUrl:/assets/images/plugins/tns/preloader.gif;"></div><div class="zoomInIcon" data-elem="zoomIn" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div><div class="zoomOutIcon" data-elem="zoomOut" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div><div class="nav prev" data-elem="prev" data-on="" data-off=""> </div><div class="nav next" data-elem="next" data-on="" data-off=""> </div><ul data-elem="items">';
                        ppasa.keyyup = function(e, slider) {
                            if (e.which == 39) {
                                ppasa.tns.next(!0)
                            } else if (e.which == 37) {
                                ppasa.tns.prev(!0)
                            }
                        };
                        $("a.zoom-open", slideCont).each(function(i) {
                            var selfie = $(this);
                            if (selfie.hasClass("active")) {
                                index = i
                            }
                            var image = selfie.attr("href");
                            html += '<li><img src="' + image + '" /></li>'
                        });
                        html += '</ul></div></div></div>';
                        $("#zoom-modal").html("");
                        $("a.zoom-open", slideCont).removeClass("active");
                        $("#zoom-modal").append(html);
                        ppasa.zoomTout = setTimeout(function() {
                            $.magnificPopup.open({
                                items: {
                                    src: "#zoom-modal",
                                    type: 'inline'
                                },
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                callbacks: {
                                    open: function() {
                                        $(TouchNSwipe.init);
                                        ppasa.tns = TouchNSwipe.getSlider(0);
                                        ppasa.tns.index(index);
                                        if (self.hasClass("with-print")) {
                                            var button = '<a href="' + image + '" class="printIcon print-image"></a>';
                                            $("#zoom-modal .tns .sliderHolder .slider").append(button)
                                        }
                                        $(document).bind("keyup", ppasa.keyyup)
                                    },
                                    close: function() {
                                        $(TouchNSwipe.removeAll);
                                        $(document).unbind("keyup", ppasa.keyyup)
                                    }
                                }
                            })
                        }, 100)
                    } else {
                        var image = self.attr("href");
                        var html = '<div class="tns"><div class="sliderHolder" data-elem="sliderHolder"><div class="slider" data-elem="slider" data-options="" data-show="" data-hide=""><div class="slides" data-elem="slides" data-options="preloaderUrl:/assets/images/plugins/tns/preloader.gif;"></div><div class="zoomInIcon" data-elem="zoomIn" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div><div class="zoomOutIcon" data-elem="zoomOut" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div><ul data-elem="items"><li><img src="' + image + '" /></li></ul></div></div></div>';
                        $("#zoom-modal").html("");
                        $("#zoom-modal").append(html);
                        ppasa.zoomTout = setTimeout(function() {
                            $.magnificPopup.open({
                                items: {
                                    src: "#zoom-modal",
                                    type: 'inline'
                                },
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                callbacks: {
                                    open: function() {
                                        $(TouchNSwipe.init);
                                        if (self.hasClass("with-print")) {
                                            var button = '<a href="' + image + '" class="printIcon print-image"></a>';
                                            $("#zoom-modal .tns .sliderHolder .slider").append(button)
                                        }
                                    },
                                }
                            })
                        }, 100)
                    }
                    e.preventDefault()
                });
                $("body").off("click", ".threed-open").on("click", ".threed-open", function(e) {
                    if ($("#threed").length) {
                        $("#threed").html("");
                        $("#threed").remove()
                    }
                    var self = $(this);
                    var href = self.attr("href");
                    var backText = self.attr("data-back-text");
                    var html = '<div id="threed" class="threed-modal"><div class="threed-head"><a href="javascript:;" class="mfp-close">' + backText + '</a></div><div class="threed-frame"><iframe src="' + href + '" width="100%" height="100%"" border="0"></iframe></div></div>';
                    $("#modals").append(html);
                    $.magnificPopup.open({
                        items: {
                            src: "#threed",
                            type: 'inline'
                        },
                        mainClass: 'mfp-fade',
                        removalDelay: 160,
                        callbacks: {
                            close: function() {
                                if ($("#threed").length) {
                                    $("#threed").html("");
                                    $("#threed").remove()
                                }
                            }
                        }
                    });
                    e.preventDefault()
                })
            },
        },
        modalCloser: {
            init: function() {
                $("body").off("click", ".modal-close").on("click", ".modal-close", function() {
                    $.magnificPopup.close()
                })
            },
        },
        domInit: function() {
            ppasa.basicFunctions.goTo.init();
            ppasa.basicFunctions.showHide.init();
            ppasa.basicFunctions.modalOpener.init();
            ppasa.basicFunctions.modalCloser.init();
            ppasa.basicFunctions.printImage.init()
        },
    },
    conceptSlider: {
        init: function() {
            if ($("#history-ppasa").length) {
                $("#history-ppasa").royalSlider({
                    controlNavigation: "none",
                    arrowsNavAutoHide: !1,
                    controlsInside: !1,
                    slidesSpacing: 0,
                    usePreloader: !0,
                    transitionType: "fade",
                    allowCSS3: !0
                })
            }
        }
    },
    gallerySlider: {
        init: function() {
            if ($(".gallery-slider").length) {
                $(".gallery-slider").each(function() {
                    $(this).royalSlider({
                        controlNavigation: "bullets",
                        arrowsNavAutoHide: !1,
                        controlsInside: !1,
                        slidesSpacing: 0,
                        usePreloader: !0,
                        transitionType: "fade",
                        allowCSS3: !0,
                    })
                })
            }
        }
    },
    constructionSlider: {
        init: function() {
            if ($(".asymetric-slider").length) {
                $(".asymetric-slider .rsContent a").each(function() {
                    var self = $(this);
                    var path = "" + self.attr("data-image");
                    self.html("");
                    self.append('<img src="' + path + '" alt="" />')
                });
                $(".asymetric-slider").royalSlider({
                    controlNavigation: "bullets",
                    arrowsNavAutoHide: !1,
                    controlsInside: !1,
                    slidesSpacing: 0,
                    usePreloader: !0,
                    allowCSS3: !0,
                    arrowsNav: !0,
                    keyboardNavEnabled: !0,
                })
            }
        },
    },
    workerSlider: {
        init: function() {
            if ($(".worker-slider.before-init").length) {
                $(".worker-slider").royalSlider({
                    controlNavigation: "none",
                    arrowsNavAutoHide: !1,
                    controlsInside: !1,
                    slidesSpacing: 0,
                    usePreloader: !0,
                    allowCSS3: !0,
                });
                setTimeout(function() {
                    $(".worker-slider").removeClass("before-init")
                }, 300)
            }
        },
    },
    resizeend: function() {
        if (new Date() - ppasa.rtime < ppasa.delta) {
            setTimeout(ppasa.resizeend, ppasa.delta)
        } else {
            ppasa.timeout = !1;
            ppasa.resize()
        }
    },
    resize: function() {
        ppasa.layout.resize();
        ppasa.menu.resize()
    },
    domInit: function() {
        ppasa.layout.init();
        ppasa.loader.init();
        ppasa.menu.init();
        ppasa.basicFunctions.domInit();
        ppasa.form.init();
        ppasa.conceptSlider.init();
        ppasa.gallerySlider.init();
        ppasa.constructionSlider.init();
        ppasa.workerSlider.init();
        ppasa.plan.init();
        setTimeout(function() {
            ppasa.tab.init()
        }, 200);
        jconfirm.defaults = {
            keyboardEnabled: !0,
            confirmButton: 'Tamam',
            cancelButton: 'İptal',
            animation: 'zoom',
            closeAnimation: 'scale',
            confirmButtonClass: 'button small green',
            cancelButtonClass: 'button small',
        }
    },
    winInit: function() {
        ppasa.layout.winInit()
    },
}

$(document).ready(function() {
	var _url = document.location.toString();
	if(_url.indexOf('videolu_gorusme_duyuru2020')!=-1)
	{
		$(".scope_overlay").fadeIn();
	}else{
		$(".mfp-bg").remove();
		$(".mfp-wrap").remove();
	}
	
	
	$("#goruntulu_button_wrapper").click(function(){
		$(".scope_overlay").fadeIn();
	});
	
	$(".scope_overlay .date_modal_close").click(function(){
		$(".scope_overlay").fadeOut();
	});
	
	
    ppasa.domInit();
    $('.aydinlatma-popup-toggler').on('click', function(e) {
        popup.show('modal-aydinlatma');
        e.preventDefault();
    })
    $('.acik-riza-popup-toggler').on('click', function() {
        popup.show('modal-acik-riza');
        e.preventDefault();
    })
    $('.overlay_none').click(function() {
        $('.overlay').click()
    })
    var firstVideo = $(".section.type-1.has-video");
    var vidUrl = firstVideo.attr("data-vid");
    $(".image", firstVideo).addClass("hide");
    firstVideo.addClass("video-inited");
    firstVideo.prepend('<div class="section-video"><video autoplay muted loop><source src="' + vidUrl + '" type="video/mp4"></video></div>')
    var viDoc = document.querySelector(".section.type-1.has-video video");
    if(viDoc != null){
        viDoc.play();
    }
});
$(window).load(function() {
    ppasa.winInit()
});
$(function() {
    $("header a[href], nav a[href]").each(function() {
        var self = $(this);
        var a = self.attr('href').split('/');
        if (self.attr('href') != 'javascript:;') {
            a = a[a.length - 1];
            $("a", self.attr('google-href-position', a + '?place=top'))
        }
    });
    $("footer a[href]").each(function() {
        var self = $(this);
        var a = self.attr('href').split('/');
        if (self.attr('href') != 'javascript:;') {
            a = a[a.length - 1];
            $("a", self.attr('google-href-position', a + '?place=footer'))
        }
    });
    $('*[google-href-position]').on('click', function() {
        var data = $(this).attr("google-href-position");
        data = data.replace('#', '/');
        ga('send', 'event', data, 'click to ' + data, data)
    })
})