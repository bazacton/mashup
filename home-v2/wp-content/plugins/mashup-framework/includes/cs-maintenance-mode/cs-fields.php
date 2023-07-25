<?php

if (!class_exists('mashup_maintenance_fields')) {

    class mashup_maintenance_fields {

        /**
         * Construct
         *
         * @return
         */
        public function __construct() {
            
        }
        
        /**
         * All Options Fields
         *
         * @return
         */
        public function mashup_fields($mashup_frame_settings = '') {

            global $mashup_var_frame_options, $mashup_var_form_fields, $mashup_var_html_fields;
            $counter = 0;
            $output = '';

            if (is_array($mashup_frame_settings) && sizeof($mashup_frame_settings) > 0) {
                foreach ($mashup_frame_settings as $value) {
                    $counter++;
                    $val = '';

                    $select_value = '';
                    switch ($value['type']) {
                        
                        case "section":
                            $output .= '
                            <div class="alert alert-info fade in nomargin theme_box">
                                <h4>' . esc_attr($value['std']) . '</h4>
                                <div class="clear"></div>
                            </div>';
                        break;
                            
                        case "checkbox":

                            if (isset($mashup_var_frame_options['mashup_var_' . $value['id']])) {
                                $checked_value = $mashup_var_frame_options['mashup_var_' . $value['id']];
                            } else {
                                $checked_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'id' => isset($value['id']) ? 'mashup_var_' . $value['id'] . '_checkbox' : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $checked_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => '',
                                    'return' => true,
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_checkbox_field($mashup_opt_array);

                        break;

                        case 'select':
                            if (isset($mashup_var_frame_options['mashup_var_' . $value['id']])) {
                                $select_value = $mashup_var_frame_options['mashup_var_' . $value['id']];
                            } else {
                                $select_value = isset($value['std']) ? $value['std'] : '';
                            }

                            $mashup_opt_array = array(
                                'name' => isset($value['name']) ? $value['name'] : '',
                                'desc' => isset($value['desc']) ? $value['desc'] : '',
                                'hint_text' => isset($value['hint_text']) ? $value['hint_text'] : '',
                                'field_params' => array(
                                    'std' => $select_value,
                                    'id' => isset($value['id']) ? $value['id'] : '',
                                    'classes' => isset($value['classes']) ? $value['classes'] : '',
                                    'extra_atr' => isset($value['extra_att']) ? $value['extra_att'] : '',
                                    'return' => true,
                                    'options' => isset($value['options']) ? $value['options'] : '',
                                ),
                            );
                            $output .= $mashup_var_html_fields->mashup_var_select_field($mashup_opt_array);

                        break;
                    }
                }
            }

            return $output;
        }

    }

}