<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<aside class="left-panel nopreload">
		<div style="width: 100%; display: flex;">
			<div class="left-menu-header-close js-aside-panel-close"></div>
			<aside class="left-dd-holder panel-page-holder">
				<div class="panel-page -current">
					<div class="panel-header-content">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'phone-menu',
								'menu'            => 'phone-menu',
								'echo'            => true,
								'items_wrap'      => '<ul id="%1$s" class="%2$s panel-header -border-none left-dd-title -left-dd-title-height -icon -primary -phone">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
								'add_li_class'    => 'item js-head-dept',
								'link_class'      => 'head-dd-main',
							] );
						?>
					</div>
					<div class="panel-content">
						<div class="panel-content-spacing">
							<?php
								wp_nav_menu( [
									'theme_location'  => 'menu-1',
									'menu'            => 'menu-1',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'left-dd',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s left-dd">%3$s</ul>',
									'depth'           => 0,
									'walker'          => '',
									'add_li_class'    => 'item js-head-dept',
									'link_class'      => 'head-dd-main',
								] );
							?>
								
						</div>
						<div class="bottom-content left-dd-border-mini -border-top">
							<ul class="left-dd">
								<li><span class="js-account-left-menu left-dd-title -arrow"><span class="hover-item">My
											Account</span><span class="left-menu-vehicles-title js-user-greetings">
											Hello. Sign In</span></span></li>
								<li><span class="js-account-left-menu left-dd-title -arrow"><span class="hover-item">Contact Us</span></span></li>
							</ul>
						</div>
					</div>
				</div>
			</aside>
		</div>
	</aside>
	<aside class="head-search-holder js-head-search-form-holder" data-code="75fc933b62c5912d7ba17176b84716e4"
		data-id-prefix="head" data-has-mmy="1">
	</aside>
	<div id="scrollfix" class="no-hiddenScroll">
		<div class="main-wrap">
			<header class="head-header">
				<div class="wrap">
					<div class="header-top">
						<div class="nav-logo-holder -carid">
							<span id="#burgetButton" class="left-menu-icon js-hamburger"
								data-toggle-class="left-panel-show" data-vehicle-garage-id="15" data-vehicle-id="15"
								data-store-id="1" data-has-mmy="1">
							</span>
							<div class="logo">
								<?php if (has_custom_logo()) : ?>
									<a href="<?php echo esc_url(home_url('/')); ?>"><?php the_custom_logo(); ?></a>
								<?php else : ?>
									<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
								<?php endif; ?>
							</div>
						</div>
                        <?php echo do_shortcode('[fibosearch]'); ?>
						<ul class="home-header-nav-tool">
							<li
								class="header-dd-hover-element nav-tool-account-item mobile-small-hide mobile-medium-hide js-account-header-menu">
								<div class="nav-tool -account -icon-account"><span class="title mobile-large-hide">My
										Account</span>
								</div>
							</li>
							<li class="header-dd-hover-element mobile-small-hide mobile-medium-hide js-wishlist-header-menu"
								aria-haspopup="true">
								<div class="nav-tool -icon-wishlist"><span
										class="count-item -outline hidden js-wishlist-counter"></span></div>
								<div class="js-wishlist-dd-holder"></div>
							</li>
							<?php
								if ( function_exists( 'carit_woocommerce_header_cart' ) ) {
									carit_woocommerce_header_cart();
								}
							?>
						</ul>
					</div>
					<?php
					wp_nav_menu( [
						'theme_location'  => 'menu-1',
						'menu'            => 'menu-1',
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
						'items_wrap'      => '<ul id="%1$s" class="%2$s head-dd js-head-depts">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
						'add_li_class'    => 'item js-head-dept',
						'link_class'      => 'head-dd-main',
					] );
					?>
					
				</div>
				<div class="head-dd-cont-holder js-head-dd-cont-holder">
					<div class="wrap"></div>
				</div>
			</header>

