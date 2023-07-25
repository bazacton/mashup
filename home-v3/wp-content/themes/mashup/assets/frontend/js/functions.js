var $ = jQuery;
$(document).ready(function () {
    "use strict";

    if (jQuery(".main-navigation>ul").length != '') {
        jQuery('.main-navigation>ul').slicknav({
            prependTo: '.main-nav'
        });
    }
	/*  Btn Top */
	
    jQuery('.btn-top').on('click', function (e) {
        e.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, 800);
    });
    /*Play Pause*/
    jQuery('.user-play').on('click', function (event) {
        event.preventDefault();
        jQuery(this).toggleClass('user-pause');
    });
    /*Play Pause*/

    /*Blog post Slider*/
    if (jQuery(".main-post.swiper-container").length != '') {
        var swiper = new Swiper('.main-post.swiper-container', {
            slidesPerView: 'auto',
            loop: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
            spaceBetween: 0,
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
        setTimeout(function () {
            jQuery("div.swiper-loader").fadeOut(200, function () {
                $(this).remove();
            });
        }, 5000);
    }
	
	/*Back To Top*/
	jQuery(".woocommerce-review-link").on('click', function (event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			jQuery('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function () {
				window.location.hash = hash;
			});
		}
	});
	

    /*Blog Small Slider*/
    if (jQuery(".blog-small-slider-holder.swiper-container").length != '') {
        var swiper = new Swiper('.blog-small-slider-holder.swiper-container', {
            slidesPerView: 'auto',
            loop: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
            spaceBetween: 0,
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
        setTimeout(function () {
            jQuery("div.swiper-loader").fadeOut(200, function () {
                $(this).remove();
            });
        }, 5000);
    }

    /*Blog Medium Slider*/
    if (jQuery(".blog-medium-slider-holder.swiper-container").length != '') {
        var swiper = new Swiper('.blog-medium-slider-holder.swiper-container', {
            slidesPerView: 'auto',
            loop: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
            spaceBetween: 0,
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
        setTimeout(function () {
            jQuery("div.swiper-loader").fadeOut(200, function () {
                $(this).remove();
            });
        }, 5000);
    }
    /*Blog Masonary Slider*/

    if (jQuery(".blog-masonary-slider-holder.swiper-container").length != '') {
        var swiper = new Swiper('.blog-masonary-slider-holder.swiper-container', {
            slidesPerView: 'auto',
            loop: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
            spaceBetween: 0,
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });
        setTimeout(function () {
            jQuery("div.swiper-loader").fadeOut(200, function () {
                $(this).remove();
            });
        }, 5000);
    }


    if (jQuery('.quantity').length != '') {
        $(".qtyminus").on("click", function () {
            var _text_val = $(this).next("input.input-text");
            if (parseInt(_text_val.val()) !== 0) {
                _text_val.val(parseInt(_text_val.val()) - 1);
            }
        });
        $(".qtyplus").on("click", function () {
            var _text_val = $(this).prev("input.input-text");
            _text_val.val(parseInt(_text_val.val()) + 1);
        });
    }
    /*Fancybox Media Box*/
    if (jQuery(".music-gallery").length != '') {
        jQuery('.music-gallery a.various').addClass("fancybox iframe");
        jQuery('.music-gallery a.various').addClass("fancybox-media");
        jQuery('.music-gallery a.various').removeClass("fancybox.iframe");
        jQuery('.fancybox-media').fancybox({
            openEffect: 'none',
            closeEffect: 'none',
            showNavArrows: true,
            helpers: {
                media: {}
            }
        });
    }

    //
    if (jQuery("ul.music-event-list li").length != '') {
        var listing = $("ul.music-event-list li");
        var numToShowing = 8;
        var buttons = $(".event-load");
        var numInListing = listing.length;
        listing.hide();
        if (numInListing > numToShowing) {
            buttons.show();
        }
        listing.slice(0, numToShowing).show();

        buttons.click(function () {
            var showing = listing.filter(':visible').length;
            listing.slice(showing - 1, showing + numToShowing).fadeIn();
            var nowShowing = listing.filter(':visible').length;
            if (nowShowing >= numInListing) {
                buttons.hide();
            }
        });
    }
    /*client-slider style end*/
    if (jQuery(".slider").length != '') {
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            fade: true
        });
    }
    if (jQuery("body").length != '') {
        jQuery("body").fitVids();
    }
});

$(window).load(function () {
    "use strict";
    if (jQuery(".grid").length != '') {
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 5
        });
    }
});

$(document).on('click', '.mashup-load-more-blogs', function () {
    "use strict";
    var ajax_url = jQuery(".mashup-dev-blog-list").data('ajax-url');
    var this_id = jQuery(this).data('id');
    var data_obj = eval('load_data_' + this_id);
    var total_pages = data_obj.total_pages;
    var page_num = jQuery(this).attr('data-page');
    var per_page = data_obj.per_page;
    var order_by = data_obj.order_by;
    var order = data_obj.order;
    var blog_view = data_obj.blog_view;
    var blog_cats = data_obj.blog_cats;
    var title_length = data_obj.title_length;
    var blog_excerpt = data_obj.blog_excerpt;
    var blog_description = data_obj.blog_description;
    var this_col_class = data_obj.this_col_class;
    var this_loader = jQuery(this);
    var list_loader = jQuery('#load-list-' + this_id);
    jQuery(this_loader).html(load_blogs_strings.loading);
    jQuery.ajax({
        url: ajax_url,
        method: "POST",
        data: {
            total_pages: total_pages,
            page_num: page_num,
            per_page: per_page,
            order_by: order_by,
            order: order,
            blog_view: blog_view,
            blog_cats: blog_cats,
            title_length: title_length,
            blog_excerpt: blog_excerpt,
            blog_description: blog_description,
            this_col_class: this_col_class,
            action: 'mashup_load_more_blogs'
        },
        dataType: "json"
    }).done(function (response) {
        this_loader.html(load_blogs_strings.load_more);
        list_loader.append(response.list);
        if (list_loader.hasClass('blog-masonry')) {
            setInterval(function () {
                list_loader.masonry('reloadItems');
                list_loader.masonry('layout');
            }, 100);
        }
        this_loader.attr('data-page', response.page_num);
        if (response.page_num == total_pages) {
            jQuery('#load-more-' + this_id).remove();
        }
    }).fail(function () {
        this_loader.html(load_blogs_strings.load_more);
    });
});

function mashup_rem_wc_item(item_key, ajax_url) {
    "use strict";

    var this_parent = jQuery('.cart-close-' + item_key).parents('li.item-' + item_key);
    var this_loader = jQuery('.cart-close-' + item_key);
    this_loader.html('<i class="icon-spinner8"></i>');
    jQuery.ajax({
        url: ajax_url,
        method: "POST",
        data: {
            prod_key: item_key,
            action: 'mashup_remove_wc_cart_item'
        },
        dataType: "json"
    }).done(function (response) {
        if (response.rem == 'true') {
            this_parent.hide('slow');
        }
        this_loader.html('<i class="icon-cancel2"></i>');
    }).fail(function () {
        this_loader.html('<i class="icon-cancel2"></i>');
    });
}