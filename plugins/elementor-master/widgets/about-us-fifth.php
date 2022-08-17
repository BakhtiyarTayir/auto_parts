<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class About_Us_Fifth extends Widget_Base {

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
		return 'aboutUsFifth';
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
		return esc_html__( 'About Us Fifth block', 'elementor' );
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
		return 'eicon-text';
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
	
		$this->add_control(
			'image-4', [
				'label' => __( 'Image 4', 'elementor-master' ),
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
            <div class="about-us-block -gallery">
                <div class="about-us-gallery" data-lazy-load-enabled="1">
                    <div class="item -replacement" style="background-image: url(<?php echo $settings['image-1']['url']; ?>);"></div>
                    <div class="item -settings" style="background-image: url(<?php echo $settings['image-2']['url']; ?>);"></div>
                    <div class="item -renewal" style="background-image: url(<?php echo $settings['image-3']['url']; ?>);"></div>
                    <div class="item -upgrade" style="background-image: url(<?php echo $settings['image-4']['url']; ?>);"></div>
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