<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carit
 */

?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>'/assets/css/articles.css'">

<main>
	<div class="wrap">
		<div class="breadcrumbs-holder -static">
			<nav class="breadcrumbs-ov">
				<?php yoast_breadcrumb( '<ol class="breadcrumbs">','</ol>' ); ?>
			</nav>
		</div>
		<div class="article-reading-time"><?php echo get_the_date( 'Y-m-d' ); ?></div>
		<h1 class="article-h1 -center"><?php the_title(); ?></h1>
	</div>
	<div class="head-img-holder">
		<div class="head_img head_img_minh">
			<div class="head_img_aligner">
				<picture class="head-img-overlay"><img
						src="<?php echo get_the_post_thumbnail_url(); ?>"
						alt="<?php the_title(); ?>"></picture>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="article-content _clear-modern">
			<nav class="article-annotation"></nav>
			<section class="article-body">
				<?php the_content(); ?>
			</section>
			<aside class="article-sidebar">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</main>