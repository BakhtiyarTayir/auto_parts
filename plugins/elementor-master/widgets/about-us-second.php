<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class About_Us_Second extends Widget_Base {

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
		return 'aboutUsSecond';
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
		return esc_html__( 'About Us second block', 'elementor' );
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
		return 'eicon-call-to-action';
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
			'description',
			array(
				'label'   => __( 'Description', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Default description', 'plugin-name' ),
				'placeholder' => esc_html__( 'Type your description here', 'plugin-name' ),
			)
		);
		
		$this->add_control(
			'logo', [
				'label' => __( 'Logo', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'image-1', [
				'label' => __( 'Image 1', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'image-2', [
				'label' => __( 'Image 2', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$this->add_control(
			'image-3', [
				'label' => __( 'Image 3', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
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
		<div class="about-us-block-holder">
                    <div class="about-us-block -half -our-focus">
                        <div class="inner-wrap" data-lazy-load-enabled="1">
                            <div class="about-us-store-logo" style="background: url(<?php echo wp_kses( $settings['logo']['url'], array() ); ?>) 0 0 no-repeat;"></div>
                            <p class="about-us-description -align-left -big fw-bold"><?php echo wp_kses( $settings['description'], array() ); ?></p>
                        </div>
                    </div>
                    <div class="about-us-block -half -our-focus-gal">
                        <div class="about-us-gallery" data-lazy-load-enabled="1">
                            <div class="item -three -experience" style="background-image: url(<?php echo wp_kses( $settings['image-1']['url'], array() ); ?>);"></div>
                            <div class="item -three -professionalism" style="background-image: url(<?php echo wp_kses( $settings['image-2']['url'], array() ); ?>);"></div>
                            <div class="item -three -innovations" style="background-image: url(<?php echo wp_kses( $settings['image-3']['url'], array() ); ?>);"></div>
                        </div>
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