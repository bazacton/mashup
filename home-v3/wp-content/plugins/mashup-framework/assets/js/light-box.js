/**
 * ViewBox
 * @author Pavel Khoroshkov aka pgood
 * @link https://github.com/pgooood/viewbox
 */
!function(t){t.fn.viewbox=function(n){function e(e,i){var a,c,r=o("body"),d=o("content");e&&d.width(e),i&&d.height(i),k?(a=r.width(),c=r.height()):(k=!0,t("body").append(m),m.show(),a=r.width(),c=r.height(),m.hide(),m.fadeIn(n.openDuration)),r.css({"margin-left":-a/2,"margin-top":-c/2})}function i(t){return"undefined"!=typeof t?void("function"==typeof t&&T.push(t)):void(k&&m.fadeOut(n.closeDuration,function(){m.detach(),k=!1;for(var t=[];T.length;)t.push(T.shift());for(;t.length;)t.shift()()}))}function o(t){return m.find(".viewbox-"+t)}function a(t,n){o(t).html(n)}function c(){var t=-1;return b&&x.each(function(n){return b.is(this)?(t=n,!1):void 0}),t}function r(){if(!(x.length<=1)){var t=c()+1;t>=x.length&&(t=0),x.eq(t).click()}}function d(){if(!(x.length<=1)){var t=c()-1;0>t&&(t=x.length-1),x.eq(t).click()}}function s(t){return t.match(/(png|jpg|jpeg|gif)$/i)}function l(n){return n.match(/^#.+$/i)&&t(n).length}function u(t){return t.get(0).complete}function h(t){t?y.appendTo(o("body")):y.detach()}function v(n){var e=t('<div class="viewbox-button-default viewbox-button-'+n+'"></div>'),i=window.location.pathname+window.location.search+"#viewbox-"+n+"-icon";return e.appendTo(m).get(0).insertAdjacentHTML("afterbegin",'<svg><use xlink:href="'+i+'"/></svg>'),e}function f(i,c){var r=t('<img class="viewbox-image" alt="">').attr("src",i);u(r)||h(!0),a("content",""),a("header",c),e();var d=o("body"),s=0,l=o("content"),v=window.setInterval(function(){if(!u(r)&&1e3>s)return void s++;window.clearInterval(v),h(!1),t("body").append(r);var e=d.width()-l.width()+2*n.margin,i=d.height()-l.height()+2*n.margin,o=t(window).width()-e,a=t(window).height()-i,c=r.width(),f=r.height();r.detach(),c>o&&(f=f*o/c,c=o),f>a&&(c=c*a/f,f=a),M=!0,d.animate({"margin-left":-(c+e)/2+n.margin,"margin-top":-(f+i)/2+n.margin},n.resizeDuration),l.animate({width:c,height:f},n.resizeDuration,function(){l.append(r),M=!1})},u(r)?0:200)}function g(n,c){var r=t('<div class="viewbox-content-placeholder"></div>'),d=t(n);d.before(r),i(function(){r.before(d),r.detach()}),a("content",""),a("header",c),o("content").append(d),e("auto","auto")}function p(t){if(!M){var e=t.attr("href"),i=n.setTitle&&t.attr("title")?t.attr("title"):"";e?s(e)?(b=t,f(e,i)):l(e)&&(b=t,g(e,i)):(b=t,g(t,i))}}function w(t,n){if("function"==typeof n){var e,i,o=150,a=100,c=300;t.on("touchstart",function(t){var n=t.originalEvent.changedTouches[0];e={x:n.pageX,y:n.pageY},i=(new Date).getTime()}),t.on("touchend",function(t){var r=t.originalEvent.changedTouches[0],d="none",s=(new Date).getTime()-i,l={x:r.pageX,y:r.pageY},u={x:l.x-e.x,y:l.y-e.y};c>=s&&(Math.abs(u.x)>=o&&Math.abs(u.y)<=a?d=u.x<0?"left":"right":Math.abs(u.y)>=o&&Math.abs(u.x)<=a&&(d=u.y<0?"up":"down")),n.call(this,d)})}}"undefined"==typeof n&&(n={}),n=t.extend({template:'<div class="viewbox-container"><div class="viewbox-body"><div class="viewbox-header"></div><div class="viewbox-content"></div><div class="viewbox-footer"></div></div></div>',loader:'<div class="loader"><div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>',setTitle:!0,margin:20,resizeDuration:400,openDuration:200,closeDuration:200,closeButton:!0,navButtons:!0,closeOnSideClick:!0,nextOnContentClick:!1,useGestures:!0},n);var b,x=t(this),m=t(n.template),y=t(n.loader),k=!1,M=!1,T=[];return t("#viewbox-sprite").length||t("body").get(0).insertAdjacentHTML("afterbegin",'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="viewbox-sprite" style="display:none"><symbol id="viewbox-close-icon" viewBox="0 0 50 50"><path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z"/></symbol><symbol id="viewbox-prev-icon" viewBox="0 0 50 50"><path d="M27.3 34.7L17.6 25l9.7-9.7 1.4 1.4-8.3 8.3 8.3 8.3z"/></symbol><symbol id="viewbox-next-icon" viewBox="0 0 50 50"><path d="M22.7 34.7l-1.4-1.4 8.3-8.3-8.3-8.3 1.4-1.4 9.7 9.7z"/></symbol></svg>'),m.bind("viewbox.close",function(){i()}),m.bind("viewbox.open",function(t,n){var e=function(){x.length&&p(x.eq(n>=0&&n<x.length?n:0))};k?(i(e),i()):e()}),x.filter("a").click(function(){return p(t(this)),!1}),o("body").click(function(t){t.stopPropagation(),n.nextOnContentClick&&r()}),n.closeButton&&v("close").click(function(t){t.stopPropagation(),i()}),n.navButtons&&x.length>1&&(v("next").click(function(t){t.stopPropagation(),r()}),v("prev").click(function(t){t.stopPropagation(),d()})),n.closeOnSideClick&&m.click(function(){i()}),n.useGestures&&"ontouchstart"in document.documentElement&&w(m,function(t){switch(t){case"left":r();break;case"right":d()}}),m}}(jQuery);



jQuery(function(){
			
			jQuery('.facny-popup').viewbox();
			jQuery('.thumbnail-2').viewbox();
			
			(function(){
				var vb = jQuery('.popup-link').viewbox();
				jQuery('.popup-open-button').click(function(){
					vb.trigger('viewbox.open');
				});
				jQuery('.close-button').click(function(){
					vb.trigger('viewbox.close');
				});
			})();
			
			(function(){
				var vb = jQuery('.popup-steps').viewbox({navButtons:false});
				
				jQuery('.steps-button').click(function(){
					vb.trigger('viewbox.open',[0]);
				});
				
				jQuery('.next-button').click(function(){
					vb.trigger('viewbox.open',[1]);
				});
				jQuery('.prev-button').click(function(){
					vb.trigger('viewbox.open',[0]);
				});
				jQuery('.ok-button').click(function(){
					vb.trigger('viewbox.close');
				});
			})();
			
		});