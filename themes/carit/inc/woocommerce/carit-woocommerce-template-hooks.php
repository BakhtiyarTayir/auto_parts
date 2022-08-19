<?php
/**
 * Storefront WooCommerce hooks
 *
 * @package storefront
 */


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function open_container_row_div_classes() {
	echo '<div class="body-bg-type1"> <div class="wrap">';
}

add_action( 'woocommerce_breadcrumb', 'open_container_row_div_classes', 5 );

function end_container_row_div_classes() {
		echo '</div></div>';
}

add_action( 'woocommerce_before_shop_loop', 'end_container_row_div_classes', 5 );



// function change_breadcrumb_delimiter( $defaults ) {
// 	$defaults['delimiter']   = '<span class="breadcrumb-separator"> / </span>';
// 	$defaults['wrap_before'] = '<div class="carit-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__( 'breadcrumbs', 'carit' ) . '">';
// 	$defaults['wrap_after']  = '</nav></div></div>';
// 	return $defaults;
// }
// add_filter( 'woocommerce_breadcrumb_defaults' 'change_breadcrumb_delimiter' );
           

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' › ',
            'wrap_before' => '<div class="breadcrumbs-holder"><nav class="breadcrumbs-ov"><ol class="breadcrumbs">',
            'wrap_after'  => '</ol></nav></div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}


add_action( 'template_redirect', 'load_template_layout' );

function load_template_layout() {
    if ( is_shop() ) {          
        add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 10 );
    }
}


add_filter( 'woocommerce_show_page_title', 'toggle_page_title' );

function toggle_page_title($val) {
    $val = false;
    return $val;
}

add_action( 'woocommerce_archive_description', 'carit_woocommerce_product_title', 10);

function carit_woocommerce_product_title() {
    if ( is_product_category() ) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $title_array = explode(' ', $cat->name);
        echo '<div><h1 class="h1-fat"> ';
        foreach ($title_array as $key => $value) {
            if( $key == 0 ) {
                echo ' ' . $value;
            } else {
                echo ' <span>' . $value . '</span>';
            }
            
        }
        echo '</h1></div>';
    }
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


// add_action( 'woocommerce_before_shop_loop', 'carit_section_wrap_open', 10);
// function carit_section_wrap_open() {
//     echo '<section>';
// }

// add_action( 'woocommerce_after_shop_loop', 'carit_section_wrap_end', 10);

// function carit_section_wrap_end() {
//     echo '</section>';
// }


// Отделяем категории от товаров
function tutsplus_product_subcategories( $args = array() ) {

    $parentid = get_queried_object_id();

    $args = array(
    'parent' => $parentid
    );

    $terms = get_terms( 'product_cat', $args );

    if ( $terms ) {
        
        echo '<div class="body-bg-type1 mt-minus-block"><div class="wrap"><section><ul class="ptype-grid -col-5 -tile">';

        foreach ( $terms as $term ) {

            echo '<li class="category">';
            echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
            woocommerce_subcategory_thumbnail( $term );

            echo '<h3>'.$term->name.'</h3>';
            echo '</a>';
        }

        echo '</ul></section></div></div>';

    }

}

add_action( 'woocommerce_before_shop_loop', 'tutsplus_product_subcategories', 50 );

// remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
// add_action('woocommerce_shop_loop_item_title', 'woocommerce_custom_page_title', 10 );

// function woocommerce_custom_page_title() {
//     echo '<h1 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h1>';
// }
