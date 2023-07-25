var $ = jQuery;
$(document).ready(function () {
    "use strict";
    
    var $ = jQuery;
    if (jQuery('#playlist').length != '') {
        jQuery("#playlist").playlist({
            playerurl: "assets/swf/drplayer.swf"
        });
    }
    jQuery('.playlist-toggel').on('click', function(event) {
        event.preventDefault();
        $(".jp-playlist").toggleClass('jp-playlist-open');
    });	
});

if (jQuery('.btn-album.btn-play').length != '') {
    "use strict";
    $(document).on('click', '.btn-album.btn-play', function () {

        if ($('.img-holder').hasClass("active")) {
            $('.img-holder').removeClass('active');
        } else {
            $('.img-holder').addClass('active');
        }
    });
}
if (jQuery('.btn-album.btn-pause').length != '') {
    "use strict";
    $(document).on("click", ".btn-album.btn-pause", function () {
        $('.img-holder').removeClass('active');
    });
}

$(document).on('click', '.mashup-load-more', function () {
    "use strict";
    var ajax_url = jQuery(".music-album").data('ajax-url');
    var this_id = jQuery(this).data('id');
    var data_obj = eval('load_data_' + this_id);
    var total_pages = data_obj.total_pages;
    var page_num = jQuery(this).attr('data-page');
    var per_page = data_obj.per_page;
    var order_by = data_obj.order_by;
    var order = data_obj.order;
    var title_length = data_obj.title_length;
    var album_cats = data_obj.album_cats;
    var this_col_class = data_obj.this_col_class;
    var this_loader = jQuery(this);
    var list_loader = jQuery('#load-list-' + this_id);
    jQuery(this_loader).html(load_albums_strings.loading);
    jQuery.ajax({
        url: ajax_url,
        method: "POST",
        data: {
            total_pages: total_pages,
            page_num: page_num,
            per_page: per_page,
            order_by: order_by,
            order: order,
            title_length: title_length,
            album_cats: album_cats,
            this_col_class: this_col_class,
            action: 'mashup_load_more_albums'
        },
        dataType: "json"
    }).done(function (response) {
        this_loader.html(load_albums_strings.load_more);
        list_loader.append(response.list);
        this_loader.attr('data-page', response.page_num);
        if (response.page_num == total_pages) {
            jQuery('#load-more-' + this_id).remove();
        }
    }).fail(function () {
        this_loader.html(load_albums_strings.load_more);
    });
});

$(document).on('click', '.mashup-event-load-more', function () {
    "use strict";
    
    
    var this_id = jQuery(this).data('id');
    var data_obj = eval('load_data_' + this_id);
    var page_num = jQuery(this).attr('data-page');
    var ajax_url = jQuery(this).attr('data-ajaxurl');
    var total_pages = data_obj.total_pages;
    var per_page = data_obj.per_page;
    
    var event_listing_type = data_obj.event_listing_type;
    var meta_key = data_obj.meta_key;
    var meta_value = data_obj.meta_value;
    var meta_compare = data_obj.meta_compare;
    var event_cats = data_obj.event_cats;
    
    var order_by = data_obj.order_by;
    var order = data_obj.order;
    var title_length = data_obj.title_length;
    
    var this_loader = jQuery(this);
    var list_loader = jQuery('#events-load-list-' + this_id);
    
    jQuery(this_loader).html(load_albums_strings.loading);
    jQuery.ajax({
        url: ajax_url,
        method: "POST",
        data: {
            total_pages: total_pages,
            page_num: page_num,
            per_page: per_page,
            event_listing_type:event_listing_type,
            meta_key:meta_key,
            meta_value:meta_value,
            meta_compare:meta_compare,
            event_cats:event_cats,
            order_by: order_by,
            order: order,
            title_length: title_length,
            action: 'mashup_load_more_events'
        },
        dataType: "json"
    }).done(function (response) {
        this_loader.html(load_albums_strings.load_more);
        list_loader.append(response.list);
        this_loader.attr('data-page', response.page_num);
        if (response.page_num == total_pages) {
            jQuery('#events-load-more-' + this_id).remove();
        }
    }).fail(function () {
        this_loader.html(load_albums_strings.load_more);
    });
});

