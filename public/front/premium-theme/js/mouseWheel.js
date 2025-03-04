! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a : a(jQuery)
}(function(a) {
    function i(b) {
        var c = b || window.event,
            g = d.call(arguments, 1),
            i = 0,
            l = 0,
            m = 0,
            n = 0,
            o = 0,
            p = 0;
        if (b = a.event.fix(c), b.type = "mousewheel", "detail" in c && (m = c.detail * -1), "wheelDelta" in c && (m = c.wheelDelta), "wheelDeltaY" in c && (m = c.wheelDeltaY), "wheelDeltaX" in c && (l = c.wheelDeltaX * -1), "axis" in c && c.axis === c.HORIZONTAL_AXIS && (l = m * -1, m = 0), i = 0 === m ? l : m, "deltaY" in c && (m = c.deltaY * -1, i = m), "deltaX" in c && (l = c.deltaX, 0 === m && (i = l * -1)), 0 !== m || 0 !== l) {
            if (1 === c.deltaMode) {
                var q = a.data(this, "mousewheel-line-height");
                i *= q, m *= q, l *= q
            } else if (2 === c.deltaMode) {
                var r = a.data(this, "mousewheel-page-height");
                i *= r, m *= r, l *= r
            }
            if (n = Math.max(Math.abs(m), Math.abs(l)), (!f || n < f) && (f = n, k(c, n) && (f /= 40)), k(c, n) && (i /= 40, l /= 40, m /= 40), i = Math[i >= 1 ? "floor" : "ceil"](i / f), l = Math[l >= 1 ? "floor" : "ceil"](l / f), m = Math[m >= 1 ? "floor" : "ceil"](m / f), h.settings.normalizeOffset && this.getBoundingClientRect) {
                var s = this.getBoundingClientRect();
                o = b.clientX - s.left, p = b.clientY - s.top
            }
            return b.deltaX = l, b.deltaY = m, b.deltaFactor = f, b.offsetX = o, b.offsetY = p, b.deltaMode = 0, g.unshift(b, i, l, m), e && clearTimeout(e), e = setTimeout(j, 200), (a.event.dispatch || a.event.handle).apply(this, g)
        }
    }

    function j() {
        f = null
    }

    function k(a, b) {
        return h.settings.adjustOldDeltas && "mousewheel" === a.type && b % 120 === 0
    }
    var e, f, b = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        c = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        d = Array.prototype.slice;
    if (a.event.fixHooks)
        for (var g = b.length; g;) a.event.fixHooks[b[--g]] = a.event.mouseHooks;
    var h = a.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener){
            	for (var b = c.length; b;){
            		this.addEventListener(c[--b], i, {passive: false});             	
            	} 
            }
            else {
            	this.onmousewheel = i;
            }
            a.data(this, "mousewheel-line-height", h.getLineHeight(this)), a.data(this, "mousewheel-page-height", h.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var b = c.length; b;) this.removeEventListener(c[--b], i, !1);
            else this.onmousewheel = null;
            a.removeData(this, "mousewheel-line-height"), a.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(b) {
            var c = a(b),
                d = c["offsetParent" in a.fn ? "offsetParent" : "parent"]();
            return d.length || (d = a("body")), parseInt(d.css("fontSize"), 10) || parseInt(c.css("fontSize"), 10) || 16
        },
        getPageHeight: function(b) {
            return a(b).height()
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    a.fn.extend({
        mousewheel: function(a) {
            return a ? this.bind("mousewheel", a) : this.trigger("mousewheel")
        },
        unmousewheel: function(a) {
            return this.unbind("mousewheel", a)
        }
    })
})