var $ = jQuery;

if (jQuery('body.rtl a.cs-help').length != '') {
    jQuery('body.rtl a.cs-help').attr("data-placement", "left");
    jQuery('body.rtl a.cs-help').attr("data-trigger", "click");

}


/*
 * Media Upload 
 */
jQuery(document).on("click", ".cs-mashup-media", function () {
    "use strict";
    var $ = jQuery;
    var id = $(this).attr("name");
    var custom_uploader = wp.media({
        title: 'Select File',
        button: {
            text: 'Add File'
        },
        multiple: false
    }).on('select', function () {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        jQuery('#' + id).val(attachment.url);
        jQuery('#' + id + '_img').attr('src', attachment.url);
        jQuery('#' + id + '_box').show();
    }).open();

});

jQuery(document).ready(function ($) {

    "use strict";

    $('[data-toggle="popover"]').popover();
    chosen_selectionbox();
    popup_over();

    /*
     * CS meta fileds Tabs
     */
    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0, 4); // For the above example, myUrlTabName = #tab
    jQuery("#tabbed-content > div").addClass('hidden-tab'); // Initially hide all content #####EDITED#####
    jQuery("#cs-options-tab li:first a").attr("id", "current"); // Activate first tab
    jQuery("#tabbed-content > div:first").hide().removeClass('hidden-tab').fadeIn(); // Show first tab content   #####EDITED#####
    jQuery("#cs-options-tab > li:first").addClass('active');

    jQuery(document).on("click", "#cs-options-tab li > a", function (e) {
        e.preventDefault();
        if (jQuery(this).attr("id") == "current") { //detection for current tab
            return
        } else {
            mashup_reset_tabs();
            console.log(this);
            jQuery("#cs-options-tab > li").removeClass('active')
            jQuery(this).attr("id", "current"); // Activate this
            jQuery(this).parents('li').addClass('active');
            jQuery(jQuery(this).attr('name')).hide().removeClass('hidden-tab').fadeIn(); // Show content for current tab
        }
    });

    var i;
    for (i = 1; i <= jQuery("#cs-options-tab li").length; i++) {
        if (myUrlTab == myUrlTabName + i) {
            mashup_reset_tabs();
            jQuery("a[name='" + myUrlTab + "']").attr("id", "current"); // Activate url tab
            jQuery(myUrlTab).hide().removeClass('hidden-tab').fadeIn(); // Show url tab content        
        }
    }

    /*
     * End CS meta fileds Tabs
     */
});
/*
 * 
 * @ function for preview image on change
 */
function mashup_change_preview_image(val, div_id, img_url, rand_id) {
    "use strict";

    var image_div_id = "#" + div_id;

    if (rand_id === 'undefined' || rand_id === '') {
        rand_id = 0;
    }
    var image_url;
    if (val === '') {
        jQuery(image_div_id).fadeOut(600);
    } else {
        jQuery(image_div_id).fadeIn(600);
        image_url = img_url + val + '.jpg';
        jQuery(image_div_id).find('a').attr('href', image_url);
        jQuery(image_div_id).find('a').attr('title', val);
        jQuery(image_div_id).find('img').attr('src', image_url);
        jQuery(image_div_id).find('img').attr('alt', val);
    }

    // hide/show blog views pagination/filterable fields
    if (val === 'view1') {
        jQuery('#filter_view2_' + rand_id).show();
        jQuery('#filter_view1_' + rand_id).hide();
        jQuery('#filter_all_records_' + rand_id).hide();
    } else if (val === 'view11' || val === 'view12' || val === 'view13' || val === 'view17' || val === 'view19') {
        jQuery('#filter_all_records_' + rand_id).show();
        jQuery('#filter_view1_' + rand_id).hide();
        jQuery('#filter_view2_' + rand_id).hide();
    } else {
        jQuery('#filter_view1_' + rand_id).show();
        jQuery('#filter_view2_' + rand_id).hide();
        jQuery('#filter_all_records_' + rand_id).hide();
    }
    // hide/show post formats fields
    if (val == 'format-video') {
        jQuery('#post_format_video_url').show();
        jQuery('#sound_embedded_code').hide();
    } else if (val == 'format-sound') {
        jQuery('#post_format_video_url').hide();
        jQuery('#sound_embedded_code').show();
    } else if (val == 'format-masonary' || val == 'format-medium' || val == 'format-large' || val == 'format-small') {
        jQuery('#post_format_video_url').hide();
        jQuery('#sound_embedded_code').hide();
    }
}

/*
 * 
 * end
 */
