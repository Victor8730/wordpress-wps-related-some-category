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

    /**
     * Register page setting
     */
    public function add_plugin_page_wps_related_some_category(){
        add_options_page( 'Setting plugins WPS Related Some Category', 'WPS Related Some Category', 'manage_options', 'wps_related_some_category', [ $this, 'wps_related_some_category_options_page_output' ]);
    }

    public function wps_related_some_category_options_page_output(){
            ?>
            <div class="wrap">
                <h2><?php echo get_admin_page_title() ?></h2>
                <form action="options.php" method="POST">
                    <?php
                    settings_fields( 'option_group' );
                    do_settings_sections( 'wps_related_some_category' );
                    submit_button();
                    ?>
                </form>
            </div>
            <?php
        }

    public function plugin_settings(){
        register_setting( 'option_group', 'option_name', [ $this, 'sanitize_callback' ] );
        add_settings_section( 'section_id', 'Display settings', '', 'wps_related_some_category');
        add_settings_field('primer_field1', 'Number of products displayed', [ $this, 'fill_primer_field1' ], 'wps_related_some_category', 'section_id' );
        add_settings_field('primer_field2', 'Slider auto start', [ $this, 'fill_primer_field2' ], 'wps_related_some_category', 'section_id' );
    }


    public function fill_primer_field1(){
        $val = get_option('option_name');
        $val = $val ? $val['input'] : null;
        ?>
        <input type="text" name="option_name[input]" value="<?php echo esc_attr( $val ) ?>" />
        <?php
    }


    public function fill_primer_field2(){
        $val = get_option('option_name');
        $val = $val ? $val['checkbox'] : null;
        ?>
        <label><input type="checkbox" name="option_name[checkbox]" value="1" <?php checked( 1, $val ) ?> /> отметить</label>
        <?php
    }

    function sanitize_callback( $options ){

        foreach( $options as $name => & $val ){
            if( $name == 'input' )
                $val = strip_tags( $val );

            if( $name == 'checkbox' )
                $val = intval( $val );
        }

        return $options;
    }

    public function showRelatedProductSetting(){
        /**
         * Register the settings
         */
        add_action('admin_init', [ $this, 'plugin_settings' ]);

        /**
         * Create a plugin settings page
         */
        add_action('admin_menu', [ $this, 'add_plugin_page_wps_related_some_category' ]);
    }
}
