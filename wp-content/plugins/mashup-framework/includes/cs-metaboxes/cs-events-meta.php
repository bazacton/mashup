<?php
/**
 * @Add Meta Box For Events
 * @return
 *
 */
if ( ! class_exists( 'mashup_event_meta' ) ) {

    class mashup_event_meta {

        public function __construct() {
            add_action( 'add_meta_boxes', array( $this, 'mashup_meta_event_add' ) );
            add_action( 'wp_ajax_add_schedule_to_list', array( $this, 'add_schedule_to_list' ) );
            add_action( 'wp_ajax_add_event_tkt_to_list', array( $this, 'add_event_tkt_to_list' ) );
        }

        function mashup_meta_event_add() {
            global $mashup_var_frame_static_text;
            add_meta_box( 'mashup_meta_event', mashup_var_frame_text_srt( 'mashup_var_event_options' ), array( $this, 'mashup_meta_event' ), 'events', 'normal', 'high' );
        }

        function mashup_meta_event( $post ) {
            global $post, $mashup_var_frame_static_text;
            ?>		
            <div class="page-wrap page-opts left" style="overflow:hidden; position:relative; height: 1432px;">
                <div class="option-sec" style="margin-bottom:0;">
                    <div class="opt-conts">
                        <div class="elementhidden">
                            <nav class="admin-navigtion">
                                <ul id="cs-options-tab">
                                    <li><a href="javascript:void(0);" name="#tab-general-settings"><i class="icon-cog3"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_general_setting' ); ?></a></li>
                                    <?php
                                    if ( function_exists( 'mashup_subheader_element' ) ) {
                                        ?>
                                        <li><a href="javascript:void(0);" name="#tab-subheader-options"><i class="icon-indent"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_subheader' ); ?> </a></li>
                                        <?php
                                    }
                                    ?>
                                    <li><a href="javascript:void(0);" name="#tab-location-settings-cs-events"><i class="icon-location2"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_event_location' ); ?></a></li>
                                    <li><a href="javascript:void(0);" name="#tab-events-settings-cs-events"><i class="icon-briefcase"></i><?php echo mashup_var_frame_text_srt( 'mashup_var_event_options' ); ?></a></li>
                                </ul>
                            </nav>
                            <div id="tabbed-content">
                                <div id="tab-general-settings">
                                    <?php
                                    if ( function_exists( 'mashup_sidebar_layout_options' ) ) {
                                        mashup_sidebar_layout_options();
                                    }
                                    ?>
                                </div>
                                <?php
                                if ( function_exists( 'mashup_subheader_element' ) ) {
                                    ?>
                                    <div id="tab-subheader-options">
                                        <?php mashup_subheader_element(); ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div id="tab-location-settings-cs-events" style="width:100%;">
                                    <?php $this->mashup_location_fields(); ?>
                                </div>
                                <div id="tab-events-settings-cs-events">
                                    <?php $this->mashup_post_event_fields(); ?>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php
        }

        function mashup_get_countries() {
            $get_countries = array( "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
                "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands",
                "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China",
                "Colombia", "Comoros", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Democratic People's Republic of Korea", "Democratic Republic of the Congo", "Denmark", "Djibouti",
                "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "England", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "French Polynesia",
                "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong",
                "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan",
                "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia",
                "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                "Myanmar(Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Northern Ireland",
                "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico",
                "Qatar", "Republic of the Congo", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
                "San Marino", "Saudi Arabia", "Scotland", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa",
                "South Korea", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga",
                "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "US Virgin Islands", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay",
                "Uzbekistan", "Vanuatu", "Vatican", "Venezuela", "Vietnam", "Wales", "Yemen", "Zambia", "Zimbabwe" );
            return $get_countries;
        }

        function mashup_location_fields() {
            global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text;
            if ( function_exists( 'mashup_admin_location_gmap_script' ) ) {
                mashup_admin_location_gmap_script();
            }

            $mashup_var_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_field' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_location_switch',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_address' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'classes' => '',
                    'id' => 'location_address',
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_city_town' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'classes' => '',
                    'id' => 'location_city',
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_post_code' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'classes' => '',
                    'id' => 'location_postcode',
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_region' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'classes' => '',
                    'id' => 'location_region',
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            foreach ( $this->mashup_get_countries() as $key => $val ):
                $countries_list[$val] = $val;
            endforeach;

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_location_country' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'location_country',
                    'classes' => 'chosen-select-no-single',
                    'options' => $countries_list,
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_search_location_on_map' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_map',
                    'classes' => '',
                    'id' => 'from_date',
                    'return' => true,
                ),
            );

            $mashup_var_form_fields->mashup_location_map_render( $mashup_opt_array );
        }

        /**
         * @Event Custom Fileds Function
         * @return
         *
         */
        function mashup_post_event_fields() {
            global $post, $mashup_var_form_fields, $mashup_var_html_fields, $mashup_var_frame_static_text, $mashup_var_options;

            $event_repeat = get_post_meta( $post->ID, 'mashup_var_event_repeat', true );
            $event_all_day = get_post_meta( $post->ID, 'mashup_var_event_all_day', true );
            $event_from_date = get_post_meta( $post->ID, 'mashup_var_event_from_date', true );
            $event_to_date = get_post_meta( $post->ID, 'mashup_var_event_to_date', true );
            $event_from_date = ( isset( $event_from_date ) && $event_from_date != '' ) ? $event_from_date : date( 'd-m-Y' );
            $event_to_date = ( isset( $event_to_date ) && $event_to_date != '' ) ? $event_from_date : date( 'd-m-Y' );

            $event_start_time = get_post_meta( $post->ID, 'mashup_var_event_start_time', true );
            $event_end_time = get_post_meta( $post->ID, 'mashup_var_event_end_time', true );
            $event_start_time = ( isset( $mashup_var_event_start_time ) && $mashup_var_event_start_time != '' ) ? $mashup_var_event_start_time : '00:00';
            $event_end_time = ( isset( $mashup_var_event_end_time ) && $mashup_var_event_end_time != '' ) ? $mashup_var_event_end_time : '23:30';

            $all_day_status = 'show';
            if ( isset( $event_all_day ) && $event_all_day == 'on' ) {
                $all_day_status = 'hide';
            }

            $mashup_repeat_time = 'hide';
            if ( isset( $event_repeat ) && $event_repeat != '0' && $event_repeat != '' ) {
                $mashup_repeat_time = 'show';
            }

            $mashup_repeated = 'no';
            if ( isset( $_GET['post'] ) && $_GET['post'] != '' ) {
                $mashup_repeated = 'yes';
            }

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_start_date' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => $event_from_date,
                    'id' => 'event_from_date',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_date_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_end_date' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => $event_to_date,
                    'id' => 'event_to_date',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_date_field( $mashup_opt_array );

            $mashup_var_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_all_day' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_all_day',
                    'classes' => 'is_all_day_event',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

            $display_event_time = (isset( $event_all_day ) && $event_all_day == 'on') ? 'none' : 'block';
            echo '<div id="all_day_event" style="display:' . $display_event_time . ';">';
            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_start_time' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => $event_start_time,
                    'classes' => '',
                    'id' => 'event_start_time',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_end_time' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => $event_end_time,
                    'classes' => '',
                    'id' => 'event_end_time',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );
            echo '</div>';

            if ( isset( $mashup_repeated ) && $mashup_repeated == 'no' ) {

                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_repeat' ),
                    'desc' => '',
                    'hint_text' => '',
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'event_repeat',
                        'classes' => 'chosen-select-no-single',
                        'options' => array( '0' => mashup_var_frame_text_srt( 'mashup_var_event_field_never_repeat' ), '+1 day' => mashup_var_frame_text_srt( 'mashup_var_event_field_every_day' ), '+1 week' => mashup_var_frame_text_srt( 'mashup_var_event_field_every_week' ), '+1 month' => mashup_var_frame_text_srt( 'mashup_var_event_field_every_month' ) ),
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

                for ( $i = 1; $i <= 25; $i ++ ) {
                    $number[$i] = $i;
                }
                $mashup_opt_array = array(
                    'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_repeat_how_many_time' ),
                    'desc' => '',
                    'hint_text' => '',
                    'echo' => true,
                    'field_params' => array(
                        'std' => '',
                        'id' => 'event_repeat_num',
                        'classes' => 'chosen-select-no-single',
                        'options' => $number,
                        'return' => true,
                    ),
                );

                $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );
            }

            $mashup_opt_array = array(
                'name' => __( 'Schedules Option', 'px_frame' ),
                'id' => 'schedules_options',
                'classes' => '',
                'std' => '',
                'description' => '',
                'hint' => '',
            );
            $mashup_var_html_fields->mashup_var_heading_render( $mashup_opt_array );

            $this->mashup_event_schedules();

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_options' ),
                'id' => 'ticket_option',
                'classes' => '',
                'std' => '',
                'description' => '',
                'hint' => '',
            );
            $mashup_var_html_fields->mashup_var_heading_render( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_status' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_status',
                    'classes' => 'chosen-select-no-single',
                    'options' => array( '' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_select_status' ), 'open' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_status_open' ), 'cancel' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_status_cancel' ), 'free' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_status_free' ), 'closed' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_status_closed' ) ),
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_title' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'ticket_title',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_url' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'buy_url',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_price' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'ticket_price',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_ticket_button_bg_color' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_buy_button_color',
                    'classes' => 'bg_color',
                    'return' => true,
                ),
            );
            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_gallery_options' ),
                'id' => 'event_gallery_heading',
                'classes' => '',
                'std' => '',
                'description' => '',
                'hint' => '',
            );
            $mashup_var_html_fields->mashup_var_heading_render( $mashup_opt_array );

            $mashup_var_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_event_gallery' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_gallery_switch',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );

            $gall_data = array();
            $px_args = array( 'posts_per_page' => '-1', 'post_type' => 'gallery', 'orderby' => 'ID', 'post_status' => 'publish', 'order' => 'DESC' );
            $cust_query = get_posts( $px_args );
            foreach ( $cust_query as $px_gal ) {
                $gall_data[$px_gal->ID] = get_the_title( $px_gal->ID );
            }
            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_gallery' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'event_gallery',
                    'classes' => 'chosen-select-no-single',
                    'options' => $gall_data,
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_select_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_gallery_num_of_images' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'gallery_list_num',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_contact_options' ),
                'id' => 'event_contact_heading',
                'classes' => '',
                'std' => '',
                'description' => '',
                'hint' => '',
            );
            $mashup_var_html_fields->mashup_var_heading_render( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_contact_phone_number' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'phone_num',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_contact_email' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'email',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_contact_facebook_url' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'facebook_url',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_contact_twitter_url' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'twitter_url',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_related_events_options' ),
                'id' => 'related_events_heading',
                'classes' => '',
                'std' => '',
                'description' => '',
                'hint' => '',
            );
            $mashup_var_html_fields->mashup_var_heading_render( $mashup_opt_array );

            $mashup_var_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_related_events' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => true,
                'field_params' => array(
                    'std' => '',
                    'id' => 'related_events',
                    'return' => true,
                ),
            );

            $mashup_var_html_fields->mashup_var_checkbox_field( $mashup_var_opt_array );
        }

        public function mashup_event_schedules() {

            global $post, $mashup_var_html_fields;
            $mashup_get_schedules = get_post_meta( $post->ID, 'mashup_var_schedules_array', true );
            $mashup_schedule_times = get_post_meta( $post->ID, 'mashup_var_schedule_time_array', true );
            $mashup_schedule_names = get_post_meta( $post->ID, 'mashup_var_schedule_name_array', true );

            $html = '<script>
				jQuery(document).ready(function($) {
					$("#total_schedules").sortable({
						cancel : \'td div.table-form-elem\'
					});
				});
			</script>
				<div class="form-elements">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<label></label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12"><a href="javascript:mashup_frame_createpop(\'add_schedule_title\',\'filter\')" class="button">' . mashup_var_frame_text_srt( 'mashup_var_event_field_add_schedule' ) . '</a> </div>
			    </div>
				<div class="list-table">
				<table class="to-table" border="0" cellspacing="0">
				<thead>
				  <tr>
					<th style="width:100%;">' . mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_title' ) . '</th>
					<th style="width:20%;" class="right">' . mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_action' ) . '</th>
				  </tr>
				</thead>
				<tbody id="total_schedules">';
            if ( isset( $mashup_get_schedules ) && is_array( $mashup_get_schedules ) && count( $mashup_get_schedules ) > 0 ) {
                $mashup_schedule_counter = 0;
                foreach ( $mashup_get_schedules as $schedules ) {
                    if ( isset( $schedules ) && $schedules <> '' ) {

                        $counter_schedule = $schedule_id = $schedules;
                        $mashup_schedule_time = isset( $mashup_schedule_times[$mashup_schedule_counter] ) ? $mashup_schedule_times[$mashup_schedule_counter] : '';
                        $mashup_schedule_name = isset( $mashup_schedule_names[$mashup_schedule_counter] ) ? $mashup_schedule_names[$mashup_schedule_counter] : '';

                        $mashup_schedules_array = array(
                            'counter_schedule' => $counter_schedule,
                            'schedule_id' => $schedule_id,
                            'mashup_schedule_time' => $mashup_schedule_time,
                            'mashup_schedule_name' => $mashup_schedule_name,
                        );

                        $html .= $this->add_schedule_to_list( $mashup_schedules_array );
                    }
                    $mashup_schedule_counter ++;
                }
            }
            $html .= '</tbody>
				  </table>
				</div>
				<div id="add_schedule_title" style="display: none;">
				<div class="px-heading-area">
				  <h5><i class="icon-plus-circle"></i> ' . mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_setting' ) . '</h5>
				  <span class="px-btnclose" onClick="javascript:mashup_frame_removeoverlay(\'add_schedule_title\',\'append\')"> <i class="icon-cancel"></i></span> 	
				</div>';

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_name' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'schedule_name',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_timing' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => '',
                    'id' => 'schedule_time',
                    'classes' => '',
                    'return' => true,
                ),
            );

            $html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $html .= '<ul class="form-elements noborder">
				  <li class="to-label"></li>
				  <li class="to-field">
					<input type="button" value="' . mashup_var_frame_text_srt( 'mashup_var_event_field_add_schedule' ) . '" onClick="add_schedule_to_list(\'' . esc_js( admin_url( 'admin-ajax.php' ) ) . '\', \'' . esc_js( wp_mashup_framework::plugin_url() ) . '\')" />
					<div class="schedules-loader"></div>
				  </li>
				</ul>
			  </div>';

            echo force_balance_tags( $html, true );
        }

        public function add_schedule_to_list( $mashup_atts ) {
            global $post, $mashup_var_html_fields;

            $mashup_defaults = array(
                'counter_schedule' => '',
                'schedule_id' => '',
                'mashup_schedule_time' => '',
                'mashup_schedule_name' => '',
            );
            extract( shortcode_atts( $mashup_defaults, $mashup_atts ) );

            foreach ( $_POST as $keys => $values ) {
                $$keys = $values;
            }

            if ( isset( $_POST['mashup_schedule_name'] ) && $_POST['mashup_schedule_name'] <> '' )
                $mashup_schedule_name = $_POST['mashup_schedule_name'];
            if ( isset( $_POST['mashup_schedule_time'] ) && $_POST['mashup_schedule_time'] <> '' )
                $mashup_schedule_time = $_POST['mashup_schedule_time'];
            if ( $schedule_id == '' && $counter_schedule == '' ) {
                $counter_schedule = $schedule_id = time();
            }

            $html = '<tr class="parentdelete" id="edit_track' . absint( $counter_schedule ) . '">
				  <td id="subject-title' . absint( $counter_schedule ) . '" style="width:100%;">' . esc_attr( $mashup_schedule_name ) . '</td>
				  
				  <td class="centr" style="width:20%;"><a href="javascript:mashup_frame_createpop(\'edit_track_form' . absint( $counter_schedule ) . '\',\'filter\')" class="actions edit">&nbsp;</a> <a href="#" class="delete-it btndeleteit actions delete">&nbsp;</a></td>
				  <td style="width:0"><div id="edit_track_form' . esc_attr( $counter_schedule ) . '" style="display: none;" class="table-form-elem">
					<input type="hidden" name="mashup_var_schedules_array[]" value="' . absint( $schedule_id ) . '" />
					  <div class="px-heading-area">
						<h5 style="text-align: left;">' . mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_setting' ) . '</h5>
						<span onclick="javascript:mashup_frame_removeoverlay(\'edit_track_form' . esc_js( $counter_schedule ) . '\',\'append\')" class="px-btnclose"> <i class="icon-cancel"></i></span>
						<div class="clear"></div>
					  </div>';

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_name' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => $mashup_schedule_name,
                    'id' => 'schedule_name',
                    'classes' => '',
                    'array' => true,
                    'force_std' => true,
                    'return' => true,
                ),
            );

            $html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $mashup_opt_array = array(
                'name' => mashup_var_frame_text_srt( 'mashup_var_event_field_schedules_timing' ),
                'desc' => '',
                'hint_text' => '',
                'echo' => false,
                'field_params' => array(
                    'std' => $mashup_schedule_time,
                    'id' => 'schedule_time',
                    'classes' => '',
                    'array' => true,
                    'force_std' => true,
                    'return' => true,
                ),
            );

            $html .= $mashup_var_html_fields->mashup_var_text_field( $mashup_opt_array );

            $html .= '<ul class="form-elements noborder">
						<li class="to-label">
						  <label></label>
						</li>
						<li class="to-field">
						  <input type="button" value="' . mashup_var_frame_text_srt( 'mashup_var_event_field_update_schedule' ) . '" onclick="mashup_frame_removeoverlay(\'edit_track_form' . esc_js( $counter_schedule ) . '\',\'append\')" />
						</li>
					  </ul>
					</div></td>
				</tr>';

            if ( isset( $_POST['mashup_schedule_name'] ) && isset( $_POST['mashup_schedule_time'] ) ) {
                echo force_balance_tags( $html );
            } else {
                return $html;
            }

            if ( isset( $_POST['mashup_schedule_name'] ) && isset( $_POST['mashup_schedule_time'] ) )
                die();
        }

    }

    return new mashup_event_meta();
}
