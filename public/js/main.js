!function(t){var e={intTrigger:".ajax",switchContent:!0,showLoader:!0,scrollToPosition:!0,scrollSpeed:500,useHistory:!0,cacheDocumentTitle:!1,loaded:null,error:null},n={init:function(n){var r=this.selector,s=t.extend({},e,n);return s.useHistory&&o&&history.replaceState(a(t.extend({selector:r},s)),"",location.href),this.each(function(){var e=t(this);e.selector=r,s.ajaxNavContainer=e,t(document).on("click",s.intTrigger,s,i),e.data("ajaxNav-triggers",{intTrigger:s.intTrigger})})},overlay:function(n){t.extend({},e,n);return this.each(function(){})}};n.navigate=function(i){var s=this.selector,l=t.extend({},e,i);return l.url?this.each(function(){var e=t(this),i=e.data("jnavloaded")||l.loaded;e.data("jnavlasttrigger",l.trigger),get_url=l.url,t.ajax({type:l.httpmethod||"GET",url:get_url,data:l.params||"",dataType:"html",success:function(c){e.data("ajaxNav-overlay");l.switchContent&&(e.html(c),l.docTitle&&(document.title=l.docTitle),l.scrollToPosition&&n.scrollTo(l.url.replace(/^[^#]*/,""),l.scrollSpeed)),i&&(e.data("jnavloaded",i),i.call(e,c)),l.useHistory&&o&&"GET"===(l.httpmethod||"GET").toUpperCase()&&r!==l.url&&history.pushState(a(t.extend(l,{selector:s})),"",l.url)},error:l.error||function(){l.$form&&l.$form.length?l.$form.submit():location.href=l.url}})}):this},n.destroy=function(){return this.each(function(){var e=t(this),n=e.data("ajaxNav-triggers");n&&(e.off(n.intTrigger,"click",i),t.removeData(e,"ajaxNav-triggers"))})},n.scrollTo=function(e,n){var i=t(e).offset()||{top:0};n?t("html, body").delay(150).animate({scrollTop:i.top},n):t(window).scrollTop(i.top)};var i=function(e){var i=t(this),a={url:null,httpmethod:"GET",params:"",$form:null};"INPUT"===this.nodeName||"BUTTON"===this.nodeName?(a.$form=i.closest("form"),a.$form.length&&(a.url=a.$form.attr("action")||location.href,a.httpmethod=a.$form.attr("method"),a.params+="&"+a.$form.serialize(),i.attr("name")&&(a.params+="&ajaxNavTrigger="+i.attr("name")))):a.url=i.attr("href"),a.trigger=i,a.url&&(e.preventDefault(),n.navigate.call(e.data.ajaxNavContainer,t.extend(e.data,a)))},a=function(t){var e={};for(key in t)t.hasOwnProperty(key)&&~"boolean,number,string".search(typeof t[key])&&(e[key]=t[key]);return e.url||(e.url=window.location.href),t.cacheDocumentTitle&&(e.docTitle=document.title),e},o=!(!history||!history.pushState),r=location.href;o&&window.addEventListener("popstate",function(e){e.state&&e.state.selector&&(r=e.state.url,n.navigate.call(t(e.state.selector),e.state))},!1),t.fn.ajaxNav=function(t){return n[t]?n[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"==typeof t?n.init.apply(this,arguments):void 0}}(jQuery);var AvengerWeb={container:null,initialize:function(){this.container=$("#content"),this.content=$(".content-container"),this.menu.initialize(),this.welcome(),this.container.find(".container").ajaxNav({intTrigger:"a:not(.direct)",loaded:function(){AvengerWeb.reloadDates()}}),AvengerWeb.reloadDates();var t=$("meta[name=_token]").attr("content");$.ajaxSetup({beforeSend:function(e,n){/^(GET|HEAD|OPTIONS|TRACE)$/i.test(n.type)||e.setRequestHeader("X-XSRF-TOKEN",t)}})},reloadDates:function(){$(".blog .date").each(function(){var t=$(this);t.html(moment(t.html()).calendar())})},welcome:function(){this.content.hide(),this.container.addClass("welcome-animate");var t=this.container.find(".welcome"),e=t.find(".laravel-title"),n=t.find(".avenger-web"),i=e.text().trim().split(""),a=AvengerWeb.menu.container.find(".logo");a.css("visibility","hidden").hide(),e.text("");for(var o in i)e.append("<span class='letter'>"+i[o]+"</span>");var r=e.find(".letter");setTimeout(function(){var i=300;r.each(function(){var t=$(this);setTimeout(function(){t.addClass("to-bottom")},i),i+=300}),setTimeout(function(){e.fadeOut(100),n.fadeIn(500,function(){setTimeout(function(){t.find(".quote").hide(100,function(){a.slideDown(600),$(this).remove(),n.find(".last-word").css({"font-size":20,top:-6}),n.animate({"font-size":"55px"},500),t.css("z-index","1001").animate({left:147,"margin-top":-179},600,function(){$(this).hide(),a.css("visibility","visible"),AvengerWeb.content.show(),$(".menu-button").removeClass("hidden"),AvengerWeb.container.removeClass("welcome-animate")})})},1200),setTimeout(function(){AvengerWeb.menu.toggleMenu(),$(".blog").removeClass("hidden")},500),$(this).addClass("active")})},i+100)},300)},menu:{container:null,btnOpen:null,btnClose:null,isOpen:!1,isAnimating:!1,morph:null,svg:null,path:null,initialPath:null,steps:null,stepsTotal:0,initialize:function(){this.container=$("header"),this.morph=$("#morph-shape"),this.svg=Snap(this.morph.find("svg").get(0)),this.path=this.svg.select("path"),this.initialPath=this.path.attr("d"),this.steps=this.morph.data("morph-open").split(";"),this.stepsTotal=this.steps.length,this.container.on("click","#open-button, #close-button",function(){AvengerWeb.menu.toggleMenu()})},toggleMenu:function(){if(this.isAnimating)return!1;if(this.isAnimating=!0,this.isOpen)this.container.removeClass("show-menu"),setTimeout(function(){AvengerWeb.menu.path.attr("d",AvengerWeb.menu.initialPath),AvengerWeb.menu.isAnimating=!1},300);else{this.container.addClass("show-menu");var t=0,e=function(t){return t>AvengerWeb.menu.stepsTotal-1?void(AvengerWeb.menu.isAnimating=!1):(AvengerWeb.menu.path.animate({path:AvengerWeb.menu.steps[t]},0===t?400:500,0===t?mina.easein:mina.elastic,function(){e(t)}),void t++)};e(t)}this.isOpen=!this.isOpen}}};$(document).ready(function(){AvengerWeb.initialize()});