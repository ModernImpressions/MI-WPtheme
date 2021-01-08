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








/*
 *  jQuery OwlCarousel v1.3.3
 *
 *  Copyright (c) 2013 Bartosz Wojciechowski
 *  http://www.owlgraphic.com/owlcarousel/
 *
 *  Licensed under MIT
 *
 */

"function" != typeof Object.create && (Object.create = function(t) {
        function i() {}
        return i.prototype = t, new i
    }),
    function(t, i, s) {
        var e = {
            init: function(i, s) { this.$elem = t(s), this.options = t.extend({}, t.fn.owlCarousel.options, this.$elem.data(), i), this.userOptions = i, this.loadContent() },
            loadContent: function() {
                var i, s = this;
                "function" == typeof s.options.beforeInit && s.options.beforeInit.apply(this, [s.$elem]), "string" == typeof s.options.jsonPath ? (i = s.options.jsonPath, t.getJSON(i, function(t) {
                    var i, e = "";
                    if ("function" == typeof s.options.jsonSuccess) s.options.jsonSuccess.apply(this, [t]);
                    else {
                        for (i in t.owl) t.owl.hasOwnProperty(i) && (e += t.owl[i].item);
                        s.$elem.html(e)
                    }
                    s.logIn()
                })) : s.logIn()
            },
            logIn: function() { this.$elem.data("owl-originalStyles", this.$elem.attr("style")), this.$elem.data("owl-originalClasses", this.$elem.attr("class")), this.$elem.css({ opacity: 0 }), this.orignalItems = this.options.items, this.checkBrowser(), this.wrapperWidth = 0, this.checkVisible = null, this.setVars() },
            setVars: function() {
                if (0 === this.$elem.children().length) return !1;
                this.baseClass(), this.eventTypes(), this.$userItems = this.$elem.children(), this.itemsAmount = this.$userItems.length, this.wrapItems(), this.$owlItems = this.$elem.find(".owl-item"), this.$owlWrapper = this.$elem.find(".owl-wrapper"), this.playDirection = "next", this.prevItem = 0, this.prevArr = [0], this.currentItem = 0, this.customEvents(), this.onStartup()
            },
            onStartup: function() { this.updateItems(), this.calculateAll(), this.buildControls(), this.updateControls(), this.response(), this.moveEvents(), this.stopOnHover(), this.owlStatus(), !1 !== this.options.transitionStyle && this.transitionTypes(this.options.transitionStyle), !0 === this.options.autoPlay && (this.options.autoPlay = 5e3), this.play(), this.$elem.find(".owl-wrapper").css("display", "block"), this.$elem.is(":visible") ? this.$elem.css("opacity", 1) : this.watchVisibility(), this.onstartup = !1, this.eachMoveUpdate(), "function" == typeof this.options.afterInit && this.options.afterInit.apply(this, [this.$elem]) },
            eachMoveUpdate: function() {!0 === this.options.lazyLoad && this.lazyLoad(), !0 === this.options.autoHeight && this.autoHeight(), this.onVisibleItems(), "function" == typeof this.options.afterAction && this.options.afterAction.apply(this, [this.$elem]) },
            updateVars: function() { "function" == typeof this.options.beforeUpdate && this.options.beforeUpdate.apply(this, [this.$elem]), this.watchVisibility(), this.updateItems(), this.calculateAll(), this.updatePosition(), this.updateControls(), this.eachMoveUpdate(), "function" == typeof this.options.afterUpdate && this.options.afterUpdate.apply(this, [this.$elem]) },
            reload: function() {
                var t = this;
                i.setTimeout(function() { t.updateVars() }, 0)
            },
            watchVisibility: function() {
                var t = this;
                if (!1 !== t.$elem.is(":visible")) return !1;
                t.$elem.css({ opacity: 0 }), i.clearInterval(t.autoPlayInterval), i.clearInterval(t.checkVisible), t.checkVisible = i.setInterval(function() { t.$elem.is(":visible") && (t.reload(), t.$elem.animate({ opacity: 1 }, 200), i.clearInterval(t.checkVisible)) }, 500)
            },
            wrapItems: function() { this.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>'), this.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">'), this.wrapperOuter = this.$elem.find(".owl-wrapper-outer"), this.$elem.css("display", "block") },
            baseClass: function() {
                var t = this.$elem.hasClass(this.options.baseClass),
                    i = this.$elem.hasClass(this.options.theme);
                t || this.$elem.addClass(this.options.baseClass), i || this.$elem.addClass(this.options.theme)
            },
            updateItems: function() {
                var i, s;
                if (!1 === this.options.responsive) return !1;
                if (!0 === this.options.singleItem) return this.options.items = this.orignalItems = 1, this.options.itemsCustom = !1, this.options.itemsDesktop = !1, this.options.itemsDesktopSmall = !1, this.options.itemsTablet = !1, this.options.itemsTabletSmall = !1, this.options.itemsMobile = !1, !1;
                if ((i = t(this.options.responsiveBaseWidth).width()) > (this.options.itemsDesktop[0] || this.orignalItems) && (this.options.items = this.orignalItems), !1 !== this.options.itemsCustom)
                    for (this.options.itemsCustom.sort(function(t, i) { return t[0] - i[0] }), s = 0; s < this.options.itemsCustom.length; s += 1) this.options.itemsCustom[s][0] <= i && (this.options.items = this.options.itemsCustom[s][1]);
                else i <= this.options.itemsDesktop[0] && !1 !== this.options.itemsDesktop && (this.options.items = this.options.itemsDesktop[1]), i <= this.options.itemsDesktopSmall[0] && !1 !== this.options.itemsDesktopSmall && (this.options.items = this.options.itemsDesktopSmall[1]), i <= this.options.itemsTablet[0] && !1 !== this.options.itemsTablet && (this.options.items = this.options.itemsTablet[1]), i <= this.options.itemsTabletSmall[0] && !1 !== this.options.itemsTabletSmall && (this.options.items = this.options.itemsTabletSmall[1]), i <= this.options.itemsMobile[0] && !1 !== this.options.itemsMobile && (this.options.items = this.options.itemsMobile[1]);
                this.options.items > this.itemsAmount && !0 === this.options.itemsScaleUp && (this.options.items = this.itemsAmount)
            },
            response: function() {
                var s, e, o = this;
                if (!0 !== o.options.responsive) return !1;
                e = t(i).width(), o.resizer = function() { t(i).width() !== e && (!1 !== o.options.autoPlay && i.clearInterval(o.autoPlayInterval), i.clearTimeout(s), s = i.setTimeout(function() { e = t(i).width(), o.updateVars() }, o.options.responsiveRefreshRate)) }, t(i).resize(o.resizer)
            },
            updatePosition: function() { this.jumpTo(this.currentItem), !1 !== this.options.autoPlay && this.checkAp() },
            appendItemsSizes: function() {
                var i = this,
                    s = 0,
                    e = i.itemsAmount - i.options.items;
                i.$owlItems.each(function(o) {
                    var n = t(this);
                    n.css({ width: i.itemWidth }).data("owl-item", Number(o)), o % i.options.items != 0 && o !== e || o > e || (s += 1), n.data("owl-roundPages", s)
                })
            },
            appendWrapperSizes: function() {
                var t = this.$owlItems.length * this.itemWidth;
                this.$owlWrapper.css({ width: 2 * t, left: 0 }), this.appendItemsSizes()
            },
            calculateAll: function() { this.calculateWidth(), this.appendWrapperSizes(), this.loops(), this.max() },
            calculateWidth: function() { this.itemWidth = Math.round(this.$elem.width() / this.options.items) },
            max: function() { var t = -1 * (this.itemsAmount * this.itemWidth - this.options.items * this.itemWidth); return this.options.items > this.itemsAmount ? (this.maximumItem = 0, t = 0, this.maximumPixels = 0) : (this.maximumItem = this.itemsAmount - this.options.items, this.maximumPixels = t), t },
            min: function() { return 0 },
            loops: function() {
                var i, s, e = 0,
                    o = 0;
                for (this.positionsInArray = [0], this.pagesInArray = [], i = 0; i < this.itemsAmount; i += 1) o += this.itemWidth, this.positionsInArray.push(-o), !0 === this.options.scrollPerPage && (s = t(this.$owlItems[i]).data("owl-roundPages")) !== e && (this.pagesInArray[e] = this.positionsInArray[i], e = s)
            },
            buildControls: function() {!0 !== this.options.navigation && !0 !== this.options.pagination || (this.owlControls = t('<div class="owl-controls"/>').toggleClass("clickable", !this.browser.isTouch).appendTo(this.$elem)), !0 === this.options.pagination && this.buildPagination(), !0 === this.options.navigation && this.buildButtons() },
            buildButtons: function() {
                var i = this,
                    s = t('<div class="owl-buttons"/>');
                i.owlControls.append(s), i.buttonPrev = t("<div/>", { class: "owl-prev", html: i.options.navigationText[0] || "" }), i.buttonNext = t("<div/>", { class: "owl-next", html: i.options.navigationText[1] || "" }), s.append(i.buttonPrev).append(i.buttonNext), s.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(t) { t.preventDefault() }), s.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(s) { s.preventDefault(), t(this).hasClass("owl-next") ? i.next() : i.prev() })
            },
            buildPagination: function() {
                var i = this;
                i.paginationWrapper = t('<div class="owl-pagination"/>'), i.owlControls.append(i.paginationWrapper), i.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(s) { s.preventDefault(), Number(t(this).data("owl-page")) !== i.currentItem && i.goTo(Number(t(this).data("owl-page")), !0) })
            },
            updatePagination: function() {
                var i, s, e, o, n, a;
                if (!1 === this.options.pagination) return !1;
                for (this.paginationWrapper.html(""), i = 0, s = this.itemsAmount - this.itemsAmount % this.options.items, o = 0; o < this.itemsAmount; o += 1) o % this.options.items == 0 && (i += 1, s === o && (e = this.itemsAmount - this.options.items), n = t("<div/>", { class: "owl-page" }), a = t("<span></span>", { text: !0 === this.options.paginationNumbers ? i : "", class: !0 === this.options.paginationNumbers ? "owl-numbers" : "" }), n.append(a), n.data("owl-page", s === o ? e : o), n.data("owl-roundPages", i), this.paginationWrapper.append(n));
                this.checkPagination()
            },
            checkPagination: function() {
                var i = this;
                if (!1 === i.options.pagination) return !1;
                i.paginationWrapper.find(".owl-page").each(function() { t(this).data("owl-roundPages") === t(i.$owlItems[i.currentItem]).data("owl-roundPages") && (i.paginationWrapper.find(".owl-page").removeClass("active"), t(this).addClass("active")) })
            },
            checkNavigation: function() { if (!1 === this.options.navigation) return !1;!1 === this.options.rewindNav && (0 === this.currentItem && 0 === this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.addClass("disabled")) : 0 === this.currentItem && 0 !== this.maximumItem ? (this.buttonPrev.addClass("disabled"), this.buttonNext.removeClass("disabled")) : this.currentItem === this.maximumItem ? (this.buttonPrev.removeClass("disabled"), this.buttonNext.addClass("disabled")) : 0 !== this.currentItem && this.currentItem !== this.maximumItem && (this.buttonPrev.removeClass("disabled"), this.buttonNext.removeClass("disabled"))) },
            updateControls: function() { this.updatePagination(), this.checkNavigation(), this.owlControls && (this.options.items >= this.itemsAmount ? this.owlControls.hide() : this.owlControls.show()) },
            destroyControls: function() { this.owlControls && this.owlControls.remove() },
            next: function(t) {
                if (this.isTransition) return !1;
                if (this.currentItem += !0 === this.options.scrollPerPage ? this.options.items : 1, this.currentItem > this.maximumItem + (!0 === this.options.scrollPerPage ? this.options.items - 1 : 0)) {
                    if (!0 !== this.options.rewindNav) return this.currentItem = this.maximumItem, !1;
                    this.currentItem = 0, t = "rewind"
                }
                this.goTo(this.currentItem, t)
            },
            prev: function(t) {
                if (this.isTransition) return !1;
                if (!0 === this.options.scrollPerPage && this.currentItem > 0 && this.currentItem < this.options.items ? this.currentItem = 0 : this.currentItem -= !0 === this.options.scrollPerPage ? this.options.items : 1, this.currentItem < 0) {
                    if (!0 !== this.options.rewindNav) return this.currentItem = 0, !1;
                    this.currentItem = this.maximumItem, t = "rewind"
                }
                this.goTo(this.currentItem, t)
            },
            goTo: function(t, s, e) { var o, n = this; return !n.isTransition && ("function" == typeof n.options.beforeMove && n.options.beforeMove.apply(this, [n.$elem]), t >= n.maximumItem ? t = n.maximumItem : t <= 0 && (t = 0), n.currentItem = n.owl.currentItem = t, !1 !== n.options.transitionStyle && "drag" !== e && 1 === n.options.items && !0 === n.browser.support3d ? (n.swapSpeed(0), !0 === n.browser.support3d ? n.transition3d(n.positionsInArray[t]) : n.css2slide(n.positionsInArray[t], 1), n.afterGo(), n.singleItemTransition(), !1) : (o = n.positionsInArray[t], !0 === n.browser.support3d ? (n.isCss3Finish = !1, !0 === s ? (n.swapSpeed("paginationSpeed"), i.setTimeout(function() { n.isCss3Finish = !0 }, n.options.paginationSpeed)) : "rewind" === s ? (n.swapSpeed(n.options.rewindSpeed), i.setTimeout(function() { n.isCss3Finish = !0 }, n.options.rewindSpeed)) : (n.swapSpeed("slideSpeed"), i.setTimeout(function() { n.isCss3Finish = !0 }, n.options.slideSpeed)), n.transition3d(o)) : !0 === s ? n.css2slide(o, n.options.paginationSpeed) : "rewind" === s ? n.css2slide(o, n.options.rewindSpeed) : n.css2slide(o, n.options.slideSpeed), void n.afterGo())) },
            jumpTo: function(t) { "function" == typeof this.options.beforeMove && this.options.beforeMove.apply(this, [this.$elem]), t >= this.maximumItem || -1 === t ? t = this.maximumItem : t <= 0 && (t = 0), this.swapSpeed(0), !0 === this.browser.support3d ? this.transition3d(this.positionsInArray[t]) : this.css2slide(this.positionsInArray[t], 1), this.currentItem = this.owl.currentItem = t, this.afterGo() },
            afterGo: function() { this.prevArr.push(this.currentItem), this.prevItem = this.owl.prevItem = this.prevArr[this.prevArr.length - 2], this.prevArr.shift(0), this.prevItem !== this.currentItem && (this.checkPagination(), this.checkNavigation(), this.eachMoveUpdate(), !1 !== this.options.autoPlay && this.checkAp()), "function" == typeof this.options.afterMove && this.prevItem !== this.currentItem && this.options.afterMove.apply(this, [this.$elem]) },
            stop: function() { this.apStatus = "stop", i.clearInterval(this.autoPlayInterval) },
            checkAp: function() { "stop" !== this.apStatus && this.play() },
            play: function() {
                var t = this;
                if (t.apStatus = "play", !1 === t.options.autoPlay) return !1;
                i.clearInterval(t.autoPlayInterval), t.autoPlayInterval = i.setInterval(function() { t.next(!0) }, t.options.autoPlay)
            },
            swapSpeed: function(t) { "slideSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.slideSpeed)) : "paginationSpeed" === t ? this.$owlWrapper.css(this.addCssSpeed(this.options.paginationSpeed)) : "string" != typeof t && this.$owlWrapper.css(this.addCssSpeed(t)) },
            addCssSpeed: function(t) { return { "-webkit-transition": "all " + t + "ms ease", "-moz-transition": "all " + t + "ms ease", "-o-transition": "all " + t + "ms ease", transition: "all " + t + "ms ease" } },
            removeTransition: function() { return { "-webkit-transition": "", "-moz-transition": "", "-o-transition": "", transition: "" } },
            doTranslate: function(t) { return { "-webkit-transform": "translate3d(" + t + "px, 0px, 0px)", "-moz-transform": "translate3d(" + t + "px, 0px, 0px)", "-o-transform": "translate3d(" + t + "px, 0px, 0px)", "-ms-transform": "translate3d(" + t + "px, 0px, 0px)", transform: "translate3d(" + t + "px, 0px,0px)" } },
            transition3d: function(t) { this.$owlWrapper.css(this.doTranslate(t)) },
            css2move: function(t) { this.$owlWrapper.css({ left: t }) },
            css2slide: function(t, i) {
                var s = this;
                s.isCssFinish = !1, s.$owlWrapper.stop(!0, !0).animate({ left: t }, { duration: i || s.options.slideSpeed, complete: function() { s.isCssFinish = !0 } })
            },
            checkBrowser: function() {
                var t, e, o, n, a = "translate3d(0px, 0px, 0px)",
                    r = s.createElement("div");
                r.style.cssText = "  -moz-transform:" + a + "; -ms-transform:" + a + "; -o-transform:" + a + "; -webkit-transform:" + a + "; transform:" + a, t = /translate3d\(0px, 0px, 0px\)/g, o = null !== (e = r.style.cssText.match(t)) && 1 === e.length, n = "ontouchstart" in i || i.navigator.msMaxTouchPoints, this.browser = { support3d: o, isTouch: n }
            },
            moveEvents: function() {!1 === this.options.mouseDrag && !1 === this.options.touchDrag || (this.gestures(), this.disabledEvents()) },
            eventTypes: function() {
                var t = ["s", "e", "x"];
                this.ev_types = {}, !0 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : !1 === this.options.mouseDrag && !0 === this.options.touchDrag ? t = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : !0 === this.options.mouseDrag && !1 === this.options.touchDrag && (t = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]), this.ev_types.start = t[0], this.ev_types.move = t[1], this.ev_types.end = t[2]
            },
            disabledEvents: function() { this.$elem.on("dragstart.owl", function(t) { t.preventDefault() }), this.$elem.on("mousedown.disableTextSelect", function(i) { return t(i.target).is("input, textarea, select, option") }) },
            gestures: function() {
                var e = this,
                    o = { offsetX: 0, offsetY: 0, baseElWidth: 0, relativePos: 0, position: null, minSwipe: null, maxSwipe: null, sliding: null, dargging: null, targetElement: null };

                function n(t) { if (void 0 !== t.touches) return { x: t.touches[0].pageX, y: t.touches[0].pageY }; if (void 0 === t.touches) { if (void 0 !== t.pageX) return { x: t.pageX, y: t.pageY }; if (void 0 === t.pageX) return { x: t.clientX, y: t.clientY } } }

                function a(i) { "on" === i ? (t(s).on(e.ev_types.move, r), t(s).on(e.ev_types.end, l)) : "off" === i && (t(s).off(e.ev_types.move), t(s).off(e.ev_types.end)) }

                function r(a) {
                    var r, l, h = a.originalEvent || a || i.event;
                    e.newPosX = n(h).x - o.offsetX, e.newPosY = n(h).y - o.offsetY, e.newRelativeX = e.newPosX - o.relativePos, "function" == typeof e.options.startDragging && !0 !== o.dragging && 0 !== e.newRelativeX && (o.dragging = !0, e.options.startDragging.apply(e, [e.$elem])), (e.newRelativeX > 8 || e.newRelativeX < -8) && !0 === e.browser.isTouch && (void 0 !== h.preventDefault ? h.preventDefault() : h.returnValue = !1, o.sliding = !0), (e.newPosY > 10 || e.newPosY < -10) && !1 === o.sliding && t(s).off("touchmove.owl"), r = function() { return e.newRelativeX / 5 }, l = function() { return e.maximumPixels + e.newRelativeX / 5 }, e.newPosX = Math.max(Math.min(e.newPosX, r()), l()), !0 === e.browser.support3d ? e.transition3d(e.newPosX) : e.css2move(e.newPosX)
                }

                function l(s) {
                    var n, r, l, h = s.originalEvent || s || i.event;
                    h.target = h.target || h.srcElement, o.dragging = !1, !0 !== e.browser.isTouch && e.$owlWrapper.removeClass("grabbing"), e.newRelativeX < 0 ? e.dragDirection = e.owl.dragDirection = "left" : e.dragDirection = e.owl.dragDirection = "right", 0 !== e.newRelativeX && (n = e.getNewPosition(), e.goTo(n, !1, "drag"), o.targetElement === h.target && !0 !== e.browser.isTouch && (t(h.target).on("click.disable", function(i) { i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault(), t(i.target).off("click.disable") }), l = (r = t._data(h.target, "events").click).pop(), r.splice(0, 0, l))), a("off")
                }
                e.isCssFinish = !0, e.$elem.on(e.ev_types.start, ".owl-wrapper", function(s) { var r, l = s.originalEvent || s || i.event; if (3 === l.which) return !1; if (!(e.itemsAmount <= e.options.items)) { if (!1 === e.isCssFinish && !e.options.dragBeforeAnimFinish) return !1; if (!1 === e.isCss3Finish && !e.options.dragBeforeAnimFinish) return !1;!1 !== e.options.autoPlay && i.clearInterval(e.autoPlayInterval), !0 === e.browser.isTouch || e.$owlWrapper.hasClass("grabbing") || e.$owlWrapper.addClass("grabbing"), e.newPosX = 0, e.newRelativeX = 0, t(this).css(e.removeTransition()), r = t(this).position(), o.relativePos = r.left, o.offsetX = n(l).x - r.left, o.offsetY = n(l).y - r.top, a("on"), o.sliding = !1, o.targetElement = l.target || l.srcElement } })
            },
            getNewPosition: function() { var t = this.closestItem(); return t > this.maximumItem ? (this.currentItem = this.maximumItem, t = this.maximumItem) : this.newPosX >= 0 && (t = 0, this.currentItem = 0), t },
            closestItem: function() {
                var i = this,
                    s = !0 === i.options.scrollPerPage ? i.pagesInArray : i.positionsInArray,
                    e = i.newPosX,
                    o = null;
                return t.each(s, function(n, a) { e - i.itemWidth / 20 > s[n + 1] && e - i.itemWidth / 20 < a && "left" === i.moveDirection() ? (o = a, !0 === i.options.scrollPerPage ? i.currentItem = t.inArray(o, i.positionsInArray) : i.currentItem = n) : e + i.itemWidth / 20 < a && e + i.itemWidth / 20 > (s[n + 1] || s[n] - i.itemWidth) && "right" === i.moveDirection() && (!0 === i.options.scrollPerPage ? (o = s[n + 1] || s[s.length - 1], i.currentItem = t.inArray(o, i.positionsInArray)) : (o = s[n + 1], i.currentItem = n + 1)) }), i.currentItem
            },
            moveDirection: function() { var t; return this.newRelativeX < 0 ? (t = "right", this.playDirection = "next") : (t = "left", this.playDirection = "prev"), t },
            customEvents: function() {
                var t = this;
                t.$elem.on("owl.next", function() { t.next() }), t.$elem.on("owl.prev", function() { t.prev() }), t.$elem.on("owl.play", function(i, s) { t.options.autoPlay = s, t.play(), t.hoverStatus = "play" }), t.$elem.on("owl.stop", function() { t.stop(), t.hoverStatus = "stop" }), t.$elem.on("owl.goTo", function(i, s) { t.goTo(s) }), t.$elem.on("owl.jumpTo", function(i, s) { t.jumpTo(s) })
            },
            stopOnHover: function() { var t = this;!0 === t.options.stopOnHover && !0 !== t.browser.isTouch && !1 !== t.options.autoPlay && (t.$elem.on("mouseover", function() { t.stop() }), t.$elem.on("mouseout", function() { "stop" !== t.hoverStatus && t.play() })) },
            lazyLoad: function() { var i, s, e, o; if (!1 === this.options.lazyLoad) return !1; for (i = 0; i < this.itemsAmount; i += 1) "loaded" !== (s = t(this.$owlItems[i])).data("owl-loaded") && (e = s.data("owl-item"), "string" == typeof(o = s.find(".lazyOwl")).data("src") ? (void 0 === s.data("owl-loaded") && (o.hide(), s.addClass("loading").data("owl-loaded", "checked")), (!0 !== this.options.lazyFollow || e >= this.currentItem) && e < this.currentItem + this.options.items && o.length && this.lazyPreload(s, o)) : s.data("owl-loaded", "loaded")) },
            lazyPreload: function(t, s) {
                var e, o = this,
                    n = 0;

                function a() { t.data("owl-loaded", "loaded").removeClass("loading"), s.removeAttr("data-src"), "fade" === o.options.lazyEffect ? s.fadeIn(400) : s.show(), "function" == typeof o.options.afterLazyLoad && o.options.afterLazyLoad.apply(this, [o.$elem]) }
                "DIV" === s.prop("tagName") ? (s.css("background-image", "url(" + s.data("src") + ")"), e = !0) : s[0].src = s.data("src"),
                    function t() { n += 1, o.completeImg(s.get(0)) || !0 === e ? a() : n <= 100 ? i.setTimeout(t, 100) : a() }()
            },
            autoHeight: function() {
                var s, e = this,
                    o = t(e.$owlItems[e.currentItem]).find("img");

                function n() {
                    var s = t(e.$owlItems[e.currentItem]).height();
                    e.wrapperOuter.css("height", s + "px"), e.wrapperOuter.hasClass("autoHeight") || i.setTimeout(function() { e.wrapperOuter.addClass("autoHeight") }, 0)
                }
                void 0 !== o.get(0) ? (s = 0, function t() { s += 1, e.completeImg(o.get(0)) ? n() : s <= 100 ? i.setTimeout(t, 100) : e.wrapperOuter.css("height", "") }()) : n()
            },
            completeImg: function(t) { return !!t.complete && ("undefined" === typeof t.naturalWidth || 0 !== t.naturalWidth) },
            onVisibleItems: function() {
                var i;
                for (!0 === this.options.addClassActive && this.$owlItems.removeClass("active"), this.visibleItems = [], i = this.currentItem; i < this.currentItem + this.options.items; i += 1) this.visibleItems.push(i), !0 === this.options.addClassActive && t(this.$owlItems[i]).addClass("active");
                this.owl.visibleItems = this.visibleItems
            },
            transitionTypes: function(t) { this.outClass = "owl-" + t + "-out", this.inClass = "owl-" + t + "-in" },
            singleItemTransition: function() {
                var t = this,
                    i = t.outClass,
                    s = t.inClass,
                    e = t.$owlItems.eq(t.currentItem),
                    o = t.$owlItems.eq(t.prevItem),
                    n = Math.abs(t.positionsInArray[t.currentItem]) + t.positionsInArray[t.prevItem],
                    a = Math.abs(t.positionsInArray[t.currentItem]) + t.itemWidth / 2,
                    r = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend";
                t.isTransition = !0, t.$owlWrapper.addClass("owl-origin").css({ "-webkit-transform-origin": a + "px", "-moz-perspective-origin": a + "px", "perspective-origin": a + "px" }), o.css(function(t) { return { position: "relative", left: t + "px" } }(n)).addClass(i).on(r, function() { t.endPrev = !0, o.off(r), t.clearTransStyle(o, i) }), e.addClass(s).on(r, function() { t.endCurrent = !0, e.off(r), t.clearTransStyle(e, s) })
            },
            clearTransStyle: function(t, i) { t.css({ position: "", left: "" }).removeClass(i), this.endPrev && this.endCurrent && (this.$owlWrapper.removeClass("owl-origin"), this.endPrev = !1, this.endCurrent = !1, this.isTransition = !1) },
            owlStatus: function() { this.owl = { userOptions: this.userOptions, baseElement: this.$elem, userItems: this.$userItems, owlItems: this.$owlItems, currentItem: this.currentItem, prevItem: this.prevItem, visibleItems: this.visibleItems, isTouch: this.browser.isTouch, browser: this.browser, dragDirection: this.dragDirection } },
            clearEvents: function() { this.$elem.off(".owl owl mousedown.disableTextSelect"), t(s).off(".owl owl"), t(i).off("resize", this.resizer) },
            unWrap: function() { 0 !== this.$elem.children().length && (this.$owlWrapper.unwrap(), this.$userItems.unwrap().unwrap(), this.owlControls && this.owlControls.remove()), this.clearEvents(), this.$elem.attr("style", this.$elem.data("owl-originalStyles") || "").attr("class", this.$elem.data("owl-originalClasses")) },
            destroy: function() { this.stop(), i.clearInterval(this.checkVisible), this.unWrap(), this.$elem.removeData() },
            reinit: function(i) {
                var s = t.extend({}, this.userOptions, i);
                this.unWrap(), this.init(s, this.$elem)
            },
            addItem: function(t, i) { var s; return !!t && (0 === this.$elem.children().length ? (this.$elem.append(t), this.setVars(), !1) : (this.unWrap(), (s = void 0 === i || -1 === i ? -1 : i) >= this.$userItems.length || -1 === s ? this.$userItems.eq(-1).after(t) : this.$userItems.eq(s).before(t), void this.setVars())) },
            removeItem: function(t) {
                var i;
                if (0 === this.$elem.children().length) return !1;
                i = void 0 === t || -1 === t ? -1 : t, this.unWrap(), this.$userItems.eq(i).remove(), this.setVars()
            }
        };
        t.fn.owlCarousel = function(i) {
            return this.each(function() {
                if (!0 === t(this).data("owl-init")) return !1;
                t(this).data("owl-init", !0);
                var s = Object.create(e);
                s.init(i, this), t.data(this, "owlCarousel", s)
            })
        }, t.fn.owlCarousel.options = { items: 5, itemsCustom: !1, itemsDesktop: [1199, 4], itemsDesktopSmall: [979, 3], itemsTablet: [768, 2], itemsTabletSmall: !1, itemsMobile: [479, 1], singleItem: !1, itemsScaleUp: !1, slideSpeed: 200, paginationSpeed: 800, rewindSpeed: 1e3, autoPlay: !1, stopOnHover: !1, navigation: !1, navigationText: ["prev", "next"], rewindNav: !0, scrollPerPage: !1, pagination: !0, paginationNumbers: !1, responsive: !0, responsiveRefreshRate: 200, responsiveBaseWidth: i, baseClass: "owl-carousel", theme: "owl-theme", lazyLoad: !1, lazyFollow: !0, lazyEffect: "fade", autoHeight: !1, jsonPath: !1, jsonSuccess: !1, dragBeforeAnimFinish: !0, mouseDrag: !0, touchDrag: !0, addClassActive: !1, transitionStyle: !1, beforeUpdate: !1, afterUpdate: !1, beforeInit: !1, afterInit: !1, beforeMove: !1, afterMove: !1, afterAction: !1, startDragging: !1, afterLazyLoad: !1 }
    }(jQuery, window, document);

/*!
 * Font Awesome Pro 5.14.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license (Commercial License)
 */
/* removed the code so the project can be stored on GitHub. Will reference via a CDN due to licensing. */