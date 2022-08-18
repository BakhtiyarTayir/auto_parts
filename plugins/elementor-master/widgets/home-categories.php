<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Home_Categories extends Widget_Base {

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
		return 'homeCategories';
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
		return esc_html__( 'Home Categories block', 'elementor' );
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
		return ' eicon-gallery-grid';
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
		$this->add_control(
			'show_categories',
			[
				'label' => esc_html__( 'Show Categories', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $this->get_cats(),
				'default' => [ 'title', 'description' ],
			]
		);


		$this->end_controls_section();
	}

	public function get_cats() {
		$categories = get_categories( [
			'taxonomy'     => 'product_cat',
			'orderby'      => 'name',
			'hide_empty'   => 0,
		] );
		$categories_array = [];
		foreach ($categories as $key => $category) {
			$categories_array[$category->term_id] = $category->name;
		}	
		return $categories_array;
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

		$select_categories = $settings['show_categories'];
		// var_dump($select_categories);
		?>
		<div class="body-bg-type1">
		<div class="wrap">
			<section>
				<ul class="ptype-grid -col-9 -center">
					<?php 
						// параметры по умолчанию
						$categories = get_categories( [
							'taxonomy'     => 'product_cat',
							'orderby'      => 'name',
							'hide_empty'   => 0,
						] );

						if( $categories ) :
							foreach( $categories as $cat ) :
								if (in_array(intval($cat->term_id), $select_categories)) {
								// Данные в объекте $cat
								// $cat->term_id
								// $cat->name (Рубрика 1)
								// $cat->slug (rubrika-1)
								// $cat->term_group (0)
								// $cat->term_taxonomy_id (4)
								// $cat->taxonomy (category)
								// $cat->description (Текст описания)
								// $cat->parent (0)
								// $cat->count (14)
								// $cat->object_id (2743)
								// $cat->cat_ID (4)
								// $cat->category_count (14)
								// $cat->category_description (Текст описания)
								// $cat->cat_name (Рубрика 1)
								// $cat->category_nicename (rubrika-1)
								// $cat->category_parent (0)

								$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
								$image_url    = wp_get_attachment_url( $thumbnail_id );

								?>

								<li class="li" data-lazy-load-enabled="1">
									<img class="ptype-grid-img -departments lazy-loaded -no-touch" src="<?php echo $image_url; ?>" alt="<?php echo $cat->name ?>" style="opacity: 1;">
									<a class="ptype-grid-a -simple-title -departments" href="<?php echo get_term_link($cat->cat_ID); ?>"><?php echo $cat->name ?></a>
								</li>
								<?php }
							endforeach;
						endif;
						?>
				</ul>
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