function mashup_reset_tabs() {
    "use strict";
    jQuery("#tabbed-content > div").addClass('hidden-tab'); //Hide all content
    jQuery("#cs-options-tab a").attr("id", ""); //Reset id's      
}

jQuery(document).on('click', 'label.cs-chekbox', function () {
    var checkbox = jQuery(this).find('input[type=checkbox]');

    if (checkbox.is(":checked")) {
        jQuery('#' + checkbox.attr('name')).val(checkbox.val());
        jQuery('#' + checkbox.attr('name')).attr('value', 'on');
    } else {
        jQuery('#' + checkbox.attr('name')).val('');
        jQuery('#' + checkbox.attr('name')).attr('value', '');
    }
});

function mashup_var_show_slider(mashup_value) {
    "use strict";

    if (mashup_value == 'slider') {
        $('#cs-rev-slider-fields').show();
        $('#cs-no-headerfields').hide();
        $('#cs-breadcrumbs-fields').hide();
        $('#cs-subheader-with-bc').hide();
        $('#sub_header_bg_clr').hide();
        $('#cs-subheader-with-bg').hide();
    } else if (mashup_value == 'no_header') {
        $('#cs-no-headerfields').show();
        $('#cs-breadcrumbs-fields').hide();
        $('#cs-rev-slider-fields').hide();
        $('#cs-subheader-with-bc').hide();
        $('#sub_header_bg_clr').hide();
        $('#cs-subheader-with-bg').hide();
    } else {
        var sub_header_style_value = $('select#mashup_var_sub_header_style option:selected').val();
        $('#cs-breadcrumbs-fields').show();
        $('#cs-no-headerfields').hide();
        $('#cs-rev-slider-fields').hide();
        $('#cs-subheader-with-bc').show();
        $('#sub_header_bg_clr').show();
        if (sub_header_style_value == 'with_bg') {
            $('#cs-subheader-with-bg').show();
            $('#cs-breadcrumbs_sub_header_fields').show();
            $('#cs-subheader-with-bc').hide();
        } else {
            $('#cs-subheader-with-bg').hide();
            $('#cs-breadcrumbs_sub_header_fields').hide();
            $('#cs-subheader-with-bc').show();
        }

    }
}

function mashup_var_subheader_style(mashup_value) {
    "use strict";

    if (mashup_value == 'with_bg') {
        $('#cs-subheader-with-bg').show();
        $('#cs-breadcrumbs_sub_header_fields').show();
        $('#sub_header_bg_clr').show();
        $('#cs-subheader-with-bc').hide();

    } else {
        $('#cs-subheader-with-bg').hide();
        $('#cs-breadcrumbs_sub_header_fields').hide();
        $('#cs-subheader-with-bc').show();
        $('#sub_header_bg_clr').show();
    }
}

/*
 *  Message Slide show functions
 */
function slideout() {
    "use strict";
    setTimeout(function () {
        jQuery(".form-msg").slideUp("slow", function () {
        });
    }, 5000);
}
/*
 *End Message Slide show functions
 */

/*
 *  Remove div Function
 */
function mashup_div_remove(id) {
    "use strict";
    jQuery("#" + id).remove();
}

/*
 *End Remove div Function
 */


/*
 * Delete Media Functions
 */
function del_media(id) {

    "use strict";
    var $ = jQuery;
    //jQuery('input[name="'+id+'"]').show();
    jQuery('#' + id + '_box').hide();
    jQuery('#' + id).val('');
    jQuery('#' + id).next().show();
}
/*
 * End Delete Media Functions
 */

/*
 jQuery(document).on("click", ".delImgMedia", function () {
 var $ = jQuery;
 jQuery(this).parent().parent().parent().parent().parent().parent().parent().hide();
 jQuery(this).parent().parent().parent().parent().parent().parent().parent().parent().children('.browse-icon').show();
 jQuery(this).parent().parent().parent().parent().parent().parent().parent().parent().children('input').val('');
 //jQuery(this).parent('.gal-edit-opts').parent('.thumb-secs').parent('li').parent('ul').parent('.dragareamain').parent('.gal-active').parent('.page-wrap').hide();
 //jQuery(this).parent('.gal-edit-opts').parent('.thumb-secs').parent('li').parent('ul').parent('.dragareamain').parent('.gal-active').parent('.page-wrap').parent('.cs-dr-option-img').children('.browse-icon').show();
 //jQuery(this).parent('.gal-edit-opts').parent('.thumb-secs').parent('li').parent('ul').parent('.dragareamain').parent('.gal-active').parent('.page-wrap').parent('.cs-dr-option-img').children('input').val('');
 });*/


function mashup_var_toggle(id) {
    "use strict";
    jQuery("#" + id).slideToggle("slow");
}

