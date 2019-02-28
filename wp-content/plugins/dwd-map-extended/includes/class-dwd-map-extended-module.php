<?php

function DWD_Custom_map_module_extended() {

    if (class_exists('ET_Builder_Module')) { 

        class ET_Builder_Module_Map_Extended extends ET_Builder_Module {

            function init() {

                $this->name            = esc_html__( 'Map Extended', 'et_builder' );

                $this->slug            = 'et_pb_map_extended';

                $this->fb_support      = true;

                $this->child_slug      = 'et_pb_map_pin_extended';

                $this->child_item_text = esc_html__( 'Pin', 'et_builder' );



                $this->whitelisted_fields = array(

                    'address',

                    'zoom_level',

                    'address_lat',

                    'address_lng',

                    'map_center_map',

                    'mouse_wheel',

                    'mobile_dragging',

                    'admin_label',

                    'module_id',

                    'module_class',

                    'use_grayscale_filter',

                    'grayscale_filter_amount',

                    //added

                    'controls_ui',

                    'map_options',

                    'map_custom_style',

                    'map_custom_code',

                    'map_type',

                    'info_window_method',

                    'info_window',

                    'marker_animation',

                    'infowindow_style_content',

                    'map_height_on_off',

                    'map_height',

                    'map_height_tablet',

                    'map_height_phone',

                    'map_height_last_edited',

                    'bounce_on_click_on_off',

                    'marker_label_all',

                    'marker_label_bg',

                    'marker_label_radius',

                    'marker_label_padding',

                    'show_marker_listing',

                    'map_marker_listing_zoom',

                    'marker_listing_padding',

                    'marker_listing_bg',

                    'marker_listing_border_color',

                    'map_directions',

                    'map_directions_placement',

                    'map_directions_text',

                );



                $this->fields_defaults = array(

                    'zoom_level'              => array( '18', 'only_default_setting' ),

                    'mouse_wheel'             => array( 'on' ),

                    'mobile_dragging'         => array( 'on' ),

                    'use_grayscale_filter'    => array( 'off' ),

                    'grayscale_filter_amount' => array( '0' ),

                    //added

                    'controls_ui'          => array( 'on' ),

                    'map_options'          => array( '1' ),

                    'map_type'         => array( '1' ),

                    'info_window_method' => array( 'click' ),

                    'info_window'          => array( 'off' ),

                    'marker_animation'         => array( 'off' ),

                    'map_height_on_off'        => array( 'off' ),

                    'bounce_on_click_on_off'           => array( 'off' ),

                    'marker_label_all' => array( 'off' ),

                    'marker_label_bg' => array( 'rgba(80, 80, 80, 0.9)' ),

                    'marker_label_radius' => array( '4px' ),

                    'show_marker_listing'    => array( 'off' ),

                    'map_marker_listing_zoom'    => array( '19' ),

                    'map_directions'    => array( 'off' ),

                    'map_directions_placement' => array( 'inside' ),

                    'map_directions_text' => array( 'off' ),

                );



                $this->options_toggles = array(

                    'general'  => array(

                        'toggles' => array(

                            'map' => esc_html__( 'Map', 'et_builder' ),

                        ),

                    ),

                    'advanced' => array(

                        'toggles' => array(

                            'controls' => esc_html__( 'Controls', 'et_builder' ),

                            //added

                            'styles'   => esc_html__( 'Styles & Animations', 'et_builder' ),

                            'filter'   => esc_html__( 'Filter', 'et_builder' ),

                            'text'        => array(

                                'title'    => esc_html__( 'Text', 'et_builder' ),

                                'priority' => 49,

                            ),

                            'child_filters' => array(

                                'title' => esc_html__( 'Map', 'et_builder' ),

                                'priority' => 51,

                            ),

                        ),

                    ),

                );



                $this->advanced_options = array(

                    'fonts' => array(

                        'title' => array(

                            'label'    => esc_html__( 'Title', 'et_builder' ),

                            'css'      => array(

                                'main' => "%%order_class%% .gm-style .gm-style-iw .dwd-map-content h3",

                            ),

                            'font_size' => array(

                                'default'      => '22px',

                                'color' => '#333',

                            ),

                            'font' => array(

                                'color' => '#333',

                            ),

                            'line_height'    => array(

                                'default'      => '1.3em',

                            ),

                            'hide_line_height'    => false,

                            'hide_text_color'     => false,

                            'hide_letter_spacing' => false,

                        ),

                        'content' => array(

                            'label'    => esc_html__( 'Content', 'et_builder' ),

                            'css'      => array(

                                'main' => "%%order_class%% .gm-style .gm-style-iw .dwd-map-content p",

                            ),

                            'font_size' => array(

                                'default'      => '14px',

                                'color' => '#333',

                            ),

                            'font' => array(

                                'color' => '#333',

                            ),

                            'line_height'    => array(

                                'default'      => '1.7em',

                            ),

                            'hide_line_height'    => false,

                            'hide_text_color'     => false,

                            'hide_letter_spacing' => false,

                        ),

                        'label' => array(

                            'label'    => esc_html__( 'Label', 'et_builder' ),

                            'css'      => array(

                                'main' => "%%order_class%% .dwd-map-label span",

                            ),

                            'font_size' => array(

                                'default'      => '10px',

                                'color' => '#fff',

                            ),

                            'font' => array(

                                'color' => '#fff',

                            ),

                            'line_height'    => array(

                                'default'      => '1.1em',

                            ),

                            'hide_line_height'    => false,

                            'hide_text_color'     => false,

                            'hide_letter_spacing' => false,

                        ),

                        'map_pin_address_title' => array(

                            'label'    => esc_html__( 'Marker Listing Title', 'et_builder' ),

                            'css'      => array(

                                'main' => "%%order_class%% .et_pb_map_pin_extended_address h3",

                            ),

                            'font_size' => array(

                                'default'      => '22px',

                                'color' => '#333',

                            ),

                            'font' => array(

                                'color' => '#333',

                            ),

                            'line_height'    => array(

                                'default'      => '1.3em',

                            ),

                            'hide_line_height'    => false,

                            'hide_text_color'     => false,

                            'hide_letter_spacing' => false,

                        ),

                        'map_pin_address_content' => array(

                            'label'    => esc_html__( 'Marker Listing Content', 'et_builder' ),

                            'css'      => array(

                                'main' => "%%order_class%% .et_pb_map_pin_extended_address p",

                            ),

                            'font_size' => array(

                                'default'      => '14px',

                                'color' => '#333',

                            ),

                            'font' => array(

                                'color' => '#333',

                            ),

                            'line_height'    => array(

                                'default'      => '1.7em',

                            ),

                            'hide_line_height'    => false,

                            'hide_text_color'     => false,

                            'hide_letter_spacing' => false,

                        ),

                    ),

                    'background' => array(),

                    'custom_margin_padding' => array(

                        'css' => array(

                            'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling

                        ),

                    ),

                    'max_width' => array(),

                    'filters' => array(

                        'css' => array(

                            'main' => '%%order_class%%',

                        ),

                        'child_filters_target' => array(

                            'tab_slug' => 'advanced',

                            'toggle_slug' => 'child_filters',

                        ),

                    ),

                    'child_filters' => array(

                        'css' => array(

                            'main' => '%%order_class%% .gm-style>div>div>div>div>div>img',

                        ),

                    ),

                    'custom_padding' => array(

                        'label' => esc_html__( 'Label Custom Padding', 'et_builder' ),

                        'tab_slug'          => 'advanced',

                        'toggle_slug'     => 'label',

                        'default'  => '5px|10px|5px|10px',

                    ),

                );



                $this->custom_css_options = array(

                    'marker_label' => array(

                        'label'    => esc_html__( 'Label Maker', 'et_builder' ),

                        'selector' => '%%order_class%% .dwd-map-label',

                    ),

                );

            }



            function get_fields() {

                $fields = array(

                    //added

                    'map_options' => array(

	                    'label'           => esc_html__( 'Map Options', 'et_builder' ),

	                    'type'            => 'select',

	                    'option_category' => 'layout',

	                    'options'         => array(

	                        '1'               => esc_html__( 'Google Default', 'et_builder' ),

	                        '2'               => esc_html__( 'Greyscale', 'et_builder' ),

	                        '3'               => esc_html__( 'Shades of Grey', 'et_builder' ),

	                        '4'               => esc_html__( 'Blue Water', 'et_builder' ),

	                        '5'               => esc_html__( 'MarcusWithman-Map', 'et_builder' ),

	                        '6'               => esc_html__( 'Table de Bellefois', 'et_builder' ),

	                        '7'               => esc_html__( 'Style 04', 'et_builder' ),

	                        '8'               => esc_html__( 'MapaBlanco', 'et_builder' ),

	                        '9'               => esc_html__( 'decola', 'et_builder' ),

	                        '10'              => esc_html__( 'Flex', 'et_builder' ),

	                        '11'              => esc_html__( 'Kent Outdoors', 'et_builder' ),

	                        '12'              => esc_html__( 'Transport for London', 'et_builder' ),

	                        '13'              => esc_html__( 'Paper', 'et_builder' ),

	                        '14'              => esc_html__( 'Light Monochrome', 'et_builder' ),

	                        '15'              => esc_html__( 'Midnight Commander', 'et_builder' ),

	                        '16'              => esc_html__( 'Avocado World', 'et_builder' ),

	                        '17'              => esc_html__( 'Glasgow MegaSnake', 'et_builder' ),

	                        '18'              => esc_html__( 'Chundo Style', 'et_builder' ),

	                        '19'              => esc_html__( 'Bates Green', 'et_builder' ),

	                        '20'              => esc_html__( 'mikiwat', 'et_builder' ),

	                        '21'              => esc_html__( 'Bright Dessert', 'et_builder' ),

	                        '22'              => esc_html__( 'coy beauty', 'et_builder' ),

	                        '23'              => esc_html__( 'shades of conservation', 'et_builder' ),

	                        '24'              => esc_html__( 'pixmix', 'et_builder' ),

	                        '25'              => esc_html__( 'Icy Blue', 'et_builder' ),

	                        '26'              => esc_html__( 'even lighter', 'et_builder' ),

	                        '27'              => esc_html__( 'Bold Black & White', 'et_builder' ),

	                        '28'              => esc_html__( 'Dropoff 3', 'et_builder' ),

	                        '29'              => esc_html__( 'Simply Golden', 'et_builder' ),

	                        '30'              => esc_html__( 'Pirate Map', 'et_builder' ),

	                        '31'              => esc_html__( 'Unsaturated Browns', 'et_builder' ),

	                        '32'              => esc_html__( 'Orange', 'et_builder' ),

	                        '33'              => esc_html__( 'OC', 'et_builder' ),

	                        '34'              => esc_html__( 'Vintage', 'et_builder' ),

	                        '35'              => esc_html__( 'Calver', 'et_builder' ),

	                        '36'              => esc_html__( 'Bright & Bubbly', 'et_builder' ),

	                        '37'              => esc_html__( 'Red & Blue', 'et_builder' ),

	                        '38'              => esc_html__( 'Argo', 'et_builder' ),

	                        '39'              => esc_html__( 'Hopper', 'et_builder' ),

	                        '40'              => esc_html__( 'The Propia Effect', 'et_builder' ),

	                        '41'              => esc_html__( 'Cladme', 'et_builder' ),

	                        '42'              => esc_html__( 'darkdetail', 'et_builder' ),

	                        '43'              => esc_html__( 'Pale Dawn', 'et_builder' ),

	                        '44'              => esc_html__( 'Light Green', 'et_builder' ),

	                        '45'              => esc_html__( 'iovation Map', 'et_builder' ),

	                        '46'              => esc_html__( 'papuportal', 'et_builder' ),

	                        '47'              => esc_html__( 'Savagio Yellow', 'et_builder' ),

	                        '48'              => esc_html__( 'Light Rust', 'et_builder' ),

	                        '49'              => esc_html__( 'inturlam Style', 'et_builder' ),

	                        '50'              => esc_html__( 'Alibra', 'et_builder' ),

	                        '51'              => esc_html__( 'Dharani', 'et_builder' ),

	                        '52'              => esc_html__( 'Primo', 'et_builder' ),

	                        '53'              => esc_html__( 'Cotton Candy', 'et_builder' ),

	                        '54'              => esc_html__( '035print', 'et_builder' ),

	                        '55'              => esc_html__( 'Retro', 'et_builder' ),

	                        '56'              => esc_html__( 'Avocado World', 'et_builder' ),

	                        '57'              => esc_html__( 'Gowalla', 'et_builder' ),

	                        '58'              => esc_html__( 'Old Timey', 'et_builder' ),

	                        '59'              => esc_html__( 'The Propia Effect', 'et_builder' ),

	                        '60'              => esc_html__( 'Mondrian', 'et_builder' ),

	                        '61'              => esc_html__( 'Neon World', 'et_builder' ),

	                        '62'              => esc_html__( 'Old Map', 'et_builder' ),

	                        '63'              => esc_html__( 'Flat Pale', 'et_builder' ),

	                        '64'              => esc_html__( 'Candy Colours', 'et_builder' ),

	                        '65'              => esc_html__( 'Old-School maps posters', 'et_builder' ),

	                        '66'              => esc_html__( 'Camilo florez estilo de mapa modificado', 'et_builder' ),

	                        '67'              => esc_html__( 'Lemon Tree', 'et_builder' ),

	                        '68'              => esc_html__( 'Grayscale Yellow', 'et_builder' ),

	                        '69'              => esc_html__( 'Presto Map', 'et_builder' ),

	                        '70'              => esc_html__( 'Best Ski Pros', 'et_builder' ),

	                        '71'              => esc_html__( 'Purple', 'et_builder' ),

	                        '72'              => esc_html__( 'Green', 'et_builder' ),

	                        '73'              => esc_html__( 'Squarespace Style', 'et_builder' ),

	                        '74'              => esc_html__( 'Blue Essence', 'et_builder' ),

	                    ),        

	                    'description'       => esc_html__( 'Choose a map design. This module uses Snazzy Maps data. Snazzy Maps is a repository of different styles for Google Maps aimed towards web designers and developers.', 'et_builder' ),

                        'class' => array( 'map_options' ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'map_custom_style' => array(

                        'label'           => esc_html__( 'Use Custom Google Map Style', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options' => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'default' => 'off',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                        'affects'           => array(

                            '#et_pb_map_custom_code',

                        ),

                        'description'       => sprintf( __( 'You can paste your Google Map JSON code from <a href="%1$s" target="_blank">Google</a>. or <a href="%2$s" target="_blank">SnazzyMap</a>. This is overwrite any of the map styles above.', 'et_builder' ), esc_url( 'https://mapstyle.withgoogle.com' ), esc_url( 'https://snazzymaps.com' ) ),

                    ),

                    'map_custom_code' => array(

                        'label'           => esc_html__( 'Custom Google Map Style Code', 'et_builder' ),

                        'type'            => 'codemirror',

                        'mode'            => 'html',

                        'option_category' => 'basic_option',

                        'description'       => sprintf( __( 'Paste your Google Style Code. It is best to minify those code using Minifier <a href="%1$s" target="_blank">here</a>.', 'et_builder' ), esc_url( 'https://kangax.github.io/html-minifier/' ) ),

                        'depends_show_if'   => 'on',

                        'is_fb_content'   => true,

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'map_type' => array(

                        'label'           => esc_html__( 'Map Type', 'et_builder' ),

                        'type'            => 'select',

                        'option_category' => 'layout',

                        'options'         => array(

                            '1'               => esc_html__( 'Roadmap (Default)', 'et_builder' ),

                            '2'               => esc_html__( 'Satellite', 'et_builder' ),

                            '3'               => esc_html__( 'Hybrid', 'et_builder' ),

                            '4'               => esc_html__( 'Terrain', 'et_builder' ),

                        ),

                    	'description'         => esc_html__( 'Google Maps provides four types of maps. RoadMap, Satellite, Hybird and Terrian. The default Map type is ROADMAP', 'et_builder' ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'info_window_method' => array(

                        'label'           => esc_html__( 'InfoWindow Trigger Method', 'et_builder' ),

                        'type'            => 'select',

                        'option_category' => 'layout',

                        'options'         => array(

                            'click'               => esc_html__( 'On Click', 'et_builder' ),

                            'mouseover'               => esc_html__( 'Hover', 'et_builder' ),

                        ),

                        'description'         => esc_html__( 'By default, Google Map will display info window when you click on the pin marker, however you can have mousehover/hover to display info window as well.', 'et_builder' ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'info_window' => array(

                        'label'           => esc_html__( 'Show InfoWindow on load', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'marker_animation' => array(

                        'label'           => esc_html__( 'Drop Animation on Marker Pin On Load', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'bounce_on_click_on_off' => array(

                        'label'           => esc_html__( 'Bounce Animation on Marker Pin', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                        'description'         => esc_html__( 'Bounce Animation will based on the InfoWindow Trigger Method Above.', 'et_builder' ),

                    ),

                    'map_height_on_off' => array(

                        'label'           => esc_html__( 'Define a Height for Map', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'width',

                        'affects' => array(

                            '#et_pb_map_height',

                        ),

                    ),

                    'map_height' => array(

                        'label'           => esc_html__( 'Map Height', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'layout',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                        'mobile_options'  => true,

                        'validate_unit'   => true,

                        'description'     => esc_html__( 'This defines the height of the Map Extended Module.', 'et_builder' ),

                    ),

                    'map_height_tablet' => array (

                        'type'     => 'skip',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'map_height_phone' => array (

                        'type'     => 'skip',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    'map_height_last_edited' => array(

                        'type'        => 'skip',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'styles',

                    ),

                    //ended

                    'google_maps_script_notice' => array(

                        'type'              => 'warning',

                        'value'             => et_pb_enqueue_google_maps_script(),

                        'display_if'        => false,

                        'message'           => esc_html__(

                            sprintf(

                                'The Google Maps API Script is currently disabled in the <a href="%s" target="_blank">Theme Options</a>. This module will not function properly without the Google Maps API.',

                                admin_url( 'admin.php?page=et_divi_options' )

                            ),

                            'et_builder'

                        ),

                        'toggle_slug'       => 'map',

                    ),

                    'google_api_key' => array(

                        'label'             => esc_html__( 'Google API Key', 'et_builder' ),

                        'type'              => 'text',

                        'option_category'   => 'basic_option',

                        'attributes'        => 'readonly',

                        'additional_button' => sprintf(

                            ' <a href="%2$s" target="_blank" class="et_pb_update_google_key button" data-empty_text="%3$s">%1$s</a>',

                            esc_html__( 'Change API Key', 'et_builder' ),

                            esc_url( et_pb_get_options_page_link() ),

                            esc_attr__( 'Add Your API Key', 'et_builder' )

                        ),

                        'additional_button_type' => 'change_google_api_key',

                        'class' => array( 'et_pb_google_api_key', 'et-pb-helper-field' ),

                        'description'       => et_get_safe_localization( sprintf( __( 'The Maps module uses the Google Maps API and requires a valid Google API Key to function. Before using the map module, please make sure you have added your API key inside the Divi Theme Options panel. Learn more about how to create your Google API Key <a href="%1$s" target="_blank">here</a>.', 'et_builder' ), esc_url( 'http://www.elegantthemes.com/gallery/divi/documentation/map/#gmaps-api-key' ) ) ),

                        'toggle_slug'       => 'map',

                    ),

                    'address' => array(

                        'label'             => esc_html__( 'Map Center Address', 'et_builder' ),

                        'type'              => 'text',

                        'option_category'   => 'basic_option',

                        'additional_button' => sprintf(

                            ' <a href="#" class="et_pb_find_address button">%1$s</a>',

                            esc_html__( 'Find', 'et_builder' )

                        ),

                        'class' => array( 'et_pb_address' ),

                        'description'       => esc_html__( 'Enter an address for the map center point, and the address will be geocoded and displayed on the map below.', 'et_builder' ),

                        'toggle_slug'       => 'map',

                    ),

                    'zoom_level' => array(

                        'type'    => 'hidden',

                        'class'   => array( 'et_pb_zoom_level' ),

                    ),

                    'address_lat' => array(

                        'type'  => 'hidden',

                        'class' => array( 'et_pb_address_lat' ),

                    ),

                    'address_lng' => array(

                        'type'  => 'hidden',

                        'class' => array( 'et_pb_address_lng' ),

                    ),

                    'map_center_map' => array(

                        'renderer'              => 'et_builder_generate_center_map_setting',

                        'use_container_wrapper' => false,

                        'option_category'       => 'basic_option',

                        'toggle_slug'           => 'map',

                    ),

                    'mouse_wheel' => array(

                        'label'           => esc_html__( 'Mouse Wheel Zoom', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options' => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'description'     => esc_html__( 'Here you can choose whether the zoom level will be controlled by mouse wheel or not.', 'et_builder' ),

                    ),

                    'mobile_dragging' => array(

                        'label'           => esc_html__( 'Draggable on Mobile', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'description'     => esc_html__( 'Here you can choose whether or not the map will be draggable on mobile devices.', 'et_builder' ),

                    ),

                    //added

                    'controls_ui' => array(

                        'label'           => esc_html__( 'Show Controls', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options' => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'description' => esc_html__( 'Here you can choose whether to show controls UI or not.', 'et_builder' ),

                    ),

                    'map_directions' => array(

                        'label'           => esc_html__( 'Show Directions', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options' => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'default' => 'off',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'affects'           => array(

                            '#et_pb_map_directions_placement, #et_pb_map_directions_text',

                        ),

                        'description' => esc_html__( 'Calculate directions using multiple transportation modes & multi-part directions with turn-by-turn, walking, cycling & public transit routing.', 'et_builder' ),

                    ),

                    'map_directions_placement' => array(

                        'label'           => esc_html__( 'Map Direction Placement', 'et_builder' ),

                        'type'            => 'select',

                        'option_category' => 'layout',

                        'default' => 'inside',

                        'options'         => array(

                            'inside'               => esc_html__( 'Inside the Map', 'et_builder' ),

                            'bottom'               => esc_html__( 'Below the Map', 'et_builder' ),

                            'top'               => esc_html__( 'Above the Map', 'et_builder' ),

                        ),

                        'depends_show_if'   => 'on',

                    	'description'         => esc_html__( 'Google Map direction placement.', 'et_builder' ),

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                    ),

                     'map_directions_text' => array(

                        'label'           => esc_html__( 'Show Text Direction', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options' => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'default' => 'off',

                        'depends_show_if'   => 'on',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                    ),

                    'marker_label_all' => array(

                        'label'           => esc_html__( 'Show Label on Markers', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'default' => 'off',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'affects'           => array(

                            '#et_pb_marker_label_bg, #et_pb_marker_label_radius',

                        ),

                        'description'     => esc_html__( 'Here you choose to show a small label under all markers. By default, the label will show the title of the pin. If you wish to have custom text, you will need to go pin settings to change them.', 'et_builder' ),

                    ),

                    'marker_label_bg' => array(

                        'label'             => esc_html__( 'Label Background', 'et_builder' ),

                        'type'              => 'color-alpha',

                        'custom_color'      => true,

                        'tab_slug'          => 'advanced',

                        'toggle_slug'     => 'label',

                        'depends_show_if'   => 'on',

                    ),

                    'marker_label_radius' => array(

                        'label'             => esc_html__( 'Label Border Radius', 'et_builder' ),

                        'type'              => 'range',

                        'option_category'   => 'configuration',

                        'depends_default'   => true,

                        'default'           => '4px',

                        'range_settings'  => array(

                                'min'  => '0',

                                'max'  => '20',

                                'step' => '1',

                        ),

                        'tab_slug'          => 'advanced',

                        'toggle_slug'     => 'label',

                        'depends_show_if'   => 'on',

                    ),

                    'marker_label_padding' => array(

                        'label'     => __( 'Custom Label Padding', 'et_builder' ),

                        'type'      => 'custom_padding',

                        'option_category'   => 'layout',

                        'tab_slug'          => 'advanced',

                        'toggle_slug'     => 'label',

                        'sides'     => array('top','right','bottom','left'),

                        'default'       => '5px|10px|5px|10px',

                        //'mobile_options'    => true,

                    ),

                    'show_marker_listing' => array(

                        'label'           => esc_html__( 'Show Marker Listing', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'on'  => esc_html__( 'On', 'et_builder' ),

                            'off' => esc_html__( 'Off', 'et_builder' ),

                        ),

                        'default'         => 'off',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'affects'           => array(

                            'map_marker_listing_zoom',

                            'marker_listing_padding',

                            'marker_listing_bg',

                            'marker_listing_border_color',

                        ),

                        'description'     => esc_html__( 'Here you can choose whether to show all Marker Addresses without having to enter them again. Clicking on these addresses will also show the pins location direction on the map.', 'et_builder' ),

                    ),

                    'map_marker_listing_zoom' => array(

						'label'           => esc_html__( 'Zoom Level', 'et_builder' ),

						'type'            => 'range',

						'option_category' => 'configuration',

						'default' => '19',

						'range_settings'  => array(

							'min'  => '9',

							'max'  => '40',

							'step' => '1',

						),

						'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                        'depends_show_if'   => 'on',

                        'description'     => esc_html__( 'The zoom level of the map when Clicking on the address.', 'et_builder' ),

					),

                    'marker_listing_padding' => array(

                        'label'     => __( 'Marker Listing Padding', 'et_builder' ),

                        'type'      => 'custom_padding',

                        'option_category'   => 'layout',

                        'tab_slug'          => 'advanced',

                        'toggle_slug'     => 'width',

                        'depends_show_if'   => 'on',

                        'sides'     => array('top','right','bottom','left'),

                        'default'       => '12px|10px|12px|10px',

                        //'mobile_options'    => true,

                    ),

                    'marker_listing_bg' => array(

                        'label'             => esc_html__( 'Marker Listing Background Color', 'et_builder' ),

                        'type'              => 'color-alpha',

                        'custom_color'      => true,

                        'depends_show_if'   => 'on',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                    ),

                    'marker_listing_border_color' => array(

                        'label'             => esc_html__( 'Marker Listing Border Color', 'et_builder' ),

                        'type'              => 'color-alpha',

                        'custom_color'      => true,

                        'depends_show_if'   => 'on',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'controls',

                    ),

                    //ended

                    'use_grayscale_filter' => array(

                        'label'           => esc_html__( 'Use Grayscale Filter', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'affects'     => array(

                            'grayscale_filter_amount',

                        ),

                        'tab_slug'    => 'advanced',

                        'toggle_slug' => 'filter',

                    ),

                    'grayscale_filter_amount' => array(

                        'label'           => esc_html__( 'Grayscale Filter Amount (%)', 'et_builder' ),

                        'type'            => 'range',

                        'default'         => '0',

                        'option_category' => 'configuration',

                        'tab_slug'        => 'advanced',

                        'toggle_slug'     => 'filter',

                        'depends_show_if' => 'on',

                        'validate_unit'   => false,

                    ),

                    'disabled_on' => array(

                        'label'           => esc_html__( 'Disable on', 'et_builder' ),

                        'type'            => 'multiple_checkboxes',

                        'options'         => array(

                            'phone'   => esc_html__( 'Phone', 'et_builder' ),

                            'tablet'  => esc_html__( 'Tablet', 'et_builder' ),

                            'desktop' => esc_html__( 'Desktop', 'et_builder' ),

                        ),

                        'additional_att'  => 'disable_on',

                        'option_category' => 'configuration',

                        'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),

                        'tab_slug'        => 'custom_css',

                        'toggle_slug'     => 'visibility',

                    ),

                    'admin_label' => array(

                        'label'       => esc_html__( 'Admin Label', 'et_builder' ),

                        'type'        => 'text',

                        'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),

                        'toggle_slug' => 'admin_label',

                    ),

                    'module_id' => array(

                        'label'           => esc_html__( 'CSS ID', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'configuration',

                        'tab_slug'        => 'custom_css',

                        'toggle_slug'     => 'classes',

                        'option_class'    => 'et_pb_custom_css_regular',

                    ),

                    'module_class' => array(

                        'label'           => esc_html__( 'CSS Class', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'configuration',

                        'tab_slug'        => 'custom_css',

                        'toggle_slug'     => 'classes',

                        'option_class'    => 'et_pb_custom_css_regular',

                    ),

                );

                return $fields;

            }



            function shortcode_callback( $atts, $content = null, $function_name ) {

                $module_id               = $this->shortcode_atts['module_id'];

                $module_class            = $this->shortcode_atts['module_class'];

                $address_lat             = $this->shortcode_atts['address_lat'];

                $address_lng             = $this->shortcode_atts['address_lng'];

                $zoom_level              = $this->shortcode_atts['zoom_level'];

                $mouse_wheel             = $this->shortcode_atts['mouse_wheel'];

                $mobile_dragging         = $this->shortcode_atts['mobile_dragging'];

                $use_grayscale_filter    = $this->shortcode_atts['use_grayscale_filter'];

                $grayscale_filter_amount = $this->shortcode_atts['grayscale_filter_amount'];

                //added

                $controls_ui             = $this->shortcode_atts['controls_ui'];

                $map_options             = $this->shortcode_atts['map_options'];

                $map_custom_style             = $this->shortcode_atts['map_custom_style'];

                $map_custom_code = et_builder_replace_code_content_entities( $this->shortcode_atts['map_custom_code'] );

                $map_type            = $this->shortcode_atts['map_type'];

                $info_window_method = $this->shortcode_atts['info_window_method'];

                $info_window             = $this->shortcode_atts['info_window'];

                $marker_animation        = $this->shortcode_atts['marker_animation'];

                $map_height_on_off  = $this->shortcode_atts['map_height_on_off'];

                $map_height  = $this->shortcode_atts['map_height'];

                $map_height_tablet  = $this->shortcode_atts['map_height_tablet'];

                $map_height_phone  = $this->shortcode_atts['map_height_phone'];

                $map_height_last_edited  = $this->shortcode_atts['map_height_last_edited'];

                $bounce_on_click_on_off  = $this->shortcode_atts['bounce_on_click_on_off'];

                $marker_label_all  = $this->shortcode_atts['marker_label_all'];

                $marker_label_bg = $this->shortcode_atts['marker_label_bg'];

                $marker_label_radius = $this->shortcode_atts['marker_label_radius'];

                $marker_label_padding = $this->shortcode_atts['marker_label_padding'];

                $show_marker_listing = $this->shortcode_atts['show_marker_listing'];

                $map_marker_listing_zoom = $this->shortcode_atts['map_marker_listing_zoom'];

                $marker_listing_padding = $this->shortcode_atts['marker_listing_padding'];

                $marker_listing_bg = $this->shortcode_atts['marker_listing_bg'];

                $marker_listing_border_color = $this->shortcode_atts['marker_listing_border_color'];

                $map_directions = $this->shortcode_atts['map_directions'];

                $map_directions_placement = $this->shortcode_atts['map_directions_placement'];

                $map_directions_text = $this->shortcode_atts['map_directions_text'];

                



                $dwd_replace_code_content = strip_tags($map_custom_code);

                $new_dwd_replace_code_content = preg_replace('/\s/', '', $dwd_replace_code_content);





                if ( et_pb_enqueue_google_maps_script() ) {

                    wp_enqueue_script( 'google-maps-api' );

                }



                $module_class              = ET_Builder_Element::add_module_order_class( $module_class, $function_name );

                $video_background          = $this->video_background();

                $parallax_image_background = $this->get_parallax_image_background();



                $all_pins_content = $this->shortcode_content;



                global $et_pb_pin_titles;

				global $et_pb_pin_address_get;



				$pins_address_output = '';



				$i = 0;

				if ( ! empty( $et_pb_pin_titles ) ) {

					foreach ( $et_pb_pin_titles as $pin_title ){

						++$i;

						$pins_address_output .= sprintf( '<option value="%2$s">%1$s</option>',

							esc_html( $pin_title ),

							esc_html( ltrim( $et_pb_pin_address_get[ $i-1 ] ) )

						);

					}

				}



				$et_pb_pin_titles = $et_pb_pin_address_get = array();



                $grayscale_filter_data = '';

                if ( 'on' === $use_grayscale_filter && '' !== $grayscale_filter_amount ) {

                    $grayscale_filter_data = sprintf( ' data-grayscale="%1$s"', esc_attr( $grayscale_filter_amount ) );

                }



                if ( '' !== $map_height || '' !== $map_height_tablet || '' !== $map_height_phone ) {

                    $map_height_responsive_active = et_pb_get_responsive_status( $map_height_last_edited );



                    $bg_img_height_values = array(

                        'desktop' => $map_height,

                        'tablet'  => $map_height_responsive_active ? $map_height_tablet : '',

                        'phone'   => $map_height_responsive_active ? $map_height_phone : '',

                    );



                    et_pb_generate_responsive_css( $bg_img_height_values, '%%order_class%% .dwd-map', 'height', $function_name );

                }



                if ( 'on' === $marker_label_all && '' !== $marker_label_bg ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%% .dwd-map-label span',

                        'declaration' => sprintf(

                            'background-color: %1$s;',

                            esc_html( $marker_label_bg )

                        ),

                    ) );

                }



                if ( 'on' === $marker_label_all && '4px' !== $marker_label_radius ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%% .dwd-map-label span',

                        'declaration' => sprintf(

                            'border-radius: %1$s;',

                            esc_html( $marker_label_radius )

                        ),

                    ) );

                }



                if ( 'on' === $marker_label_all && '' !== $marker_label_padding ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%% .dwd-map-label span',

                        'declaration' => sprintf(

                            'padding: %1$s;',

                            esc_html( str_replace('|', ' ', $marker_label_padding))

                        ),

                    ) );

                }



                if ( 'on' === $show_marker_listing && '' !== $marker_listing_padding ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%% .et_pb_map_pin_extended_address',

                        'declaration' => sprintf(

                            'padding: %1$s;',

                            esc_html( str_replace('|', ' ', $marker_listing_padding))

                        ),

                    ) );

                }



                if ( 'on' === $show_marker_listing && '' !== $marker_listing_bg ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%% .et_pb_map_pin_extended_address',

                        'declaration' => sprintf(

                            'background-color: %1$s;',

                            esc_attr( $marker_listing_bg )

                        ),

                    ) );

                }



                if ( 'on' === $show_marker_listing && '' !== $marker_listing_border_color ) {

                    ET_Builder_Element::set_style( $function_name, array(

                        'selector'    => '%%order_class%%.et_pb_map_container_extended .et_pb_map_pin_extended_address, %%order_class%%.et_pb_map_container_extended .et_pb_map_pin_extended_address:last-child',

                        'declaration' => sprintf(

                            'border-color: %1$s;',

                            esc_attr( $marker_listing_border_color )

                        ),

                    ) );

                }



                // Map Tiles: Add CSS Filters and Mix Blend Mode rules (if set)

                if ( array_key_exists( 'child_filters', $this->advanced_options ) && array_key_exists( 'css', $this->advanced_options['child_filters'] ) ) {

                    $module_class .= $this->generate_css_filters(

                        $function_name,

                        'child_',

                        self::$data_utils->array_get( $this->advanced_options['child_filters']['css'], 'main', '%%order_class%%' )

                    );

                }



                $output = sprintf(

                    '<div%5$s class="et_pb_module et_pb_map_container_extended%6$s%11$s%14$s%16$s%18$s%19$s%21$s"%15$s>

                        %19$s

                        %17$s

                        %23$s

                        <div class="et_pb_map dwd-map" data-center-lat="%1$s" data-center-lng="%2$s" data-zoom="%3$s" data-mouse-wheel="%7$s" data-mobile-dragging="%8$s" data-controls-ui="%12$s"%9$s%10$s%13$s%20$s%22$s%25$s></div>

                        %24$s

                        %4$s

                    </div>

                    ',

                    esc_attr( $address_lat ),

                    esc_attr( $address_lng ),

                    esc_attr( $zoom_level ),

                    $all_pins_content,

                    ( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),

                    ( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' ),

                    esc_attr( $mouse_wheel ),

                    esc_attr( $mobile_dragging ),

                    //added 9&

                    ( '' !== $map_options ? esc_attr(" data-map-style={$map_options}") : '' ),

                    ( '' !== $info_window ? esc_attr(" data-info-toggle={$info_window} data-mouse-style={$info_window_method}") : '' ),

                    ( 'off' !== $marker_animation ? ' marker-animation' : '' ),

                    esc_attr( $controls_ui ),

                    ( '' !== $map_type ? esc_attr(" data-map-type={$map_type}") : '' ),

                    ( 'off' !== $bounce_on_click_on_off ? ' dwd-bounce-click' : '' ),

                    $grayscale_filter_data,

                    '' !== $video_background ? ' et_pb_section_video et_pb_preload' : '',

                    $video_background,

                    '' !== $parallax_image_background ? ' et_pb_section_parallax' : '',

                    $parallax_image_background,

                    //20

                    ( '' !== $marker_label_all ? esc_attr(" data-marker-label={$marker_label_all}") : '' ),

                    //21 - 22 pins addresses

                    ( 'off' !== $show_marker_listing ? ' dwd-map-show-pin-address' : '' ),

                    ( 'off' !== $show_marker_listing ? esc_attr(" dwd-map-pin-zoom={$map_marker_listing_zoom}") : '' ),

                    //23 Map Directions

                    ( 'off' !== $map_directions && 'top' == $map_directions_placement ? sprintf(

                    	'<div class="dwd-map-direction-dialog dwd-map-direction-%2$s" dwd-map-direction-text=%3$s>

                        	<label for="dwd-map-routeFrom" style="padding-right: 5px;">From:</label>

	                        <input type="text" class="dwd-map-routeFrom" name="dwd-map-routeFrom" />

							<button class="dwd-map-get-address">Get Location</button>

							<label for="dwd-map-routeTo et_pb_contact_form_label" style="padding-left: 7px; padding-right: 5px;">To:</label>

							<select class="dwd-map-routeTo et_pb_contact_selectd" name="routeTo">

								%1$s

							</select>

							<label for="dwd-map-routeMode et_pb_contact_form_label" style="padding-left: 7px; padding-right: 5px;">Mode:</label>

							<select class="dwd-map-routeMode et_pb_contact_selectd" name="dwd-map-routeMode">

							    <option value="DRIVING">Driving</option>

							    <option value="WALKING">Walking</option>

							    <option value="BICYCLING">Bicycling</option>

							    <option value="TRANSIT">Transit</option>

							</select>

							    <button class="dwd-map-routeGo">Route</button>

						</div>

						<div class="dwd-directions"></div>',

                        $pins_address_output,

                        esc_attr( $map_directions_placement ),

                        esc_attr( $map_directions_text )

                    ) : '' ),

                    ( 'off' !== $map_directions && 'top' !== $map_directions_placement ? sprintf(

                    	'<div class="dwd-map-direction-dialog dwd-map-direction-%2$s" dwd-map-direction-text=%3$s>

                        	<label for="dwd-map-routeFrom" style="padding-right: 5px;">From:</label>

	                        <input type="text" class="dwd-map-routeFrom" name="dwd-map-routeFrom" />

							<button class="dwd-map-get-address">Get Location</button>

							<label for="dwd-map-routeTo et_pb_contact_form_label" style="padding-left: 7px; padding-right: 5px;">To:</label>

							<select class="dwd-map-routeTo et_pb_contact_selectd" name="routeTo">

								%1$s

							</select>

							<label for="dwd-map-routeMode et_pb_contact_form_label" style="padding-left: 7px; padding-right: 5px;">Mode:</label>

							<select class="dwd-map-routeMode et_pb_contact_selectd" name="dwd-map-routeMode">

							    <option value="DRIVING">Driving</option>

							    <option value="WALKING">Walking</option>

							    <option value="BICYCLING">Bicycling</option>

							    <option value="TRANSIT">Transit</option>

							</select>

							    <button class="dwd-map-routeGo">Route</button>

						</div>

						<div class="dwd-directions"></div>',

                        $pins_address_output,

                        esc_attr( $map_directions_placement ),

                        esc_attr( $map_directions_text )

                    ) : '' ),

                    //25

                    ( 'off' !== $map_custom_style ? sprintf( ' data-dwd-map-style="%2$s" data-dwd-map-styles=%1$s', $new_dwd_replace_code_content,

                        esc_attr( $map_custom_style )

                    ) : '' )                    

                );

                wp_enqueue_script( 'dwd-polyfill');

                wp_enqueue_script( 'dwd-markerwithlabel');

                wp_enqueue_script( 'dwd-map-extended' );

                //wp_localize_script( 'dwd-maps-extended', 'dwd_map', $mapData );

                return $output;

            }



            public function process_box_shadow( $function_name ) {

                $boxShadow = ET_Builder_Module_Fields_Factory::get( 'BoxShadow' );



                self::set_style( $function_name, $boxShadow->get_style(

                    '.' . self::get_module_order_class( $function_name ),

                    $this->shortcode_atts

                ) );

            }



        }

        $et_builder_map_extended = new ET_Builder_Module_Map_Extended();

        add_shortcode( 'et_pb_map_extended', array($et_builder_map_extended, '_shortcode_callback') );

        

        /*Map Item*/

        class ET_Builder_Module_Map_Extended_Item extends ET_Builder_Module {

            function init() {

                $this->name                        = esc_html__( 'Pin', 'et_builder' );

                $this->slug                        = 'et_pb_map_pin_extended';

                $this->fb_support                  = true;

                $this->type                        = 'child';

                $this->child_title_var             = 'title';

                $this->custom_css_tab              = false;



                $this->whitelisted_fields = array(

                    'title',

                    'pin_address',

                    'zoom_level',

                    'pin_address_lat',

                    'pin_address_lng',

                    'map_center_map',

                    'content_new',

                    //added

                    'pin_address_get',

                    'marker_label_text',

                    'marker_url',

                    'marker_url_new_window',

                    'pin_fill_color',

                    'pin_stroke_color',

                    'pin_on_off',

                    'pin_src',

                    'pin_widthsize',

                    'pin_heightsize',

                );



                $this->fields_defaults = array(

                    'marker_url_new_window'  => array( 'off' ),

                    'pin_fill_color'    => array( '#F76058', 'only_default_setting' ),

                    'pin_stroke_color'  => array( '#ffffff', 'only_default_setting' ),

                    'pin_on_off'        => array( 'off' ),

                    'pin_widthsize'     => array( '38' ),

                    'pin_heightsize'    => array( '58' ),

                );



                $this->advanced_setting_title_text = esc_html__( 'New Pin', 'et_builder' );

                $this->settings_text               = esc_html__( 'Pin Settings', 'et_builder' );



                $this->options_toggles = array(

                    'general'  => array(

                        'toggles' => array(

                            'main_content' => esc_html__( 'Text', 'et_builder' ),

                            'map'          => esc_html__( 'Map', 'et_builder' ),

                        ),

                    ),

                    'advanced' => array(

                        'toggles' => array(

                            'pin_color' => esc_html__( 'Pin Color Settings', 'et_builder' ),

                            'pin' => esc_html__( 'Custom Pin/Icon Settings', 'et_builder' ),

                        ),

                    ),

                );



                $this->advanced_options = array(

                    'filters' => array(

                        'css' => array(

                            'main' => '%%order_class%%',

                        ),

                    ),

                );



            }



            function get_fields() {

                $fields = array(

                    'title' => array(

                        'label'           => esc_html__( 'Title', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'basic_option',

                        'description'     => esc_html__( 'The title will be used within the tab button for this tab.', 'et_builder' ),

                        'toggle_slug'     => 'main_content',

                    ),

                    'marker_label_text' => array(

                        'label'           => esc_html__( 'Label Text', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'basic_option',

                        'description'     => esc_html__( 'Custom label text if you enable "Show Label on Markers"', 'et_builder' ),

                        'toggle_slug'     => 'main_content',

                    ),

                    'pin_address' => array(

                        'label'             => esc_html__( 'Map Pin Address', 'et_builder' ),

                        'type'              => 'text',

                        'option_category'   => 'basic_option',

                        'class'             => array( 'et_pb_pin_address' ),

                        'description'       => esc_html__( 'Enter an address for this map pin, and the address will be geocoded and displayed on the map below.', 'et_builder' ),

                        'additional_button' => sprintf(

                            '<a href="#" class="et_pb_find_address button">%1$s</a>',

                            esc_html__( 'Find', 'et_builder' )

                        ),

                        'toggle_slug'       => 'map',

                    ),

                    'marker_url' => array(

                        'label'           => esc_html__( 'URL for Marker', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'basic_option',

                        'description'     => esc_html__( 'This will open up a URL link on the marker. Leave it blank if you do not want to open up a link.', 'et_builder' ),

                        'toggle_slug'     => 'map',

                    ),

                    'marker_url_new_window' => array(

                        'label'           => esc_html__( 'Url Opens', 'et_builder' ),

                        'type'            => 'select',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'In The Same Window', 'et_builder' ),

                            'on'  => esc_html__( 'In The New Tab', 'et_builder' ),

                        ),

                        'default'           => 'off',

                        'description' => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'et_builder' ),

                        'toggle_slug'     => 'map',

                    ),

                    'pin_fill_color' => array(

                        'label'             => esc_html__( 'Pin Fill Color', 'et_builder' ),

                        'type'              => 'color',

                        'custom_color'      => true,

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin_color',

                        'description'       => esc_html__( 'Here you can define a custom fill color for the pin marker', 'et_builder' ),

                    ),

                    'pin_stroke_color' => array(

                        'label'             => esc_html__( 'Pin Stroke Color', 'et_builder' ),

                        'type'              => 'color',

                        'custom_color'      => true,

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin_color',

                        'description'       => esc_html__( 'Here you can define a custom stroke color for the pin marker', 'et_builder' ),

                    ),

                    'pin_on_off' => array(

                        'label'           => esc_html__( 'Use Custom Icon/Pin', 'et_builder' ),

                        'type'            => 'yes_no_button',

                        'option_category' => 'configuration',

                        'options'         => array(

                            'off' => esc_html__( 'No', 'et_builder' ),

                            'on'  => esc_html__( 'Yes', 'et_builder' ),

                        ),

                        'affects'     => array(

                            '#et_pb_pin_src, #et_pb_pin_widthsize, #et_pb_pin_heightsize',

                        ),

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin',

                    ),

                    'pin_src' => array(

                        'label'              => esc_html__( 'Pin Icon URL', 'et_builder' ),

                        'type'               => 'upload',

                        'option_category'    => 'basic_option',

                        'upload_button_text' => esc_attr__( 'Upload an Icon', 'et_builder' ),

                        'choose_text'        => esc_attr__( 'Choose an Icon', 'et_builder' ),

                        'update_text'        => esc_attr__( 'Set As Icon', 'et_builder' ),

                        'description'        => esc_html__( 'Upload your desired Pin Icon, or type in the URL to the Pin Icon you would like to display.', 'et_builder' ),

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin',

                    ),

                    'pin_widthsize' => array(

                        'label'           => esc_html__( 'Pin Icon Width (in PX)', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'layout',

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin',

                        'description'        => esc_html__( 'Enter your width value in numberic format eg 32.', 'et_builder' ),

                        //'mobile_options'  => true,

                    ),

                    'pin_heightsize' => array(

                        'label'           => esc_html__( 'Pin Icon Height (in PX)', 'et_builder' ),

                        'type'            => 'text',

                        'option_category' => 'layout',

                        'tab_slug' => 'advanced',

                        'toggle_slug'       => 'pin',

                        'description'        => esc_html__( 'Enter your height value in numberic format eg 32.', 'et_builder' ),

                        //'mobile_options'  => true,

                    ),

                    'zoom_level' => array(

                        'renderer'        => 'et_builder_generate_pin_zoom_level_input',

                        'option_category' => 'basic_option',

                        'class'           => array( 'et_pb_zoom_level' ),

                    ),

                    'pin_address_lat' => array(

                        'type'  => 'hidden',

                        'class' => array( 'et_pb_pin_address_lat' ),

                    ),

                    'pin_address_lng' => array(

                        'type'  => 'hidden',

                        'class' => array( 'et_pb_pin_address_lng' ),

                    ),

                    'map_center_map' => array(

                        'renderer'              => 'et_builder_generate_center_map_setting',

                        'option_category'       => 'basic_option',

                        'use_container_wrapper' => false,

                        'toggle_slug'           => 'map',

                    ),

                    'content_new' => array(

                        'label'           => esc_html__( 'Content', 'et_builder' ),

                        'type'            => 'tiny_mce',

                        'option_category' => 'basic_option',

                        'description'     => esc_html__( 'Here you can define the content that will be placed within the infobox for the pin.', 'et_builder' ),

                        'toggle_slug'     => 'main_content',

                    ),

                );

                return $fields;

            }



            function shortcode_callback( $atts, $content = null, $function_name ) {

                global $et_pb_pin_titles;

                global $et_pb_pin_address_get;



                $title = $this->shortcode_atts['title'];

                $pin_address_lat = $this->shortcode_atts['pin_address_lat'];

                $pin_address_lng = $this->shortcode_atts['pin_address_lng'];



                $replace_htmlentities = array( '&#8221;' => '', '&#8243;' => '' );



                if ( ! empty( $pin_address_lat ) ) {

                    $pin_address_lat = strtr( $pin_address_lat, $replace_htmlentities );

                }

                if ( ! empty( $pin_address_lng ) ) {

                    $pin_address_lng = strtr( $pin_address_lng, $replace_htmlentities );

                }



                //added

                $pin_address_get = $this->shortcode_atts['pin_address'];

                $marker_label_text = $this->shortcode_atts['marker_label_text'];

                $marker_url = $this->shortcode_atts['marker_url'];

                $marker_url_new_window = $this->shortcode_atts['marker_url_new_window'];

                $pin_fill_color = $this->shortcode_atts['pin_fill_color'];

                $pin_stroke_color = $this->shortcode_atts['pin_stroke_color'];

                $pin_on_off              = $this->shortcode_atts['pin_on_off'];

                $pin_src         = $this->shortcode_atts['pin_src'];

                $pin_widthsize   = $this->shortcode_atts['pin_widthsize'];

                $pin_heightsize  = $this->shortcode_atts['pin_heightsize'];



                $src_pin = '';



                if ( $pin_on_off == 'on' && $pin_src <> '' ) {

                    $src_pin = $pin_src;

                }



                $i = 0;



				$et_pb_pin_titles[]  = '' !== $title ? $title : esc_html__( 'Pin', 'et_builder' );

				$et_pb_pin_address_get[] = $pin_address_get;



                $content = $this->shortcode_content;



                $output = sprintf(

                    '<div class="et_pb_map_pin_extended" data-lat="%1$s" data-lng="%2$s" data-title="%5$s" data-pin-custom-image="%10$s"%6$s%7$s%8$s%9$s%11$s%12$s>

                        <h3 style="margin-top: 10px;">%3$s</h3>

                        %4$s

                    </div>

                    <div class="et_pb_map_pin_extended_address et_pb_blurb_position_left" data-lat="%1$s" data-lng="%2$s"%9$s>

                        <div class="et_pb_main_blurb_image dwd-map-marker-listing-icon">

                            %14$s

                            %15$s             

                        </div>

                        <div class="et_pb_blurb_container">

                        	<h3>%3$s</h3>

                        	<p>%13$s</p>

                        </div>

                    </div>',

                    esc_attr( $pin_address_lat ),

                    esc_attr( $pin_address_lng ),

                    esc_html( $title ),

                    ( '' != $content ? sprintf( '<div class="infowindow">%1$s</div>', $content ) : '' ),

                    esc_attr( $title ),

                    ( 'on' == $pin_on_off ? sprintf( ' data-pin-src="%1$s"', $src_pin ) : '' ),

                    ( '' != $pin_widthsize ? sprintf( ' data-pin-width="%1$s"', $pin_widthsize ) : '' ),

                    ( '' != $pin_widthsize ? sprintf( ' data-pin-height="%1$s"', $pin_heightsize ) : '' ),

                    esc_attr( " data-pin-fill-color={$pin_fill_color} data-pin-stroke-color={$pin_stroke_color}" ),

                    ( 'on' == $pin_on_off ? 'yes' : 'no' ),

                    //11 - 12

                    ( '' !== $marker_label_text ? sprintf( ' data-marker-label-text="%1$s"', $marker_label_text ) : '' ),

                    ( '' !== $marker_url ? sprintf( ' data-marker-url-link="%1$s" data-marker-url-window="%2$s"',

                        $marker_url,

                        $marker_url_new_window

                    ) : '' ),

                    //13

                    esc_attr( $pin_address_get ),

                    ( 'on' == $pin_on_off ? sprintf( '<img src="%1$s">',

                        esc_url( $src_pin )

                    ) : '' ),

                    ( 'off' == $pin_on_off ? sprintf( '

                        <svg width="32" height="40" viewBox="-16 -37 32 32">

                            <path fill="%1$s" stroke="%2$s" stroke-width="1"

                            d="M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0"/>

                         </svg>',

                        esc_attr( $pin_fill_color ),

                        esc_attr( $pin_stroke_color )

                    ) : '' )

                );



                return $output;

            }



            public function _add_additional_shadow_fields() {



            }

        }

        $et_builder_map_extended_item = new ET_Builder_Module_Map_Extended_Item();

        add_shortcode( 'et_pb_map_pin_extended', array($et_builder_map_extended_item, '_shortcode_callback') );

    }

}

add_action('et_builder_ready', 'DWD_Custom_map_module_extended');

?>