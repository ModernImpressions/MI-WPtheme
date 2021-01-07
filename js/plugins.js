/*!
    01. Bootstrap v4.5.0 -- Removed embeded, calling from official CDN
    02. SlickNav Responsive Mobile Menu v1.0.1
    03. Scrollup v2.1.0
    04. Sticky Plugin v1.0.4
    05. jQuery OwlCarousel v1.3.3
    06. FontAwesome 5.14 ---- removed the code so the project can be stored on GitHub. Will reference via a CDN due to licensing.
*/




// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function() {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

/*!
 * Bootstrap v4.5.0 (https://getbootstrap.com/)
 * Copyright 2011-2020 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

/* -- Removed embeded, calling from official CDN */

//# sourceMappingURL=bootstrap.js.map

//# sourceMappingURL=bootstrap.min.js.map




//SlickNav iQuery
/*!
    SlickNav Responsive Mobile Menu v1.0.1
    (c) 2014 Josh Cope
    licensed under MIT
*/
;
(function(e, t, n) {
    function o(t, n) {
        this.element = t;
        this.settings = e.extend({}, r, n);
        this._defaults = r;
        this._name = i;
        this.init()
    }
    var r = { label: "", duplicate: true, duration: 200, easingOpen: "swing", easingClose: "swing", closedSymbol: "&#9658;", openedSymbol: "&#9660;", prependTo: "body", parentTag: "a", closeOnClick: false, allowParentLinks: false, nestedParentLinks: true, showChildren: false, init: function() {}, open: function() {}, close: function() {} },
        i = "slicknav",
        s = "slicknav";
    o.prototype.init = function() {
        var n = this,
            r = e(this.element),
            i = this.settings,
            o, u;
        if (i.duplicate) {
            n.mobileNav = r.clone();
            n.mobileNav.removeAttr("id");
            n.mobileNav.find("*").each(function(t, n) { e(n).removeAttr("id") })
        } else { n.mobileNav = r }
        o = s + "_icon";
        if (i.label === "") { o += " " + s + "_no-text" }
        if (i.parentTag == "a") { i.parentTag = 'a href="#"' }
        n.mobileNav.attr("class", s + "_nav");
        u = e('<div class="' + s + '_menu"></div>');
        n.btn = e(["<" + i.parentTag + ' aria-haspopup="true" tabindex="0" class="' + s + "_btn " + s + '_collapsed">', '<span class="' + s + '_menutxt">' + i.label + "</span>", '<span class="' + o + '">', '<span class="' + s + '_icon-bar"></span>', '<span class="' + s + '_icon-bar"></span>', '<span class="' + s + '_icon-bar"></span>', "</span>", "</" + i.parentTag + ">"].join(""));
        e(u).append(n.btn);
        e(i.prependTo).prepend(u);
        u.append(n.mobileNav);
        var a = n.mobileNav.find("li");
        e(a).each(function() {
            var t = e(this),
                r = {};
            r.children = t.children("ul").attr("role", "menu");
            t.data("menu", r);
            if (r.children.length > 0) {
                var o = t.contents(),
                    u = false;
                nodes = [];
                e(o).each(function() { if (!e(this).is("ul")) { nodes.push(this) } else { return false } if (e(this).is("a")) { u = true } });
                var a = e("<" + i.parentTag + ' role="menuitem" aria-haspopup="true" tabindex="-1" class="' + s + '_item"/>');
                if (!i.allowParentLinks || i.nestedParentLinks || !u) {
                    var f = e(nodes).wrapAll(a).parent();
                    f.addClass(s + "_row")
                } else e(nodes).wrapAll('<span class="' + s + "_parent-link " + s + '_row"/>').parent();
                t.addClass(s + "_collapsed");
                t.addClass(s + "_parent");
                var l = e('<span class="' + s + '_arrow">' + i.closedSymbol + "</span>");
                if (i.allowParentLinks && !i.nestedParentLinks && u) l = l.wrap(a).parent();
                e(nodes).last().after(l)
            } else if (t.children().length === 0) { t.addClass(s + "_txtnode") }
            t.children("a").attr("role", "menuitem").click(function(t) { if (i.closeOnClick && !e(t.target).parent().closest("li").hasClass(s + "_parent")) { e(n.btn).click() } });
            if (i.closeOnClick && i.allowParentLinks) {
                t.children("a").children("a").click(function(t) { e(n.btn).click() });
                t.find("." + s + "_parent-link a:not(." + s + "_item)").click(function(t) { e(n.btn).click() })
            }
        });
        e(a).each(function() { var t = e(this).data("menu"); if (!i.showChildren) { n._visibilityToggle(t.children, null, false, null, true) } });
        n._visibilityToggle(n.mobileNav, null, false, "init", true);
        n.mobileNav.attr("role", "menu");
        e(t).mousedown(function() { n._outlines(false) });
        e(t).keyup(function() { n._outlines(true) });
        e(n.btn).click(function(e) {
            e.preventDefault();
            n._menuToggle()
        });
        n.mobileNav.on("click", "." + s + "_item", function(t) {
            t.preventDefault();
            n._itemClick(e(this))
        });
        e(n.btn).keydown(function(e) {
            var t = e || event;
            if (t.keyCode == 13) {
                e.preventDefault();
                n._menuToggle()
            }
        });
        n.mobileNav.on("keydown", "." + s + "_item", function(t) {
            var r = t || event;
            if (r.keyCode == 13) {
                t.preventDefault();
                n._itemClick(e(t.target))
            }
        });
        if (i.allowParentLinks && i.nestedParentLinks) { e("." + s + "_item a").click(function(e) { e.stopImmediatePropagation() }) }
    };
    o.prototype._menuToggle = function(e) {
        var t = this;
        var n = t.btn;
        var r = t.mobileNav;
        if (n.hasClass(s + "_collapsed")) {
            n.removeClass(s + "_collapsed");
            n.addClass(s + "_open")
        } else {
            n.removeClass(s + "_open");
            n.addClass(s + "_collapsed")
        }
        n.addClass(s + "_animating");
        t._visibilityToggle(r, n.parent(), true, n)
    };
    o.prototype._itemClick = function(e) {
        var t = this;
        var n = t.settings;
        var r = e.data("menu");
        if (!r) {
            r = {};
            r.arrow = e.children("." + s + "_arrow");
            r.ul = e.next("ul");
            r.parent = e.parent();
            if (r.parent.hasClass(s + "_parent-link")) {
                r.parent = e.parent().parent();
                r.ul = e.parent().next("ul")
            }
            e.data("menu", r)
        }
        if (r.parent.hasClass(s + "_collapsed")) {
            r.arrow.html(n.openedSymbol);
            r.parent.removeClass(s + "_collapsed");
            r.parent.addClass(s + "_open");
            r.parent.addClass(s + "_animating");
            t._visibilityToggle(r.ul, r.parent, true, e)
        } else {
            r.arrow.html(n.closedSymbol);
            r.parent.addClass(s + "_collapsed");
            r.parent.removeClass(s + "_open");
            r.parent.addClass(s + "_animating");
            t._visibilityToggle(r.ul, r.parent, true, e)
        }
    };
    o.prototype._visibilityToggle = function(t, n, r, i, o) {
        var u = this;
        var a = u.settings;
        var f = u._getActionItems(t);
        var l = 0;
        if (r) { l = a.duration }
        if (t.hasClass(s + "_hidden")) {
            t.removeClass(s + "_hidden");
            t.slideDown(l, a.easingOpen, function() {
                e(i).removeClass(s + "_animating");
                e(n).removeClass(s + "_animating");
                if (!o) { a.open(i) }
            });
            t.attr("aria-hidden", "false");
            f.attr("tabindex", "0");
            u._setVisAttr(t, false)
        } else {
            t.addClass(s + "_hidden");
            t.slideUp(l, this.settings.easingClose, function() {
                t.attr("aria-hidden", "true");
                f.attr("tabindex", "-1");
                u._setVisAttr(t, true);
                t.hide();
                e(i).removeClass(s + "_animating");
                e(n).removeClass(s + "_animating");
                if (!o) { a.close(i) } else if (i == "init") { a.init() }
            })
        }
    };
    o.prototype._setVisAttr = function(t, n) {
        var r = this;
        var i = t.children("li").children("ul").not("." + s + "_hidden");
        if (!n) {
            i.each(function() {
                var t = e(this);
                t.attr("aria-hidden", "false");
                var i = r._getActionItems(t);
                i.attr("tabindex", "0");
                r._setVisAttr(t, n)
            })
        } else {
            i.each(function() {
                var t = e(this);
                t.attr("aria-hidden", "true");
                var i = r._getActionItems(t);
                i.attr("tabindex", "-1");
                r._setVisAttr(t, n)
            })
        }
    };
    o.prototype._getActionItems = function(e) {
        var t = e.data("menu");
        if (!t) {
            t = {};
            var n = e.children("li");
            var r = n.find("a");
            t.links = r.add(n.find("." + s + "_item"));
            e.data("menu", t)
        }
        return t.links
    };
    o.prototype._outlines = function(t) { if (!t) { e("." + s + "_item, ." + s + "_btn").css("outline", "none") } else { e("." + s + "_item, ." + s + "_btn").css("outline", "") } };
    o.prototype.toggle = function() {
        var e = this;
        e._menuToggle()
    };
    o.prototype.open = function() { var e = this; if (e.btn.hasClass(s + "_collapsed")) { e._menuToggle() } };
    o.prototype.close = function() { var e = this; if (e.btn.hasClass(s + "_open")) { e._menuToggle() } };
    e.fn[i] = function(t) {
        var n = arguments;
        if (t === undefined || typeof t === "object") { return this.each(function() { if (!e.data(this, "plugin_" + i)) { e.data(this, "plugin_" + i, new o(this, t)) } }) } else if (typeof t === "string" && t[0] !== "_" && t !== "init") {
            var r;
            this.each(function() { var s = e.data(this, "plugin_" + i); if (s instanceof o && typeof s[t] === "function") { r = s[t].apply(s, Array.prototype.slice.call(n, 1)) } });
            return r !== undefined ? r : this
        }
    }
})(jQuery, document, window)
//End SlickNav iQuery

