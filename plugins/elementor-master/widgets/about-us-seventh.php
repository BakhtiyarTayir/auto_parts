<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class About_Us_Seventh extends Widget_Base {

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
		return 'aboutUsSeventh';
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
		return esc_html__( 'About Us Seventh block', 'elementor' );
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
		return 'eicon-image-before-after';
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
			'title-1',
			array(
				'label'   => __( 'First block title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);
			
		$this->add_control(
			'description-1',
			array(
				'label'   => __( 'First block description', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'button-text',
			array(
				'label'   => __( 'Button text', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);
			
		$this->add_control(
			'description-1',
			array(
				'label'   => __( 'first block description', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-master' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);


		
		$this->add_control(
			'title-2',
			array(
				'label'   => __( 'Second block title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);
			
		$this->add_control(
			'description-2',
			array(
				'label'   => __( 'Second block description', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);
		$this->add_control(
			'background-image', [
				'label' => __( 'Background image', 'elementor-master' ),
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

		<div class="about-us-block-holder" data-lazy-load-enabled="1">
    	    <div class="about-us-block -half -join-us">
    	        <div class="about-us-title"><?php echo $settings['title-1']; ?></div>
    	        <p class="about-us-description"><?php echo $settings['description-1']; ?></p><a class="simple-btn -danger mt30 js-new-tab" href="<?php echo $settings['link']['url']; ?>" rel="nofollow"><?php echo $settings['button-text']; ?></a>
    	    </div>
    	    <div class="about-us-block -half -our-mission" style="background: #757575 url(<?php echo $settings['background-image']['url']; ?>) 50% 50% no-repeat;">
    	        <div class="about-us-title -white"><?php echo $settings['title-2']; ?></div>
    	        <p class="about-us-description -big -white"><?php echo $settings['description-2']; ?></p>
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