<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carit
 */
?>

<li class="pressroom-article <?php if($args > 0){echo '-small';} if($args > 1 && $args % 2 == 0){echo ' -indent-left';} ?>">
	<div class="img-holder" data-lazy-load-enabled="1">
		<img class="img lazy-loaded -no-touch"
			src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
			alt="Why Legacy Automakers Still Driving In Tesla Dust" style="opacity: 1;"></div>
	<div class="post-date"><?php the_date(); ?></div>
	<div class="title">
		<a class="link js-new-tab" rel="external" href="<?php echo get_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</div>
	<div class="description">
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'carit' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		?>
	</div>
</li>