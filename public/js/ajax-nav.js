/**
 * Created by avengerweb on 18.07.15.
 */
(function (d) {
    var g = {
        intTrigger: ".ajax",
        switchContent: !0,
        showLoader: !0,
        scrollToPosition: !0,
        scrollSpeed: 500,
        useHistory: !0,
        cacheDocumentTitle: !1,
        loaded: null,
        error: null
    }, e = {
        init: function (b) {
            var c = this.selector, a = d.extend({}, g, b);
            a.useHistory && h && history.replaceState(i(d.extend({selector: c}, a)), "", location.href);
            return this.each(function () {
                var b = d(this);
                b.selector = c;
                a.ajaxNavContainer = b;
                d(document).on("click", a.intTrigger, a, f);
                b.data("ajaxNav-triggers", {intTrigger: a.intTrigger})
            })
        }, overlay: function (b) {
            var c = d.extend({}, g, b);
            return this.each(function () {
                //Here overlay code
            })
        }
    };
    e.navigate = function (b) {
        var c = this.selector, a = d.extend({}, g, b);
        return !a.url ? this : this.each(function () {
            var b = d(this), f = b.data("jnavloaded") || a.loaded;
            b.data("jnavlasttrigger", a.trigger);

            get_url = a.url;
            d.ajax({
                type: a.httpmethod || "GET",
                url: get_url,
                data: (a.params || ""),
                dataType: "html",
                success: function (g) {
                    var j = b.data("ajaxNav-overlay");
                    if (a.switchContent) {
                        b.html(g);

                        if (a.docTitle)
                            document.title = a.docTitle;

                        a.scrollToPosition && e.scrollTo(a.url.replace(/^[^#]*/, ""), a.scrollSpeed)
                    }
                    f && (b.data("jnavloaded", f), f.call(b, g));
                    a.useHistory && h && "GET" === (a.httpmethod || "GET").toUpperCase() && k !== a.url && history.pushState(i(d.extend(a, {selector: c})), "", a.url);
                    $(document).trigger("loaded");
                },
                error: a.error || function () {
                    a.$form && a.$form.length ? a.$form.submit() : location.href = a.url
                }
            })
        })
    };
    e.destroy = function () {
        return this.each(function () {
            var b = d(this), c = b.data("ajaxNav-triggers");
            c && (b.off(c.intTrigger, "click", f), d.removeData(b, "ajaxNav-triggers"))
        })
    };
    e.scrollTo = function (b, c) {
        var a = d(b).offset() || {top: 0};
        c ? d("html, body").delay(150).animate({scrollTop: a.top}, c) : d(window).scrollTop(a.top)
    };
    var f = function (b) {
        var c = d(this), a = {url: null, httpmethod: "GET", params: "", $form: null};
        if ("INPUT" === this.nodeName || "BUTTON" === this.nodeName) {
            if (a.$form = c.closest("form"), a.$form.length)a.url = a.$form.attr("action") || location.href, a.httpmethod = a.$form.attr("method"), a.params += "&" + a.$form.serialize(), c.attr("name") && (a.params += "&ajaxNavTrigger=" + c.attr("name"))
        } else a.url = c.attr("href");
        a.trigger = c;
        a.url && (b.preventDefault(), e.navigate.call(b.data.ajaxNavContainer, d.extend(b.data, a)))
    }, i = function (b) {
        var c = {};
        for (key in b)b.hasOwnProperty(key) && ~"boolean,number,string".search(typeof b[key]) && (c[key] = b[key]);
        c.url || (c.url = window.location.href);
        if (b.cacheDocumentTitle)c.docTitle = document.title;
        return c
    }, h = !(!history || !history.pushState), k = location.href;
    h && window.addEventListener("popstate", function (b) {
        if (b.state && b.state.selector)k = b.state.url, e.navigate.call(d(b.state.selector), b.state)
    }, !1);
    d.fn.ajaxNav = function (b) {
        if (e[b])return e[b].apply(this, Array.prototype.slice.call(arguments, 1));
        if ("object" === typeof b)return e.init.apply(this, arguments)
    }
})(jQuery);