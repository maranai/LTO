!function(c){var b='[data-dismiss="alert"]',a=function(d){c(d).on("click",b,this.close)};a.prototype={constructor:a,close:function(i){var h=c(this),f=h.attr("data-target"),g;if(!f){f=h.attr("href");f=f&&f.replace(/.*(?=#[^\s]*$)/,"")}g=c(f);g.trigger("close");i&&i.preventDefault();g.length||(g=h.hasClass("alert")?h:h.parent());g.removeClass("in");function d(){g.remove();g.trigger("closed")}c.support.transition&&g.hasClass("fade")?g.on(c.support.transition.end,d):d()}};c.fn.alert=function(d){return this.each(function(){var f=c(this),e=f.data("alert");if(!e){f.data("alert",(e=new a(this)))}if(typeof d=="string"){e[d].call(f)}})};c.fn.alert.Constructor=a;c(function(){c("body").on("click.alert.data-api",b,a.prototype.close)})}(window.jQuery);