!function(c){function d(b,h){var a=c.proxy(this.process,this),j=c(b).is("body")?c(window):c(b),i;this.options=c.extend({},c.fn.scrollspy.defaults,h);this.$scrollElement=j.on("scroll.scroll.data-api",a);this.selector=(this.options.target||((i=c(b).attr("href"))&&i.replace(/.*(?=#[^\s]+$)/,""))||"")+" .nav li > a";this.$body=c("body").on("click.scroll.data-api",this.selector,a);this.refresh();this.process()}d.prototype={constructor:d,refresh:function(){this.targets=this.$body.find(this.selector).map(function(){var a=c(this).attr("href");return/^#\w/.test(a)&&c(a).length?a:null});this.offsets=c.map(this.targets,function(a){return c(a).position().top})},process:function(){var b=this.$scrollElement.scrollTop()+this.options.offset,h=this.offsets,j=this.targets,a=this.activeTarget,i;for(i=h.length;i--;){a!=j[i]&&b>=h[i]&&(!h[i+1]||b<=h[i+1])&&this.activate(j[i])}},activate:function(a){var b;this.activeTarget=a;this.$body.find(this.selector).parent(".active").removeClass("active");b=this.$body.find(this.selector+'[href="'+a+'"]').parent("li").addClass("active");if(b.parent(".dropdown-menu")){b.closest("li.dropdown").addClass("active")}}};c.fn.scrollspy=function(a){return this.each(function(){var b=c(this),g=b.data("scrollspy"),h=typeof a=="object"&&a;if(!g){b.data("scrollspy",(g=new d(this,h)))}if(typeof a=="string"){g[a]()}})};c.fn.scrollspy.Constructor=d;c.fn.scrollspy.defaults={offset:10};c(function(){c('[data-spy="scroll"]').each(function(){var a=c(this);a.scrollspy(a.data())})})}(window.jQuery);