<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Victor8730/wordpress-wps-related-some-category
 * @since      1.0.0
 *
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/admin
 * @author     Victor Galiuzov <victor8730@gmail.com>
 */
class Wps_Related_Some_Category_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Wps_Related_Some_Category    The ID of this plugin.
	 */
	private $Wps_Related_Some_Category;

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
	 * @param      string    $Wps_Related_Some_Category      The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Wps_Related_Some_Category, $version ) {

		$this->Wps_Related_Some_Category = $Wps_Related_Some_Category;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->Wps_Related_Some_Category, plugin_dir_url( __FILE__ ) . 'css/wps-related-some-category-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->Wps_Related_Some_Category, plugin_dir_url( __FILE__ ) . 'js/wps-related-some-category-admin.js', array( 'jquery' ), $this->version, false );

	}

}
