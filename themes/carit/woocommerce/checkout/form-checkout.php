<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
 <form name="checkout" method="post" class="checkout woocommerce-checkout"
                        action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
<div class="body-bg-type1 login-extra-padding">
    <div class="wrap cart-bottom-indent" style="min-height: 465px; margin-top: 50px;">
        <div class="cart-main-col">
            <div class="cart-main-form-wrapper">
                <div class="cart-reg-inf">
                    <span class="orange">*</span> Required Information
                </div>
                <div class="cart-main-form-wrapper-inner">
                    <br class="mobile-small-show mobile-medium-show">
                        <?php if ( $checkout->get_checkout_fields() ) : ?>

                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                        <div class="col2-set" id="customer_details">
                            <div class="col-1">
                                <?php do_action( 'woocommerce_checkout_billing' ); ?>
                            </div>
                        </div>

                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                        <?php endif; ?>



                    </form>
                </div>
            </div>
        </div>
        <div class="cart-sidebar-holder -active">
            <div class="cart-sidebar">
                <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                <div id="order_review" class="cart-order">
                    <div class="cart-summary">
                        <h2 id="order_review_heading" class="heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h2>
                    </div>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                </div>

            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

</form>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>