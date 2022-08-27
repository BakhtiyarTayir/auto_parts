<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
$product = wc_get_product( get_the_ID() );

$imageUrl = get_the_post_thumbnail_url();

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div id="product-<?php the_ID(); ?>" class="main-content">
    <main>
        <div class="wrap">
            <?php do_action( 'woocommerce_before_main_content' ); ?>
            <aside class="clear">&nbsp;</aside>
            <section>
                <div class="prod-title js-prod-title">
                    <h1 class="name"><?php the_title(); ?><h1>
                            <div class="prod-rating-h">
                                <span class="mix">
                                    <span
                                        class="prod-rating stars-<?php echo $product->get_average_rating() * 2; ?>"></span>
                                    <a class="prod-rating-a js-scroll-to" href="#reviews">
                                        <?php echo $product->get_average_rating(); ?>
                                        reviews</a><i>|</i><i>|</i>Item #<?php the_ID(); ?></span></div>
                </div>
                <div id="prodLeftSide" class="prod-media">
                    <div id="main-product-gallery" class="main-product-gallery-wrap">
                        <div class="main-product-gallery-preload"></div>
                        <div class="main-product-gallery -static">
                            <div class="product-images-shifter -static">
                                <div class="product-images-shifter-source _clear-modern">
                                    <div class="product-image-main-holder">
                                        <span class="js-product-thumbs product-media-main" style="width: auto;">
                                            <a class="product-image-main"
                                                href="<?php echo $imageUrl; ?>">
                                                <img src="<?php echo $imageUrl; ?>"
                                                    class="product_info_main_img">
                                            </a>
                                        </span>
                                    </div>
                                    <div class="prod-gallery-thumbs prod-col-narrow">
                                        <a href="<?php echo get_the_post_thumbnail_url(); ?>"
                                            class="prod-gallery-thumb -active"
                                            style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
                                    <?php
									  $attachment_ids = $product->get_gallery_image_ids();
									  foreach( $attachment_ids as $attachment_id ) {
										$image_link = wp_get_attachment_url( $attachment_id );
									?>
                                        <a href="<?php echo $image_link; ?>" class="prod-gallery-thumb"
                                            style="background-image: url(<?php echo $image_link; ?>);"
                                            data-toggle="lightbox"></a>
                                    <?php  
                                        }
									?>
                                    </div>
                                    <div class="prod-gallery-thumbs prod-col-narrow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prodRightSide" class="prod-actions">
                    <div class="prod-info">
                        <div class="prod-price-h"><span class="js-product-price-hide"><span
                                    class="prod-price js-actual-price -wt">
                                    <?php echo $product->get_price_html(); ?>
                        </div>
                        <div class="prod_avail -green js-prod-avail">
                            <span class="js-deliver-text">
                                <?php echo $product->is_in_stock() ? 'In stock' . '(' . $product->stock_quantity . ')' : 'not'; ?>
                            </span>
                        </div>
                    </div>
                    <div class="prod-right-info-box js-need-this-installed-holder"></div>
                    <div class="js-product-info-box"></div>
                    <div class="prod_add">
                        <form class="cart" style="display:flex;" action="<?php echo get_permalink(get_the_ID()); ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="cart-table-data -quantity"
                                style="width: 160px;border: solid 0.5px;border-radius: 15px;margin-right: 10px;">
                                <?php
													woocommerce_quantity_input();
													?>
                            </div>
                            <button type="submit" value="<?php the_ID() ?>"
                                class="prod_addtocart simple-btn -success -large -wide" name="add-to-cart"
                                style="width: max-content;">Add To Cart</button>
                        </form>
                    </div>
                </div>
                <aside class="clear"></aside>

            </section>
            <nav class="product-navigation-wrap js-product-navigation-wrap">
                <div class="product-navigation">
                    <span class="item">
                        <a class="js-scroll-to -active" href="#product-details">Product Details</a>
                    </span>
                    <span class="item">
                        <a class="js-scroll-to prod-toolbar-rating stars-10" href="#reviews">Reviews
                            (<?php echo $product->get_average_rating(); ?>)</a>
                        </span>
                    </div>
            </nav>
            <div class="prod-apps-cont">
                <div class="prod-section">
                    <div class="prod-section-col2">
                        <section class="prod-section-block" id="product-details">
                            <div class="prod-section-content prod-details-min-h">
                                <?php the_content(); ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <section class="prod-review-block js-review-holder">
                <div class="prod-review-section-title prod-section-title prod-content-minus prod-content-plus js-prod-content-toggle"
                    id="reviews">
                    <h2 class="heading">Reviews</h2> (<?php echo $product->get_average_rating(); ?>)
                </div>
                <?php
                   comments_template();
                ?>
            </section>
        </div>
    </main>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>