function chosen_selectionbox() {
    "use strict";

    if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
        var config = {
            '.chosen-select': {width: "100%"},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        };
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    }
}

//function popup_view_box() {
//    jQuery('.thumbnail').viewbox();
//}

/*
 *   Overley remove function
 */
function _removerlay(object) {
    "use strict";
    var $elem;
    jQuery("#cs-widgets-list .loader").remove();
    var _elem1 = "<div id='cs-pbwp-outerlay'></div>",
            _elem2 = "<div id='cs-widgets-list'></div>";
    $elem = object.closest('div[class*="cs-wrapp-class-"]');
    $elem.unwrap(_elem2);
    $elem.unwrap(_elem1);
    $elem.hide()
}

/*
 * End Overley remove function
 */

/*
 * Bannner widget options function
 */
function mashup_service_view_change(value) {
    "use strict";
    if (value == 'image') {
        jQuery(".cs-sh-service-image-area").show();
        jQuery(".cs-sh-service-icon-area").hide();
    } else {
        jQuery(".cs-sh-service-image-area").hide();
        jQuery(".cs-sh-service-icon-area").show();
    }
}

/*
 * Gallery Number of Items
 */
function gal_num_of_items(id, rand_id, numb) {
    "use strict";
    var mashup_var_gal_count = 0;
    jQuery("#gallery_sortable_" + rand_id + " > li").each(function (index) {
        mashup_var_gal_count++;
        jQuery('input[name="mashup_' + id + '_num"]').val(mashup_var_gal_count);
    });

    if (numb != '') {
        var mashup_var_data_temp = jQuery('#mashup_var_' + id + '_temp');
        if (jQuery('input[name="mashup_' + id + '_num"]').val() == numb) {
            mashup_var_data_temp.html('<input type="hidden" name="mashup_' + id + '_url[]" value="">');
        }
    }
}

/* ---------------------------------------------------------------------------
 * Mega Menu view select action
 * --------------------------------------------------------------------------- */
function mashup_menu_view_select(value, id) {
    "use strict";
    var title = jQuery('#field-cat-title-' + id);
    var categories = jQuery('#field-item-categories-' + id);
    var link = jQuery('#field-item-view-all-' + id);
    if (value == 'simple') {
        categories.hide();
    } else {
        categories.show();
    }
    if (value == 'cat-view-2') {
        title.show();
    } else {
        title.hide();
    }
    if (value == 'cat-view-3') {
        link.show();
    } else {
        link.hide();
    }
}
// Event map
function gll_search_map() {
    "use strict";
    var vals;
    vals = jQuery('#mashup_var_location_address').val();
    vals = vals + ", " + jQuery('#mashup_var_location_city').val();
    vals = vals + ", " + jQuery('#mashup_var_location_region').val();
    vals = vals + ", " + jQuery('#mashup_var_location_country').val();
    jQuery('.gllpSearchField').val(vals);
}
jQuery(document).ready(function () {
    gll_search_map();
});
// Event start time picker
jQuery('#mashup_var_event_start_time').datetimepicker({
    datepicker: false,
    format: 'H:i',
    formatTime: 'H:i',
    step: 30,
    onShow: function (at) {
        this.setOptions({
            maxTime: jQuery('#mashup_var_event_end_time').val() ? jQuery('#mashup_var_event_end_time').val() : false
        })
    }
});
// Event start end picker
jQuery('#mashup_var_event_end_time').datetimepicker({
    datepicker: false,
    format: 'H:i',
    formatTime: 'H:i',
    step: 30,
    onShow: function (at) {
        this.setOptions({
            minTime: jQuery('#mashup_var_event_start_time').val() ? jQuery('#mashup_var_event_start_time').val() : false
        })
    }
});
// All day event hide/show
jQuery(document).on("change", ".is_all_day_event", function () {
    "use strict";
    var checkbox = jQuery('.is_all_day_event');
    if (checkbox.attr('checked') == 'checked') {
        jQuery("#all_day_event").hide();
    } else {
        jQuery("#all_day_event").show();
    }
});
//list hide show fields
jQuery(document).on("change", "#mashup_var_list_type", function () {
    var getValue = $("#mashup_var_list_type option:selected").val();
    if (getValue == 'icon') {
        $('.icon_fields').css('display', 'block');
    } else {
        $('.icon_fields').css('display', 'none');
    }
});
//button hide show fields
jQuery(document).on("change", "#mashup_var_icon_view", function () {
    var getValue = $("#mashup_var_icon_view option:selected").val();
    if (getValue == 'on') {
        $('.icon_fields').css('display', 'block');
    } else {
        $('.icon_fields').css('display', 'none');
    }
});