<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Categories_Tabs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'categoriesTabs';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Categories Tabs', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-tabs';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'basic' );
	}
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'master' );
	}

	/**
	 * Register image box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-master' ),
			)
		);	
		

		$this->end_controls_section();
	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'description', 'basic' );

		$firstStart = true;
		?>
		<div class="body-bg-type1">
			<div class="wrap">
			<?php
			$parentCategories = [];

			$taxonomy     = 'product_cat';
			$orderby      = 'name';  
			$show_count   = 0;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no  
			$title        = '';  
			$empty        = 0;

			$args = array(
				'taxonomy'     => $taxonomy,
				'orderby'      => $orderby,
				'show_count'   => $show_count,
				'pad_counts'   => $pad_counts,
				'hierarchical' => $hierarchical,
				'title_li'     => $title,
				'hide_empty'   => $empty,
				'number'       => 10,
			);
			$all_categories = get_categories( $args );
			foreach ($all_categories as $cat) {
				if($cat->category_parent == 0) {
					$category_id = $cat->term_id;       
					array_push($parentCategories, [$cat->term_id, $cat->name]);
				}       
			}
			?>

		<section class="universal-tabs -mobile-shadow">
			<div class="nav js-nav-category-spoiler">
				<?php 
					
					for($i=0; $i < count($parentCategories); $i++){ ?>
						<div id="tab<?php echo $parentCategories[$i][0] ?>" class="link <?php if($i == 0){echo '-active';} ?>"><?php echo $parentCategories[$i][1] ?></div>
					
				<?php }  
				?>
				
				<div class="btn"></div>
			</div>
			<div class="content">
				<?php 
					for($i=0; $i < count($parentCategories); $i++){ ?>
						<div class="tab<?php echo $parentCategories[$i][0]; if($i == 0){echo ' -active';} ?> tab">
						<ul class="ptype-grid -col-5 -tile -mobile-small-col3">
							<?php
								$args2 = array(
										'taxonomy'     => $taxonomy,
										'child_of'     => 0,
										'parent'       => $parentCategories[$i][0],
										'orderby'      => $orderby,
										'show_count'   => $show_count,
										'pad_counts'   => $pad_counts,
										'hierarchical' => $hierarchical,
										'title_li'     => $title,
										'hide_empty'   => $empty
								);
								$sub_cats = get_categories( $args2 );

								if($sub_cats) {
									foreach($sub_cats as $sub_category) {
										$thumbnail_id = get_term_meta( $sub_category->term_id, 'thumbnail_id', true );
										$image_url    = wp_get_attachment_url( $thumbnail_id );
										?>
										<li class="li" data-lazy-load-enabled="1">
											<img class="ptype-grid-img lazy-load" src="<?php echo $image_url; ?>">
											<a class="ptype-grid-a -simple-title" href="<?php echo get_term_link($sub_category->term_id) ?>"><?php echo $sub_category->name ?></a>
										</li>
									<?php }   
								}
							?>
						</ul>
					</div>
				<?php } ?>
			</div>
		</section>
			</div>
		</div>
			

<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	
}