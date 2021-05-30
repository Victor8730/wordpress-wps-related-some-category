<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Victor8730/wordpress-wps-related-some-category
 * @since      1.0.0
 *
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wps_Related_Some_Category
 * @subpackage Wps_Related_Some_Category/public
 * @author     Victor Galiuzov <victor8730@gmail.com>
 */
class Wps_Related_Some_Category_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $wps_related_some_category The ID of this plugin.
     */
    private $wps_related_some_category;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $wps_related_some_category The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($wps_related_some_category, $version)
    {

        $this->wps_related_some_category = $wps_related_some_category;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->wps_related_some_category, plugin_dir_url(__FILE__) . 'css/wps-related-some-category-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        wp_enqueue_script($this->wps_related_some_category, plugin_dir_url(__FILE__) . 'js/slick.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->wps_related_some_category.'-1', plugin_dir_url(__FILE__) . 'js/wps-related-some-category-public.js', array('jquery'), $this->version, false);

    }

    /**
     * Add product in some category
     * Get we get all categories in which there is a product
     * Then we prepare an array with all the products
     * @return string|string[]
     * @since    1.0.0
     */
    public function showRelatedProduct() {

        global $product;
        $allCategoryProduct = $allProduct = [];

        if (!empty($product) || $product->exists()) {

            $category = get_the_terms($product->id, 'product_cat');

            if(count($category) > 0){
                foreach($category as $cat){
                    $allCategoryProduct[] = get_posts( [
                        'post_type' => 'product',
                        'numberposts' => -1,
                        'post_status' => 'publish',
                        'tax_query' => [
                            [
                                'taxonomy' => 'product_cat',
                                'terms' => $cat->term_id,
                                'operator' => 'IN',
                            ]
                        ],
                    ] );

                }
            }

            foreach ($allCategoryProduct as $prod) {
                if (is_array($prod)) {
                    foreach ($prod as $p) {
                        if (!array_key_exists($p->ID, $allProduct)) {
                            $allProduct[$p->ID] = $p;
                        }
                    }
                } else {
                    $allProduct[$prod->ID] = $prod;
                }
            }

        }

        echo '<section class="related products 123"><div class="slick-related-some-category">';

        foreach($allProduct as $productSomeCategory){
           echo '<div><a href="'.$productSomeCategory->post_name.'">'.get_the_post_thumbnail($productSomeCategory->ID, 'medium').'</a></div>';
        }

        echo '</div></section>';

        echo '
        <script>
        jQuery(".slick-related-some-category").slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
        });
        </script>
        ';
    }

}