/*

 scrollup v2.1.0
 Author: Mark Goodyear - http://markgoodyear.com
 Git: https://github.com/markgoodyear/scrollup

 Copyright 2013 Mark Goodyear.
 Licensed under the MIT license
 http://www.opensource.org/licenses/mit-license.php

 Twitter: @markgdyr

 */
! function(a, b, c) {
    a.fn.scrollUp = function(b) { a.data(c.body, "scrollUp") || (a.data(c.body, "scrollUp", !0), a.fn.scrollUp.init(b)) }, a.fn.scrollUp.init = function(d) {
        var e = a.fn.scrollUp.settings = a.extend({}, a.fn.scrollUp.defaults, d),
            f = e.scrollTitle ? e.scrollTitle : e.scrollText,
            g = a("<a/>", { id: e.scrollName, href: "#top", title: f }).appendTo("body");
        e.scrollImg || g.html(e.scrollText), g.css({ display: "none", position: "fixed", zIndex: e.zIndex }), e.activeOverlay && a("<div/>", { id: e.scrollName + "-active" }).css({ position: "absolute", top: e.scrollDistance + "px", width: "100%", borderTop: "1px dotted" + e.activeOverlay, zIndex: e.zIndex }).appendTo("body"), scrollEvent = a(b).scroll(function() {
            switch (scrollDis = "top" === e.scrollFrom ? e.scrollDistance : a(c).height() - a(b).height() - e.scrollDistance, e.animation) {
                case "fade":
                    a(a(b).scrollTop() > scrollDis ? g.fadeIn(e.animationInSpeed) : g.fadeOut(e.animationOutSpeed));
                    break;
                case "slide":
                    a(a(b).scrollTop() > scrollDis ? g.slideDown(e.animationInSpeed) : g.slideUp(e.animationOutSpeed));
                    break;
                default:
                    a(a(b).scrollTop() > scrollDis ? g.show(0) : g.hide(0))
            }
        }), g.click(function(b) { b.preventDefault(), a("html, body").animate({ scrollTop: 0 }, e.topSpeed, e.easingType) })
    }, a.fn.scrollUp.defaults = { scrollName: "scrollUp", scrollDistance: 300, scrollFrom: "top", scrollSpeed: 300, easingType: "linear", animation: "fade", animationInSpeed: 200, animationOutSpeed: 200, scrollText: "Scroll to top", scrollTitle: !1, scrollImg: !1, activeOverlay: !1, zIndex: 2147483647 }, a.fn.scrollUp.destroy = function(d) { a.removeData(c.body, "scrollUp"), a("#" + a.fn.scrollUp.settings.scrollName).remove(), a("#" + a.fn.scrollUp.settings.scrollName + "-active").remove(), a.fn.jquery.split(".")[1] >= 7 ? a(b).off("scroll", d) : a(b).unbind("scroll", d) }, a.scrollUp = a.fn.scrollUp
}(jQuery, window, document);



