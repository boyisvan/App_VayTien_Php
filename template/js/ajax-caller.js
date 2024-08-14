! function (e) {
    "use strict";
    e("body").on("click", "a[data-ajax]", function (t) {
       t.preventDefault(), window.ajaxCaller.doAjax(this, this.href, e(this).data())
    }).on("submit", "form[data-ajax]", function (t) {
       t.preventDefault(), window.ajaxCaller.doAjax(this, this.action, e(this).serialize())
    }), e("body").on("click", "form[data-ajax] button[type='submit']", function (t) {
       t.preventDefault(), e(this).prop("disabled", "disabled"), e(this).parents("form:first").submit()
    })
 }(jQuery), window.ajaxCaller = window.ajaxCaller || {}, window.ajaxCaller.loadResponse = function (e, t, a) {
    if (void 0 !== e && "" !== e.selector && (void 0 !== t.content ? (e.html(t.content), $("#click-review-course").length > 0 && ($("#click-review-course").click(), $(window).width() < 543 && ($("body").css("overflow", "auto"), $("main").removeClass("popup-review-lesson")))) : e.html(t)), void 0 !== t.showModal && void 0 !== t.content && bootbox.dialog({
          message: '<div style="text-align: center;">' + t.content + "</div>",
          closeButton: !0,
          backdrop: !0,
          onEscape: !0
       }), $(a).is("form") && !0 !== $(a).data("keep-values") && "true" !== $(a).data("keep-values")) {
       a.reset();
       var o = $(a).find("button[type=submit]");
       o.length > 0 && o.prop("disabled", !1)
    }
    $(a).trigger("ajax.updated", [t])
 }, window.ajaxCaller.doAjax = function (e, t, a) {
    var o = $(e).data(),
       n = e.title || $(e).text() || t,
       i = $(e).data("target"),
       d = $(i);
    if ($(e).is("form")) {
       var l = $(e).find("button[type=submit]");
       l.length > 0 && l.prop("disabled", "disabled"), "get" !== e.method && "GET" !== e.method ? $.post(t, a, function (t) {
          window.ajaxCaller.loadResponse(d, t, e), l.length > 0 && l.removeAttr("disabled")
       }) : $.get(t, a, function (t) {
          window.ajaxCaller.loadResponse(d, t, e), l.length > 0 && l.removeAttr("disabled")
       })
    } else {
       if (d.removeData("bs.modal").removeData("modal"), "false" !== o.pushState && !1 !== o.pushState && window.history.pushState(o, n, t), "popup" === o.toggle) return d.one("shown.bs.modal", function (o) {
          window.history.replaceState("kyna", "kyna", a.currentUrl), $.get(t, a, function (t) {
             var a = $(o.target).find(".modal-content");
             window.ajaxCaller.loadResponse(a, t, e)
          })
       }), d.one("hidden.bs.modal", function (t) {
          $(t.target).removeData("bs.modal").removeData("modal").find(".modal-content").empty(), "false" !== o.pushState && !1 !== o.pushState && window.history.back(), o.disableParent && $(e).addClass("disabled"), o.disableParentText && $(e).text(o.disableParentText)
       }), void d.modal("show");
       $.get(t, a, function (t) {
          window.ajaxCaller.loadResponse(d, t, e)
       })
    }
 };