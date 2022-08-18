<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Home_Big_Banners extends Widget_Base {

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
		return 'homeBigBanners';
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
		return esc_html__( 'Home big banners', 'elementor' );
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
			'button_text',
			array(
				'label'   => __( 'Button text', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);		

		$this->add_control(
			'first_banner_image', [
				'label' => __( 'First banner Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'first_banner_link', [
				'label' => __( 'First banner Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);
		$this->add_control(
			'second_banner_image', [
				'label' => __( 'Second banner Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'second_banner_link', [
				'label' => __( 'Second banner Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);
		$this->add_control(
			'thrid_banner_image', [
				'label' => __( 'Thrid banner Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'thrid_banner_link', [
				'label' => __( 'Thrid banner Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);
		$this->add_control(
			'fourth_banner_image', [
				'label' => __( 'Fourth banner Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'fourth_banner_link', [
				'label' => __( 'Fourth banner Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);
		$this->add_control(
			'fifth_banner_image', [
				'label' => __( 'Fifth banner Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'fifth_banner_link', [
				'label' => __( 'Fifth banner Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
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
		<div class="body-bg-type1">
		<div class="wrap">
	<section>
		<ul class="hot-ideas-wrap">
			<li class="hot-ideas-col">
				<div class="hot-idea" data-lazy-load-enabled="1"><img class="hot-idea-img lazy-loaded -no-touch"
						src="<?php echo wp_kses( $settings['first_banner_image']['url'], array() ); ?>" data-banner-position="1" style="opacity: 1;">
					<div class="hot-idea-content"><a class="hot-idea-link js-link-opener" href="<?php echo wp_kses( $settings['first_banner_link']['url'], array() ); ?>">

							<span class="hot-idea-button -discount"><?php echo wp_kses( $settings['button_text'], array() ); ?></span></a></div>
				</div>
				<div class="hot-idea" data-lazy-load-enabled="1"><img class="hot-idea-img lazy-load"
						src="<?php echo wp_kses( $settings['second_banner_image']['url'], array() ); ?>"  data-banner-position="2">
					<div class="hot-idea-content"><a class="hot-idea-link js-link-opener" href="<?php echo wp_kses( $settings['second_banner_link']['url'], array() ); ?>"><span
								class="hot-idea-button -discount"><?php echo wp_kses( $settings['button_text'], array() ); ?></span></a>
					</div>
				</div>
			</li>
			<li class="hot-ideas-col -w50percent">
				<div class="hot-idea" data-lazy-load-enabled="1"><img class="hot-idea-img lazy-loaded -no-touch"
						src="<?php echo wp_kses( $settings['thrid_banner_image']['url'], array() ); ?>" data-banner-position="3"
						style="opacity: 1;">
					<div class="hot-idea-content"><a class="hot-idea-link js-link-opener" href="<?php echo wp_kses( $settings['thrid_banner_link']['url'], array() ); ?>"><span
								class="hot-idea-button -big -discount -large"><?php echo wp_kses( $settings['button_text'], array() ); ?></span></a></div>
				</div>
			</li>
			<li class="hot-ideas-col">
				<div class="hot-idea" data-lazy-load-enabled="1"><img class="hot-idea-img lazy-loaded -no-touch"
						src="<?php echo wp_kses( $settings['fourth_banner_image']['url'], array() ); ?>"
						data-banner-position="4" style="opacity: 1;">
					<div class="hot-idea-content"><a class="hot-idea-link js-link-opener" href="<?php echo wp_kses( $settings['fourth_banner_link']['url'], array() ); ?>"><span
								class="hot-idea-button -discount"><?php echo wp_kses( $settings['button_text'], array() ); ?></span></a>
					</div>
				</div>
				<div class="hot-idea" data-lazy-load-enabled="1"><img class="hot-idea-img lazy-load"
						src="<?php echo wp_kses( $settings['fifth_banner_image']['url'], array() ); ?>"
						data-banner-position="5">
					<div class="hot-idea-content"><a class="hot-idea-link js-link-opener" href="<?php echo wp_kses( $settings['fifth_banner_link']['url'], array() ); ?>"><span
								class="hot-idea-button -discount"><?php echo wp_kses( $settings['button_text'], array() ); ?></span></a>
					</div>
				</div>
			</li>
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