<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="cart-summary">
        <h2 class="heading"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>
    </div>

	<table cellspacing="0" class="shop_table shop_table_responsive">
		<ul class="cart-subtotal cart-order-list">
			<li class="item">
				<span class="float_left"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
				<span class="price"><?php wc_cart_totals_subtotal_html(); ?></span>
			</li>
			<?php wc_cart_totals_shipping_html(); ?>
			<li class="item">
				<span class="float_left"><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
				<span class="price red"><?php wc_cart_totals_order_total_html(); ?></span>
			</li>
		</ul>
	</table>
	
	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
