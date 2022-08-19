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

                    <div class="body-bg-type1">
                        <div class="wrap">
                            <div class="breadcrumbs-holder -static">
                                <nav class="breadcrumbs-ov">
                                    <ol class="breadcrumbs">
                                        <li class="item"><a class="link" href="/">Home</a></li>
                                        <li class="item">In The News</li>
                                    </ol>
                                </nav>
                            </div>
                            <h1 class="h1-fat">In The News</h1>
                        </div>
                    </div>
                    <div class="wrap">
                        <div class="pressroom-container">
                            <aside class="pressroom-aside">
                                <div class="pressroom-heading">Social Activity</div>
                                <div class="pressroom-aside-block">
                                    <img src="./images/4-one-car-family-savings-yearly.jpg" style="width: 360px;">
                                </div>
                            </aside>
                            <div class="pressroom-main">
                                <ul class="pressroom-list js-pressroom-list">
								<?php if ( have_posts() ) : ?>


<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	/*
	 * Include the Post-Type-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	 */
	get_template_part( 'template-parts/content', get_post_type() );

endwhile;

the_posts_navigation();

else :

get_template_part( 'template-parts/content', 'none' );

endif;
?>
                                    <li class="pressroom-article">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/why-legacy-automakers-are-still-driving-teslas-dust.jpg" alt="Why Legacy Automakers Still Driving In Tesla Dust" style="opacity: 1;"></div>
                                        <div class="post-date">April 26, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">Why
                                                Legacy Automakers are Still Driving in Tesla's Dust</a></div>
                                        <div class="description">Traditional automakers are still driving in Tesla's
                                            dust, which is unstoppable. This week the company reported earnings,
                                            revenues, and deliveries for the first quarter, which surprised even the
                                            most bullish analysts.</div>
                                    </li>
                                    <li class="pressroom-article -small">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/highlights-of-the-2022-new-york-auto-show.jpg" alt="Highlights 2022 New York Auto Show" style="opacity: 1;"></div>
                                        <div class="post-date">April 26, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">Highlights
                                                of the 2022 New York Auto Show</a></div>
                                        <div class="description">After a two-year pause, the New York International Auto
                                            Show finally made a comeback for 2022. Despite the masks, the show had a
                                            decent footfall this year....</div>
                                    </li>
                                    <li class="pressroom-article -small -indent-left">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/safets-states-for-pedestrians.jpg" alt="Road Intersection Aerial Photo" style="opacity: 1;"></div>
                                        <div class="post-date">April 01, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">10
                                                Safest States for Pedestrians (2022 Study)</a></div>
                                        <div class="description">Pedestrian crashes accounted for 17% of all traffic
                                            fatalities in the U.S. However, in the ten safest states for pedestrians,
                                            the total number of pedestrian...</div>
                                    </li>
                                    <li class="pressroom-article -small">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/8-more-than-80-of-new-car-buyers-paid-over-sticker-price-in-january.jpg" alt="Car Key Money" style="opacity: 1;"></div>
                                        <div class="post-date">April 01, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">More
                                                Than 80% of New Car Buyers Paid Over...</a></div>
                                        <div class="description">Auto manufacturers are worried the practice by some
                                            dealers will hurt their brands. For more than a year, buying a new car has
                                            presented a new set of...</div>
                                    </li>
                                    <li class="pressroom-article -small -indent-left">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/7-brief-history-car-nomenclature.jpg" alt="Muscle Car Front Fender Close Up" style="opacity: 1;"></div>
                                        <div class="post-date">April 01, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">What’s
                                                In a Name? A Brief History of Car...</a></div>
                                        <div class="description">Bel Air. Barracuda. Bronco. What do these words have in
                                            common? When presented together, you don’t have to be a car nut to recognize
                                            them as iconic vehicle...</div>
                                    </li>
                                    <li class="pressroom-article -small">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/5-reasons-you-should-sell-your-car-save-big.jpg" alt="Car Window For Sale Sign" style="opacity: 1;"></div>
                                        <div class="post-date">April 01, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">5
                                                Reasons You Should Sell Your Car (and Save Big)</a></div>
                                        <div class="description">If you’re in the market to buy a used car, 2022 is no
                                            more your year than 2021 was — but for sellers, there’s no better time than
                                            the present. In the...</div>
                                    </li>
                                    <li class="pressroom-article -small -indent-left">
                                        <div class="img-holder" data-lazy-load-enabled="1"><img class="img lazy-loaded -no-touch" src="./images/4-one-car-family-savings-yearly.jpg" alt="Family Driving Convertible" style="opacity: 1;"></div>
                                        <div class="post-date">April 01, 2022</div>
                                        <div class="title"><a class="link js-new-tab" rel="external" href="#">How
                                                Much You Can Save Annually by Becoming a...</a></div>
                                        <div class="description">It’s no secret that car ownership is expensive. From
                                            fuel to maintenance and insurance, cars can cost you big bucks long after
                                            you’ve paid them off....</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                            <nav class="pagination">
                                <div class="pagination-rsp">
                                    <div class="pagination-txt">Showing <span>1-60</span> of <span>413</span> News</div>
                                    <div class="mobile-pagination-holder"><span class="pagination-prev active">Prev</span><span class="pagination-btn active">1</span>
                                            <a href="#" class="pagination-btn">2</a>
                                            <a href="#" class="pagination-btn">3</a>
                                            <a href="#" class="pagination-btn">4</a>
                                            <a href="#" class="pagination-btn">5</a>
                                            <a href="#" class="pagination-next">Next</a></div>
                                </div>
                            </nav>
                        </div>

                    </div>
                </main>
            </div>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();