// Sticky Plugin v1.0.4 for jQuery
// =============
// Author: Anthony Garand
// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)
// Improvements by Leonardo C. Daronco (daronco)
// Created: 02/14/2011
// Date: 07/20/2015
// Website: http://stickyjs.com/
// Description: Makes an element on the page stick on the screen as you scroll
//              It will only set the 'top' and 'position' of your element, you
//              might need to adjust the width in some cases.

! function(t) { "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery) }(function(t) {
    var e = Array.prototype.slice,
        i = Array.prototype.splice,
        n = { topSpacing: 0, bottomSpacing: 0, className: "is-sticky", wrapperClassName: "sticky-wrapper", center: !1, getWidthFrom: "", widthFromWrapper: !0, responsiveWidth: !1, zIndex: "inherit" },
        r = t(window),
        s = t(document),
        o = [],
        c = r.height(),
        p = function() {
            for (var e = r.scrollTop(), i = s.height(), n = i - c, p = e > n ? n - e : 0, a = 0, d = o.length; a < d; a++) {
                var l = o[a],
                    h = l.stickyWrapper.offset().top - l.topSpacing - p;
                if (l.stickyWrapper.css("height", l.stickyElement.outerHeight()), e <= h) null !== l.currentTop && (l.stickyElement.css({ width: "", position: "", top: "", "z-index": "" }), l.stickyElement.parent().removeClass(l.className), l.stickyElement.trigger("sticky-end", [l]), l.currentTop = null);
                else {
                    var u, g = i - l.stickyElement.outerHeight() - l.topSpacing - l.bottomSpacing - e - p;
                    if (g < 0 ? g += l.topSpacing : g = l.topSpacing, l.currentTop !== g) l.getWidthFrom ? (padding = l.stickyElement.innerWidth() - l.stickyElement.width(), u = t(l.getWidthFrom).width() - padding || null) : l.widthFromWrapper && (u = l.stickyWrapper.width()), null == u && (u = l.stickyElement.width()), l.stickyElement.css("width", u).css("position", "fixed").css("top", g).css("z-index", l.zIndex), l.stickyElement.parent().addClass(l.className), null === l.currentTop ? l.stickyElement.trigger("sticky-start", [l]) : l.stickyElement.trigger("sticky-update", [l]), l.currentTop === l.topSpacing && l.currentTop > g || null === l.currentTop && g < l.topSpacing ? l.stickyElement.trigger("sticky-bottom-reached", [l]) : null !== l.currentTop && g === l.topSpacing && l.currentTop < g && l.stickyElement.trigger("sticky-bottom-unreached", [l]), l.currentTop = g;
                    var m = l.stickyWrapper.parent();
                    l.stickyElement.offset().top + l.stickyElement.outerHeight() >= m.offset().top + m.outerHeight() && l.stickyElement.offset().top <= l.topSpacing ? l.stickyElement.css("position", "absolute").css("top", "").css("bottom", 0).css("z-index", "") : l.stickyElement.css("position", "fixed").css("top", g).css("bottom", "").css("z-index", l.zIndex)
                }
            }
        },
        a = function() {
            c = r.height();
            for (var e = 0, i = o.length; e < i; e++) {
                var n = o[e],
                    s = null;
                n.getWidthFrom ? n.responsiveWidth && (s = t(n.getWidthFrom).width()) : n.widthFromWrapper && (s = n.stickyWrapper.width()), null != s && n.stickyElement.css("width", s)
            }
        },
        d = {
            init: function(e) {
                return this.each(function() {
                    var i = t.extend({}, n, e),
                        r = t(this),
                        s = r.attr("id"),
                        c = s ? s + "-" + n.wrapperClassName : n.wrapperClassName,
                        p = t("<div></div>").attr("id", c).addClass(i.wrapperClassName);
                    r.wrapAll(function() { if (0 == t(this).parent("#" + c).length) return p });
                    var a = r.parent();
                    i.center && a.css({ width: r.outerWidth(), marginLeft: "auto", marginRight: "auto" }), "right" === r.css("float") && r.css({ float: "none" }).parent().css({ float: "right" }), i.stickyElement = r, i.stickyWrapper = a, i.currentTop = null, o.push(i), d.setWrapperHeight(this), d.setupChangeListeners(this)
                })
            },
            setWrapperHeight: function(e) {
                var i = t(e),
                    n = i.parent();
                n && n.css("height", i.outerHeight())
            },
            setupChangeListeners: function(t) {
                window.MutationObserver ? new window.MutationObserver(function(e) {
                    (e[0].addedNodes.length || e[0].removedNodes.length) && d.setWrapperHeight(t)
                }).observe(t, { subtree: !0, childList: !0 }) : window.addEventListener ? (t.addEventListener("DOMNodeInserted", function() { d.setWrapperHeight(t) }, !1), t.addEventListener("DOMNodeRemoved", function() { d.setWrapperHeight(t) }, !1)) : window.attachEvent && (t.attachEvent("onDOMNodeInserted", function() { d.setWrapperHeight(t) }), t.attachEvent("onDOMNodeRemoved", function() { d.setWrapperHeight(t) }))
            },
            update: p,
            unstick: function(e) { return this.each(function() { for (var e = t(this), n = -1, r = o.length; r-- > 0;) o[r].stickyElement.get(0) === this && (i.call(o, r, 1), n = r); - 1 !== n && (e.unwrap(), e.css({ width: "", position: "", top: "", float: "", "z-index": "" })) }) }
        };
    window.addEventListener ? (window.addEventListener("scroll", p, !1), window.addEventListener("resize", a, !1)) : window.attachEvent && (window.attachEvent("onscroll", p), window.attachEvent("onresize", a)), t.fn.sticky = function(i) { return d[i] ? d[i].apply(this, e.call(arguments, 1)) : "object" != typeof i && i ? void t.error("Method " + i + " does not exist on jQuery.sticky") : d.init.apply(this, arguments) }, t.fn.unstick = function(i) { return d[i] ? d[i].apply(this, e.call(arguments, 1)) : "object" != typeof i && i ? void t.error("Method " + i + " does not exist on jQuery.sticky") : d.unstick.apply(this, arguments) }, t(function() { setTimeout(p, 0) })
});








/**
 * Owl Carousel v2.3.4
 * Copyright 2013-2018 David Deutsch
 * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
 */
/**
 

/*!
 * Font Awesome Pro 5.14.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license (Commercial License)
 */
/* removed the code so the project can be stored on GitHub. Will reference via a CDN due to licensing. */