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

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<pre>
	<?php
	
	// print_r($product); 
	
	?>
</pre>








<div id="product-<?php the_ID(); ?> class="main-content">
                <main>
                    <div class="head_img"></div>
                    <div class="wrap">
                        <div class="breadcrumbs-holder -product">
							<nav class="breadcrumbs-ov">
								<?php yoast_breadcrumb( '<ol class="breadcrumbs">','</ol>' ); ?>
							</nav>
                        </div>
                        <aside class="clear">&nbsp;</aside>
                        <section>
                                <div class="prod-title js-prod-title">
                                    <h1 class="name"><?php the_title(); ?><h1>
                                    <div class="prod-rating-h">
										<span class="mix">
											<span class="prod-rating stars-<?php echo $product->get_average_rating() * 2; ?>"></span>
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
															<a class="product-image-main" href="<?php echo get_the_post_thumbnail_url(); ?>">
																<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="product_info_main_img">
															</a>
														</span>
                                                    </div>
                                                    <div class="prod-gallery-thumbs prod-col-narrow">
														<a href="<?php echo get_the_post_thumbnail_url(); ?>" class="prod-gallery-thumb -active" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></a>
														<?php
															  $attachment_ids = $product->get_gallery_image_ids();

															  foreach( $attachment_ids as $attachment_id ) {
																$image_link = wp_get_attachment_url( $attachment_id );
																?>
															  <a href="<?php echo $image_link; ?>" class="prod-gallery-thumb" style="background-image: url(<?php echo $image_link; ?>);" data-toggle="lightbox"></a>
															<?php  }
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
										<form class="cart" style="display:flex;" action="<?php echo get_permalink(get_the_ID()); ?>" method="post" enctype="multipart/form-data">
												<div class="cart-table-data -quantity" style="width: 160px;border: solid 0.5px;border-radius: 15px;margin-right: 10px;">
													<?php
													global $woocommerce;

														foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {

															if($cart_item['product_id'] == get_the_ID() ){
															//remove single product
															}
														} 
														if ( $product->is_sold_individually() ) {
															$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
														} else {
															$product_quantity = woocommerce_quantity_input(
																array(
																	'input_name'   => "cart[{$cart_item_key}][qty]",
																	'input_value'  => $cart_item['quantity'],
																	'max_value'    => $product->get_max_purchase_quantity(),
																	'min_value'    => '0',
																	'product_name' => $product->get_name(),
																),
																$product,
																false
															);
														}
														echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
													?>
												</div>
												<button type="submit" value="<?php the_ID() ?>" class="prod_addtocart simple-btn -success -large -wide" name="add-to-cart" style="width: max-content;">Add To Cart</button>
											</form>
                                    </div>
                                </div>
                                <aside class="clear"></aside>
                            
                        </section>
                        <nav class="product-navigation-wrap js-product-navigation-wrap">
                            <div class="product-navigation"><span class="item"><a class="js-scroll-to -active"
                                        href="#product-details">Product Details</a></span><span class="item"><a
                                        class="js-scroll-to prod-toolbar-rating stars-10" href="#reviews">Reviews
                                        (5)</a></span></div>
                        </nav>
                        <div class="prod-apps-cont">
                            <div class="pos_r">
                                <aside class="adsense-bn-t0">
                                    <div class="js-tpl-lazy-load-parent" data-lazy-load-enabled="1"><template
                                            class="js-tpl">
                                            <div id="div-gpt-ad-1636459717228-0"
                                                style="min-width:160px;min-height:600px;">
                                            </div>
                                        </template></div>
                                </aside>
                            </div>
                            <div class="prod-section">
                                <div class="prod-section-col2">
                                    <section class="prod-section-block" id="product-details">
                                        <div class="prod-section-content prod-details-min-h">
                                            <h2
                                                class="prod-section-title mobile-small-show prod-content-minus js-prod-content-toggle">
                                                Product Details</h2>
                                            <div class="prod-accordion-content-wrap">
                                                <div class="js-spoiler-block spoiler-block -gradient-fade"
                                                    data-height="300" data-respond="mobile-small"
                                                    style="max-height: none;">
                                                    <p class="prod-detail-img"></p>
                                                    <p>IMOVE GEN2 AS Tires by IRONMAN®. Season: All Season. Type: Fuel
                                                        Efficient. From overall handling to enhanced traction, the iMove
                                                        Gen2 tires boast multiple intelligent design features that
                                                        deliver dynamic highway performance and can carry a vehicle
                                                        farther and longer. With a performance-centric design, these
                                                        tires provide performance that appeals to enthusiasts and looks
                                                        that appeals to everyone.</p>
                                                    <div class="prod-notes">
                                                        <h3>Notes:</h3>
                                                        <ul>
                                                            <li>The actual Tread Pattern for your specific tire may vary
                                                                slightly from the displayed images based on the size
                                                                and/or width of the actual tire ordered.</li>
                                                        </ul>
                                                    </div>
                                                    <div class="js-prod-notes"></div>
                                                    <p data-lazy-load-enabled="1"><img class="lazy-loaded -no-touch"
                                                            src="https://ic.carid.com/ironman-tires/info/logo_0.jpg"
                                                            data-src="https://ic.carid.com/ironman-tires/info/logo_0.jpg"
                                                            alt="Ironman" style="opacity: 1;"></p>
                                                    <h3 id="features">Features:</h3>
                                                    <ul>
                                                        <li>Built to deliver an optimal balance of quality and
                                                            aesthetics</li>
                                                        <li>M+S rating ensures all-season performance and a
                                                            peace-of-mind</li>
                                                        <li>Enhanced directional stability and cornering grip at highway
                                                            speeds</li>
                                                        <li>Asymmetric tread design improves handling in wet and dry
                                                            conditions</li>
                                                        <li>Large contact patch with continuous center rib for superior
                                                            road control</li>
                                                        <li>Wide circumferential grooves maximize water evacuation
                                                            avoiding hydroplaning</li>
                                                    </ul>
                                                    <div class="prod-full-descr" data-sitemap="description">
                                                        <p>For those looking for entry-level tires that provide real
                                                            value and unparalleled quality, Ironman tires are just what
                                                            the doctor ordered. They combine cutting-edge expertise and
                                                            old-fashioned integrity, resulting in a smoother, safer, and
                                                            more convenient riding experience. With enhanced
                                                            puncture-resistant features, the Ironman tires deliver
                                                            outstanding traction in the most adverse conditions and
                                                            excellent durability even in extended off-road use. Offering
                                                            an all-inclusive collection of tires, Ironman has just the
                                                            tire you’re looking for—no matter what you drive, or where
                                                            you drive it.</p>
                                                    </div>
                                                    <p><b>Ironman®</b> is so confident in the reliable, long-lasting
                                                        performance of their tires that it backs them with the
                                                        industry's leading protection policy, providing total
                                                        peace-of-mind. So, whatever you drive, and wherever you’re
                                                        going, you can rely on Ironman tires to get you there safely and
                                                        securely. They can boast of an advanced groove design able to
                                                        protect against stone drilling and puncture, stable shoulder
                                                        blocks that provide side-biting traction on off-road surfaces,
                                                        an aggressive tread that delivers long mileage and resists
                                                        irregular wear, and other sophisticated features appreciated by
                                                        both serious off-road enthusiasts and the casual enthusiasts,
                                                        looking for great performance and cosmetic appeal at an
                                                        affordable price.</p>
                                                </div>
                                                <div class="spoiler-button-holder spoiler-control"><button type="button"
                                                        aria-label="see more / see less"
                                                        class="simple-btn -transparent -actions-view -wide js-spoiler-control"
                                                        data-text="see more" data-text-expanded="see less"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="prod-section-block prod-tire-sizes-wrap" id="sizes">
                                        <div class="prod-section-content">
                                            <h2
                                                class="prod-section-title prod-content-minus prod-sizes-title js-prod-content-toggle">
                                                Sizes</h2>
                                            <div class="prod-accordion-content-wrap">
                                                <div class="mmy-row -active">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">14"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-185-60r14-824143345.html">185/60R14</a>
                                                            <span class="load-index">82H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-185-65r14-824143340.html">185/65R14</a>
                                                            <span class="load-index">86H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-185-70r14-824143341.html">185/70R14</a>
                                                            <span class="load-index">88T</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-195-70r14-824143414.html">195/70R14</a>
                                                            <span class="load-index">91T</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">15"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-185-55r15-824143408.html">185/55R15</a>
                                                            <span class="load-index">82V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-185-65r15-824143385.html">185/65R15</a>
                                                            <span class="load-index">88H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-195-50r15-824143415.html">195/50R15</a>
                                                            <span class="load-index">82V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-195-55r15-824143406.html">195/55R15</a>
                                                            <span class="load-index">85V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-195-60r15-824143390.html">195/60R15</a>
                                                            <span class="load-index">88H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-195-65r15-824143388.html">195/65R15</a>
                                                            <span class="load-index">91H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-60r15-824143392.html">205/60R15</a>
                                                            <span class="load-index">91H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-65r15-824143399.html">205/65R15</a>
                                                            <span class="load-index">94H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-70r15-824143401.html">205/70R15</a>
                                                            <span class="load-index">96T</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-70r15-824143437.html">215/70R15</a>
                                                            <span class="load-index">98T</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">16"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-45zr16-824143396.html">205/45ZR16</a>
                                                            <span class="load-index">87W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-50zr16-824143398.html">205/50ZR16</a>
                                                            <span class="load-index">91W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-55r16-824143474.html">205/55R16</a>
                                                            <span class="load-index">91V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-60r16-824143465.html">205/60R16</a>
                                                            <span class="load-index">92V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-55zr16-824143473.html">215/55ZR16</a>
                                                            <span class="load-index">97W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-60r16-824143464.html">215/60R16</a>
                                                            <span class="load-index">95V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-65r16-824143472.html">215/65R16</a>
                                                            <span class="load-index">98H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-50r16-824143384.html">225/50R16</a>
                                                            <span class="load-index">96V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-55r16-824143467.html">225/55R16</a>
                                                            <span class="load-index">99H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-60r16-824143463.html">225/60R16</a>
                                                            <span class="load-index">98H</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">17"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-40zr17-824143471.html">205/40ZR17</a>
                                                            <span class="load-index">84W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-45zr17-824143342.html">205/45ZR17</a>
                                                            <span class="load-index">88W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-205-50zr17-824143460.html">205/50ZR17</a>
                                                            <span class="load-index">93W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-45zr17-824143470.html">215/45ZR17</a>
                                                            <span class="load-index">91W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-50r17-824143459.html">215/50R17</a>
                                                            <span class="load-index">95V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-215-55r17-824143448.html">215/55R17</a>
                                                            <span class="load-index">94V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-45zr17-824143469.html">225/45ZR17</a>
                                                            <span class="load-index">94W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-50r17-824143450.html">225/50R17</a>
                                                            <span class="load-index">94V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-55r17-824143447.html">225/55R17</a>
                                                            <span class="load-index">97H</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-45zr17-824143461.html">235/45ZR17</a>
                                                            <span class="load-index">97W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-50zr17-824143449.html">235/50ZR17</a>
                                                            <span class="load-index">96W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-55r17-824143457.html">235/55R17</a>
                                                            <span class="load-index">103V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-40zr17-824143334.html">245/40ZR17</a>
                                                            <span class="load-index">95W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-45zr17-824143412.html">245/45ZR17</a>
                                                            <span class="load-index">99W</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">18"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-40zr18-824143454.html">225/40ZR18</a>
                                                            <span class="load-index">92W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-45zr18-824143366.html">225/45ZR18</a>
                                                            <span class="load-index">91W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-50zr18-824143358.html">225/50ZR18</a>
                                                            <span class="load-index">95W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-60r18-2059542714.html">225/60R18</a>
                                                            <span class="load-index">100V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-40zr18-824143370.html">235/40ZR18</a>
                                                            <span class="load-index">95W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-45zr18-824143364.html">235/45ZR18</a>
                                                            <span class="load-index">94W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-50zr18-824143357.html">235/50ZR18</a>
                                                            <span class="load-index">97W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-55r18-824143405.html">235/55R18</a>
                                                            <span class="load-index">100V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-40zr18-824143368.html">245/40ZR18</a>
                                                            <span class="load-index">97W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-45zr18-824143359.html">245/45ZR18</a>
                                                            <span class="load-index">100W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-50zr18-1107228809.html">245/50ZR18</a>
                                                            <span class="load-index">100W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-255-35zr18-824143455.html">255/35ZR18</a>
                                                            <span class="load-index">94W</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">19"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-35zr19-824143361.html">225/35ZR19</a>
                                                            <span class="load-index">88W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-35zr19-824143348.html">235/35ZR19</a>
                                                            <span class="load-index">91W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-50r19-1107228810.html">235/50R19</a>
                                                            <span class="load-index">103V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-235-55r19-824143394.html">235/55R19</a>
                                                            <span class="load-index">105V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-40zr19-824143347.html">245/40ZR19</a>
                                                            <span class="load-index">98W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-45zr19-2059542715.html">245/45ZR19</a>
                                                            <span class="load-index">102W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-255-35zr19-824143354.html">255/35ZR19</a>
                                                            <span class="load-index">96W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-265-30zr19-824143356.html">265/30ZR19</a>
                                                            <span class="load-index">93W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-275-30zr19-824143362.html">275/30ZR19</a>
                                                            <span class="load-index">96W</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">20"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-225-35zr20-824143352.html">225/35ZR20</a>
                                                            <span class="load-index">90W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-35zr20-824143350.html">245/35ZR20</a>
                                                            <span class="load-index">95W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-40zr20-824143344.html">245/40ZR20</a>
                                                            <span class="load-index">99W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-45zr20-824143410.html">245/45ZR20</a>
                                                            <span class="load-index">103W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-50r20-2144982032.html">245/50R20</a>
                                                            <span class="load-index">102V</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-255-35zr20-824143336.html">255/35ZR20</a>
                                                            <span class="load-index">97W</span></div>
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-255-45zr20-1107228811.html">255/45ZR20</a>
                                                            <span class="load-index">105W</span></div>
                                                    </div>
                                                </div>
                                                <div class="mmy-row">
                                                    <div class="mmy-row-title -pointer js-mmy-row-expand">22"<span
                                                            class="mmy-row-expand"></span></div>
                                                    <div class="prod-tire-sizes">
                                                        <div class="info"><span class="title">IMOVE GEN2 AS</span> <a
                                                                class="specs"
                                                                href="https://www.carid.com/ironman-tires/imove-gen2-as-245-30zr22-824143338.html">245/30ZR22</a>
                                                            <span class="load-index">92W</span></div>
                                                    </div>
                                                </div>
                                                <div class="spoiler-button-holder spoiler-control"><button type="button"
                                                        aria-label="see more / see less"
                                                        class="simple-btn -transparent -actions-view -wide js-spoiler-control"
                                                        data-text="see more" data-text-expanded="see less"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <aside class="prod-section-block" id="warranty">
                                        <div class="prod-section-content">
                                            <h2
                                                class="prod-section-title prod-content-minus prod-content-plus js-prod-content-toggle">
                                                Warranty</h2>
                                            <div class="prod-accordion-content-wrap">
                                                <div class="js-spoiler-block spoiler-block -gradient-fade -active -expanded"
                                                    data-height="300" data-respond="mobile desktop"
                                                    style="max-height: 300px;">
                                                    <p><strong>This Limited Protection Policy applies to Ironman brand
                                                            tires purchased on or after
                                                            July 1, 2018, or, in the absence of proof of purchase, tires
                                                            with a manufacturing
                                                            DOT code reading DOT 2518 or later.
                                                        </strong></p>
                                                    <p>
                                                    </p>
                                                    <p><strong><big>ELIGIBILITY</big></strong></p>
                                                    <p>Eligible tires are covered by this Limited Protection Policy for
                                                        a period of 60 months from the
                                                        date of original tire manufacture date or purchase date. Without
                                                        proof of purchase, date of
                                                        manufacture will be used to determine age.</p>
                                                    <p>This Limited Protection Policy applies to the original owner of
                                                        new Ironman brand SUV/P-Metric/
                                                        Light Truck and Passenger tires that are new replacement market
                                                        tires bearing the Ironman
                                                        brand name and D.O.T. Tire Identification Number, operated in
                                                        normal service, and used on the
                                                        same vehicle on which they were originally installed according
                                                        to the vehicle manufacturer’s
                                                        recommendations. Tire(s) on any vehicle registered and normally
                                                        operated outside the United
                                                        States and Canada are excluded from eligibility under this
                                                        Limited Protection Policy.</p>
                                                    <p>When used in normal noncommercial service, SUV/P-Metric/Light
                                                        Truck and Passenger tires which
                                                        become unserviceable due to defects in workmanship and material
                                                        will be replaced on a “no
                                                        charge” basis during the first 2/32nds of an inch (1.6mm) of
                                                        original usable tread. The cost
                                                        of mounting, balancing and any other service charges including
                                                        applicable taxes are excluded
                                                        from reimbursement. Thereafter, the adjustment replacement price
                                                        will be based upon tread wear
                                                        prorated upon the basis of the original purchase price. Tires
                                                        are considered 100% worn when
                                                        the remaining tread depth is 2/32nds of an inch or less.
                                                        Cosmetically blemished (“blem”) tires
                                                        are not adjustable. Out of balance, out of round or ride
                                                        disturbance tire adjustments will only be
                                                        made during the first 2/32nds of an inch of the original usable
                                                        tread depth. Three (3) or more tires
                                                        from the same vehicle will not be accepted. All Ironman brand
                                                        tire adjustments will be subject
                                                        to and made in conformity with the following conditions and
                                                        exclusions of the Ironman Limited
                                                        Protection Policy</p>
                                                    <p>Hercules Tire &amp; Rubber Co. cares about your safety and your
                                                        tires. Please drive responsibly
                                                        and maintain your vehicle properly.</p>
                                                    <p>To be eligible, you need to present your original tire sales
                                                        invoice showing date of purchase,
                                                        along with this Limited Protection Policy, with the Information
                                                        Section completed. You are
                                                        responsible for payment of all applicable taxes, demounting,
                                                        mounting and balancing charges
                                                        set forth under this Coverage. You are also responsible for
                                                        payment of local tire disposal fees
                                                        and any parts or service regardless of mileage or months of
                                                        service. This includes payment for
                                                        tire rotation, alignment, towing, road service and valve stems
                                                        and all applicable taxes.</p>
                                                    <p>Tires replaced on an adjustment basis become the property of the
                                                        Company. You will be required
                                                        to sign the Ironman Limited Protection Policy Claim Form.</p>
                                                    <p>Adjustment procedures are described in the Owner’s General
                                                        Obligation section. Complete and
                                                        sign an Ironman Limited Protection Policy Claim Form which is
                                                        available at any authorized dealer.</p>
                                                    <p><strong><big>ROAD HAZARD PROTECTION POLICY</big></strong></p>
                                                    <p>This Road Hazard Protection Policy is valid from the date of
                                                        purchase for two (2) years or when
                                                        the tire reaches 50% of usable tread depth, whichever comes
                                                        first. When an eligible tire is
                                                        damaged during the first 2/32nds of an inch (1.6mm) of treadwear
                                                        or first 12 months from
                                                        date of purchase, whichever comes first, the tire will be
                                                        replaced with a comparable Ironman
                                                        brand tire free of charge. Coverage is prorated via an
                                                        adjustment procedure after the free
                                                        replacement period on eligible tires for up to 50% of usable
                                                        tread depth, or up to two (2) years,
                                                        whichever comes first.</p>
                                                    <p><strong><big>ROAD HAZARD EXCLUSIONS:</big></strong></p>
                                                    <p>This Road Hazard Protection Policy excludes Ironman Tires Medium
                                                        Truck tires. All
                                                        exclusions described under the section of “What is not covered”
                                                        within this Limited
                                                        Protection Policy and other exclusions include, but are not
                                                        limited to, effects caused by: </p>
                                                    <ol>
                                                        <li> A tire that is damaged/failed due to a vandalism.</li>
                                                        <li>A tire that is damaged/failed due to an accident.</li>
                                                        <li> A tire that is damaged/failed due to commercial, industrial
                                                            or agricultural use. </li>
                                                        <li>A tire that is damaged/failed due to racing. </li>
                                                        <li>A tire that is damaged/failed due to off-road use.</li>
                                                        <li>A tire that is damaged/failed due to snow chains or studs.
                                                        </li>
                                                        <li>A tire that is damaged/failed due to rapid or irregular
                                                            wear.</li>
                                                        <li>A tire that is damaged/failed due to wear from worn
                                                            mechanical components on the vehicle.</li>
                                                        <li>Tires transferred from the vehicle on which they were
                                                            originally installed.</li>
                                                        <li>Loss of time, inconvenience, loss of use of vehicle or
                                                            consequential damage.</li>
                                                        <li> Any tires used on any emergency response vehicle.</li>
                                                        <li> Repairable under USTMA guidelines.</li>
                                                        <li> Tires that reflect damage due to continued run flat or
                                                            acute under-inflation.</li>
                                                        <li> Tire series 40 and lower (i.e. 40,35,30,25 and 20).</li>
                                                    </ol>
                                                    <p>Some states do not allow the exclusion or limitation of
                                                        incidental or consequential damages,
                                                        so the above limitations or exclusions may not apply.</p>
                                                    <p><strong><big>WHAT IS NOT COVERED BY THIS LIMITED PROTECTION
                                                                POLICY</big></strong></p>
                                                    <p><strong>THE FOLLOWING ARE NOT COVERED:</strong></p>
                                                    <ul>
                                                        <li>Hercules Tire &amp; Rubber Co. does not warrant any repaired
                                                            or cosmetically blemished
                                                            (“blem”) tire.</li>
                                                        <li>Improper operation or maintenance: This includes, but is not
                                                            limited to, effects caused by:</li>
                                                        <span>Improper tire inflation and/or improper load/speed
                                                            practices.</span>
                                                        <span>Improper or insufficient tire rotation.</span>
                                                    </ul>

                                                    <p><strong>Damage due to:</strong></p>
                                                    <ol>
                                                        <li> Rim irregularities or rim damage.</li>
                                                        <li> Snow chains.</li>
                                                        <li> Vehicle mechanical problems, including brake problems, and
                                                            vehicle wheel alignment.</li>
                                                        <li> Extreme temperature exposure.</li>
                                                        <li> Negligent and abusive driving such as tire spinning, or
                                                            racing.</li>
                                                        <li> Improper tire storage.</li>
                                                        <li> Automotive accident.</li>
                                                        <li> Chemical corrosion or fire.</li>
                                                        <li> Use contrary to the vehicle manufacturer’s tire
                                                            recommendations.</li>
                                                        <li> Improper stud size and/or installation.</li>
                                                        <li> Improper mounting or demounting.l) Alteration: such as, but
                                                            not limited to, adding
                                                            a white inlay on blackwall, tread regrooving, tire truing or
                                                            siping, or adding sealant
                                                            materials to the tire.</li>
                                                        <li> Weather checking/cracking: not covered after 24 months from
                                                            the date of purchase.</li>
                                                    </ol>
                                                    <p>Some states do not allow the exclusion or limitation of
                                                        incidental or consequential damages,
                                                        so the above limitations or exclusions may not apply.</p>
                                                </div>
                                                <div class="spoiler-button-holder spoiler-control"><button type="button"
                                                        aria-label="see more / see less"
                                                        class="simple-btn -transparent -actions-view -wide js-spoiler-control -expanded"
                                                        data-text="see more" data-text-expanded="see less"
                                                        data-scroll-position="2517"></button></div>
                                                <div class="prod_offer">
                                                    <div class="prod-offer-item">
                                                        <div class="prod-offer-title">Magnuson-Moss Warranty Act:</div>
                                                        <div class="prod-offer-content">Legally, a vehicle manufacturer
                                                            cannot void the warranty on a vehicle due to an aftermarket
                                                            part unless they can prove that the aftermarket part caused
                                                            or contributed to the failure in the vehicle (per the
                                                            Magnuson Moss Warranty Act (15 U.S.C. 2302(C)) <span
                                                                data-hlk="/magnuson-moss-warranty-act.html"
                                                                class="js-new-tab">Learn&nbsp;More</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                        <section class="prod-review-block js-review-holder">
                            <div class="prod-review-section-title prod-section-title prod-content-minus prod-content-plus js-prod-content-toggle"
                                id="reviews">
                                <h2 class="heading">Reviews</h2> (5)
                            </div>
                            <div class="prod-accordion-content-wrap">
                                <div class="prod-review-head review-col-section">
                                    <div class="prod-review-col-write">
                                        <div
                                            class="prod-review-section-description mobile-small-hide mobile-medium-hide">
                                            Only authorized customers can leave a review on our website. We would love
                                            to know what you like or dislike about the product. Share your opinion on
                                            product quality, appearance, installation, and other characteristics.</div>
                                        
                                        <div class="prod-review-write-btn-h"><button type="button"
                                                class="simple-btn -transparent -wide js-write-prod-review">Write a
                                                Review</button></div>
                                    </div>
                                    <div class="prod-review-col-rating">
                                        <div
                                            class="prod-review-section-name mobile-small-hide mobile-medium-hide -product">
                                            <b>IRONMAN® 93013</b> - IMOVE GEN2 AS (225/50R17 94V)</div>
                                        <div class="prod-review-section-rating stars-10" data-avg="4.8"
                                            data-count="5 Reviews">/5</div>
                                        <div class="rating-percent-star-count stars-10" data-count="4">
                                            <div class="percent"><span class="progress" style="width: 80%;"></span>
                                            </div>
                                        </div>
                                        <div class="rating-percent-star-count stars-8" data-count="1">
                                            <div class="percent"><span class="progress" style="width: 20%;"></span>
                                            </div>
                                        </div>
                                        <div class="rating-percent-star-count stars-6" data-count="0">
                                            <div class="percent"><span class="progress" style="width: 0%;"></span></div>
                                        </div>
                                        <div class="rating-percent-star-count stars-4" data-count="0">
                                            <div class="percent"><span class="progress" style="width: 0%;"></span></div>
                                        </div>
                                        <div class="rating-percent-star-count stars-2" data-count="0">
                                            <div class="percent"><span class="progress" style="width: 0%;"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prod-review-sort-section"><span class="prod-review-sort-reviews"><span
                                            class="js-reviews-range">1-5</span> of 5 Reviews</span>
                                    <div class="prod-reviews-sort-tool">
                                        <div class="reviews-sort-select-wrap">
                                            <div class="form-field -select js-form-field mb0 -not-empty -not-focus">
                                                <label for="reviews-sort-select">Sort by</label><select
                                                    class="js-reviews-sort" name="sorter" id="reviews-sort-select"
                                                    data-total="5" data-offset="10" data-limit="10"
                                                    data-prod-type="parent" data-prod-id="803009841" data-user-id=""
                                                    data-domain-id="1">
                                                    <option value="dateHi" selected="">Newest</option>
                                                    <option value="dateLow">Oldest</option>
                                                    <option value="positive">Highest rated</option>
                                                    <option value="critical">Lowest rated</option>
                                                    <option value="gallery">With photo/video first</option>
                                                </select></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-section js-prod-reviews-list">
                                    <div class="prod-review js-prod-review" data-offset_date="2021-10-28 04:22:05">
                                        <div class="prod-review-col-head">
                                            <div class="prod-review-head-rating stars-8">4 of 5</div>
                                            <div class="prod-review-title">Very Good Tire Value</div><span
                                                class="prod-review-prod-name"><b>IRONMAN®</b> - IMOVE GEN2 AS</span>
                                        </div>
                                        <div class="prod-review-col-main">
                                            <div class="prod-review-message">I would recommend Ironman. I chose a set of
                                                Ironman 93683's to replace a worn set of Kelly Edge A/S on our '15
                                                Toyota Sienna Limited Premium that we purchased in November '20 with 85K
                                                miles. Vehicle now has 97K miles and so far I am very pleased with the
                                                tires. As is my custom with other vehicles I own, they have been rotated
                                                with every oil change and the pressure maintained around 37 psi. These
                                                tires are quiet-running. The treadwear rating is modest, and I fully
                                                expect to get at least 40K miles of service.</div>
                                            <div class="prod-feedback-info -reviews" data-first-char="C"><span
                                                    class="prod-feedback-info-posted">Posted by Customer / October 28,
                                                    2021<span class="ymm">2015 Toyota Sienna</span></span></div>
                                        </div>
                                    </div>
                                    <div class="prod-review js-prod-review" data-offset_date="2021-10-22 01:19:21">
                                        <div class="prod-review-col-head">
                                            <div class="prod-review-head-rating stars-10">5 of 5</div>
                                            <div class="prod-review-title">AMAZING All Season Tires</div><span
                                                class="prod-review-prod-name"><b>IRONMAN®</b> - IMOVE GEN2 AS</span>
                                        </div>
                                        <div class="prod-review-col-main">
                                            <div class="prod-review-message">These tires are great honestly. You can't
                                                go wrong with them especially for the price!

                                                I drive a sedan in NYC and you never know what kind of weather you'll
                                                get. I rarely slip with these tires especially when I am already in
                                                motion. I've had them for a little over a year now and they're barely
                                                worn down.

                                                Highly recommend for your daily driver!</div>
                                            <div class="prod-feedback-info -reviews" data-first-char="G"><span
                                                    class="prod-feedback-info-posted">Posted by Gianmarco (Bronx, NY) /
                                                    October 22, 2021<span class="ymm">2014 Nissan Maxima</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prod-review js-prod-review" data-offset_date="2021-01-07 12:51:17">
                                        <div class="prod-review-col-head">
                                            <div class="prod-review-head-rating stars-10">5 of 5</div>
                                            <div class="prod-review-title">2017 Chevrolet Cruze Lt</div><span
                                                class="prod-review-prod-name"><b>IRONMAN®</b> - IMOVE GEN2 AS</span>
                                        </div>
                                        <div class="prod-review-col-main">
                                            <div class="prod-review-message">I recommend these tires. These tires have
                                                superb handling in rain and water and on the road. Cornering is awesome.
                                                No sliding, or jumping. Gripping the dirt road from my house to the main
                                                road. My road is mainly rock and clay.The road noise has been reduced
                                                significantly to a quieter cab for more music enjoyment.
                                                Thick tread has not changed during the four months of driving of the
                                                many different surfaces. I will be purchasing again.</div>
                                            <div class="prod-feedback-info -reviews" data-first-char="S"><span
                                                    class="prod-feedback-info-posted">Posted by Shan (Roy, WA) / January
                                                    07, 2021<span class="ymm">2017 Chevy Cruze</span></span></div>
                                        </div>
                                    </div>
                                    <div class="prod-review js-prod-review" data-offset_date="2020-08-04 10:21:07">
                                        <div class="prod-review-col-head">
                                            <div class="prod-review-head-rating stars-10">5 of 5</div>
                                            <div class="prod-review-title">Focus ZX3</div><span
                                                class="prod-review-prod-name"><b>IRONMAN®</b> - IMOVE GEN2 AS</span>
                                        </div>
                                        <div class="prod-review-col-main">
                                            <div class="prod-review-message">Tires roll smoothly and do great in heavy
                                                rain. I'd definitely buy them again.</div>
                                            <div class="prod-feedback-info -reviews" data-first-char="A"><span
                                                    class="prod-feedback-info-posted">Posted by Anthony (Reynoldsburg,
                                                    OH) / August 04, 2020<span class="ymm">2004 Ford Focus</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prod-review js-prod-review" data-offset_date="2019-11-22 11:15:51">
                                        <div class="prod-review-col-head">
                                            <div class="prod-review-head-rating stars-10">5 of 5</div>
                                            <div class="prod-review-title">Gen 2</div><span
                                                class="prod-review-prod-name"><b>IRONMAN®</b> - IMOVE GEN2 AS</span>
                                        </div>
                                        <div class="prod-review-col-main">
                                            <div class="prod-review-message">Great looks, ride, with a big safety
                                                margin.</div>
                                            <div class="prod-feedback-info -reviews" data-first-char="B"><span
                                                    class="prod-feedback-info-posted">Posted by Bob (Marietta, OH) /
                                                    November 22, 2019<span class="ymm">2008 Audi A4</span></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="prod-review-footer-section">
                                    <div class="review-more-btn-holder spoiler-button-holder"><button type="button"
                                            aria-label="view more"
                                            class="simple-btn -transparent -actions-view -wide js-prod-rvw-expand hidden"
                                            data-text="View More"></button></div>
                                </div>
                                <div class="prod-review-footer-section">
                                    <div class="review-more-btn-holder spoiler-button-holder">
                                        <div class="result_preloader nobg hidden js-reviews-preloader"></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="prod-review-block">
                            <div class="prod-review-section-title prod-section-title prod-content-minus prod-content-plus js-prod-content-toggle"
                                id="qa">
                                <h2 class="heading">Questions and Answers</h2> (0)
                            </div>
                            <div class="prod-accordion-content-wrap">
                                <div class="prod-review-head review-col-section">
                                    <div class="prod-review-col-write">
                                        <div class="prod-review-section-description">If you have any questions about
                                            this product, please don't hesitate to ask us. We will be happy to help you!
                                        </div>
                                        <div class="prod-review-write-btn-h -center"><button type="button"
                                                class="simple-btn -transparent -wide js-ask-question"
                                                data-product-id="803009841">Ask a Question</button></div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>












































<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
