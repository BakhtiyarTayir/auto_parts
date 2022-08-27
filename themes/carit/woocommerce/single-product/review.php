<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $comment;
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<div class="prod-review js-prod-review">
	<div class="prod-review-col-head">
		<div class="prod-review-head-rating stars-<?php echo $rating*2; ?>"><?php echo $rating . ' of 5'; ?></div>
		<div class="prod-review-title"><?php echo get_the_title($comment->comment_post_ID); ?></div>
	</div>
	<div class="prod-review-col-main">
		<div class="prod-review-message">
			<?php
				/**
				 * The woocommerce_review_comment_text hook
				 *
				 * @hooked woocommerce_review_display_comment_text - 10
				 */
				do_action( 'woocommerce_review_comment_text', $comment );

				do_action( 'woocommerce_review_after_comment_text', $comment );
			?>
		</div>
		<div class="prod-feedback-info -reviews" data-first-char="<?php comment_author(); ?>">
				<span class="prod-feedback-info-posted">
				<?php echo esc_html( get_comment_date( wc_date_format() ) ); ?>
				<span class="ymm"><?php comment_author(); ?></span>
			</span>
		</div>
	</div>
</div>