$(document).on('click', '.mashup-dev-play-btn', function () {
    "use strict";

    var _this = $(this);
    var _this_id = $(this).data('id');
    var _this_class = _this.attr('class');
    var _this_html = _this.html();
    $('.mashup-dev-play-btn').html(load_albums_strings.play);
    $('.mashup-dev-play-btn').removeClass('pause-audio');
    $('.mashup-dev-play-btn').removeClass('play-audio');
    $('.mashup-dev-play-btn').addClass('play-audio');
    //
    // for header btn
    $('.mashup-dev-play-btnn').removeClass('pause-audio');
    $('.mashup-dev-play-btnn').removeClass('play-audio');
    $('.mashup-dev-play-btnn').removeClass('btn-pause');
    $('.mashup-dev-play-btnn').removeClass('btn-play');
    $('.mashup-dev-play-btnn').parent('.user-play').removeClass('user-pause');
    $('.mashup-dev-play-btnn').addClass('play-audio');
    $('.mashup-dev-play-btnn').addClass('btn-play');
    //
    $('.mashup-dev-music-beat').hide();
    $('#jp_container_' + _this_id).find('.jp-play').trigger('click');

    _this.attr('class', _this_class);
    _this.html(_this_html);

    if (_this.hasClass('play-audio')) {
        _this.html(load_albums_strings.pause);
        _this.removeClass('play-audio');
        _this.addClass('pause-audio');
        _this.parents('figcaption').find('.mashup-dev-music-beat').show();
    } else {
        _this.html(load_albums_strings.play);
        _this.removeClass('pause-audio');
        _this.addClass('play-audio');
        _this.parents('figcaption').find('.mashup-dev-music-beat').hide();
    }
});

$(document).on('click', '.mashup-dev-play-btnn', function () {
    "use strict";

    var _this = $(this);
    var _this_id = $(this).data('id');
    var _this_class = _this.attr('class');
    
    //
    $('.mashup-dev-play-btn').html(load_albums_strings.play);
    $('.mashup-dev-play-btn').removeClass('pause-audio');
    $('.mashup-dev-play-btn').removeClass('play-audio');
    $('.mashup-dev-play-btn').removeClass('btn-pause');
    $('.mashup-dev-play-btn').removeClass('btn-play');
    $('.mashup-dev-play-btn').addClass('play-audio');
    $('.mashup-dev-music-beat').hide();
    //
    
    _this.attr('class', _this_class);
    
    $('#jp_container_' + _this_id).find('.jp-play').trigger('click');
    if (_this.hasClass('play-audio')) {
        _this.removeClass('play-audio');
        _this.addClass('pause-audio');
        _this.removeClass('btn-play');
        _this.addClass('btn-pause');
    } else {
        _this.removeClass('pause-audio');
        _this.addClass('play-audio');
        _this.removeClass('btn-pause');
        _this.addClass('btn-play');
    }
});

$(document).on('click', '.mashup-dev-det-audio', function () {
    "use strict";

    var _this = $(this);

    $('.mashup-dev-first-track').find('.jp-play').trigger('click');

    if (_this.hasClass('play-audio')) {
        _this.removeClass('play-audio');
        _this.addClass('pause-audio');
        _this.removeClass('btn-play');
        _this.addClass('btn-pause');
    } else {
        _this.removeClass('pause-audio');
        _this.addClass('play-audio');
        _this.removeClass('btn-pause');
        _this.addClass('btn-play');
    }
});

$(document).on('click', '.mashup-dev-album-player .jp-play', function () {
    "use strict";

    var _this = $('.mashup-dev-det-audio');
    if (_this.hasClass('pause-audio')) {
        _this.removeClass('pause-audio');
        _this.addClass('play-audio');
        _this.removeClass('btn-pause');
        _this.addClass('btn-play');
    }
});
