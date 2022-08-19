<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carit
 */

get_header();

?>

<div class="main-content">
	<main>


		<div class="wrap">
			<div class="pressroom-container">
				<aside class="pressroom-aside">
					<?php get_sidebar(); ?>
				</aside>
				<div class="pressroom-main">
					<ul class="pressroom-list js-pressroom-list" style="display: flex;flex-wrap: wrap;">
						<?php if ( have_posts() ) : ?>


						<?php

							$index=0;
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type(), $index );

								$index++;

							endwhile;

							else :

							get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
					</ul>
				</div>
				<div class="clear"></div>
				<?php
				the_posts_pagination([
					'show_all'     => false, // показаны все страницы участвующие в пагинации
					'end_size'     => 1,     // количество страниц на концах
					'mid_size'     => 1,     // количество страниц вокруг текущей
					'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
					'prev_text'    => __('Previous'),
					'next_text'    => __('Next'),
					'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
					'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
				]);
				?>
			</div>

		</div>
	</main>
</div>
<?php
get_footer();