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
					<?php
						if(is_active_sidebar('footer-1')) : 
				 			dynamic_sidebar('footer-1'); 
						endif; 
					?>
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
					<?php
						if(is_active_sidebar('footer-3')) : 
				 			dynamic_sidebar('footer-3'); 
						endif; 
					?>
				</div>
			</div>


		</div>
	</div>
	<div class="f-other">
		<div class="wrap">
			<?php
				if(is_active_sidebar('footer-copyright')) : 
					dynamic_sidebar('footer-copyright'); 
				endif; 
			?>
		</div>
	</div>

</footer>
</div>
</div>
<aside class="main-content-overlay" onclick="closeLeftPanel()"></aside>
</div>



<div id="js-media-query-state" class="media-query-state"></div>
<div class="to-top-btn js-to-top" style="display: none;"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
    integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<?php wp_footer(); ?>

</body>

</html>