<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://diviwebdesign.com/
 * @since      1.0.0
 *
 * @package    Dwd_Map_Extended
 * @subpackage Dwd_Map_Extended/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dwd_Map_Extended
 * @subpackage Dwd_Map_Extended/public
 * @author     Divi Web Design <hello@diviwebdesign.com>
 */
class Dwd_Map_Extended_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dwd_Map_Extended_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dwd_Map_Extended_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dwd-map-extended-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dwd_Map_Extended_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dwd_Map_Extended_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */	    
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dwd-map-extended-public.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'dwd-polyfill', 'https://cdn.polyfill.io/v2/polyfill.min.js', null, '2', true );
		wp_register_script( 'dwd-markerwithlabel', plugin_dir_url( __FILE__ ) . 'js/markerwithlabel.js', array( 'google-maps-api' ), $this->version, true );
		/*
		$classes = get_body_class();
	    if (in_array('ie',$classes)) {
	        wp_register_script('polyfill', 'https://cdn.polyfill.io/v2/polyfill.min.js', null, true);
	    }*/

	}

}
