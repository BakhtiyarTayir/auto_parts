<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carit
 */

?>




<footer class="f-footer js-bg-lazy-load" data-lazy-load-enabled="1">
	<div class="f-info">
		<div class="wrap">
			<div class="footer-mobile-table">
				<div class="f-info-col">
				 	<?php dynamic_sidebar('footer-1'); ?>
				</div>

				<div class="f-info-col">
					<span class="f-title footer-toggle-header"><?php pll_e('INFORMATION'); ?></span>
					<?php
					wp_nav_menu( [
						'theme_location'  => 'footer-1',
						'menu'            => 'footer-1',
						'container'       => 'div',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s f-list">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					] );
					?>
				</div>
				<div class="f-info-col">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
			</div>


		</div>
	</div>
	<div class="f-other">
		<div class="wrap">
			<?php dynamic_sidebar('footer-copyright'); ?>
		</div>
	</div>

</footer>
</div>
</div>
<aside class="main-content-overlay" onclick="closeLeftPanel()"></aside>
</div>



<div id="js-media-query-state" class="media-query-state"></div>
<div class="to-top-btn js-to-top" style="display: none;"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
	integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js"></script>


<?php wp_footer(); ?>

</body>

</html>