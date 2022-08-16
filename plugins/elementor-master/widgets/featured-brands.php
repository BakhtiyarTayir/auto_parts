<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Featured_Brands extends Widget_Base {

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
		return 'featuredBrands';
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
		return esc_html__( 'Featured Brands', 'elementor' );
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
			'title',
			array(
				'label'   => __( 'Title', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'brand_title', [
				'label' => __( 'Title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'elementor-master' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'brand_image', [
				'label' => __( 'Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'brand_link', [
				'label' => __( 'Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'brand_title' => __( 'Title #1', 'elementor-master' ),
					],
					
				],
				'title_field' => '{{{ brand_title }}}',
			]
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
		?>

<section>
						<h2 class="h2"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
						<div class="featured-brands-wrap ml0 mr0">
							<div class="shifter enabled -inactive shifter-ready" data-type="featured-brands" data-enabled="1">
								<ul class="featured_brands">

								<?php 
									if ( $settings['list'] ) {				
										foreach (  $settings['list'] as $item ) { ?>
									<li class="featured_brands_li">
										<div class="featured_brands_item" data-lazy-load-enabled="1"><img class="featured_brands_img lazy-load" src="<?php echo $item['brand_image']['url'];?>" alt="<?php echo $item['brand_title'];?>"><a class="featured_brands_a" href="<?php echo $item['brand_title'];?>"><?php echo $item['brand_title'];?></a></div>
									</li>
								<?php 
										}			
									}			
								?>
									
								</ul>
							</div>
						</div>
					</section>
						
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