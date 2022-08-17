<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class About_Us_Social extends Widget_Base {

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
		return 'aboutUsSocial';
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
		return esc_html__( 'About Us Social block', 'elementor' );
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
			'title',
			array(
				'label'   => __( 'Title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);
			
		$this->add_control(
			'description',
			array(
				'label'   => __( 'Description', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'facebook_link',
			[
				'label' => esc_html__( 'Facebook Link', 'elementor-master' ),
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
			'facebook-icon', [
				'label' => __( 'Facebook icon', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'youtube_link',
			[
				'label' => esc_html__( 'YouTube Link', 'elementor-master' ),
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
			'youtube-icon', [
				'label' => __( 'YouTube icon', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'instagram_link',
			[
				'label' => esc_html__( 'Instagram Link', 'elementor-master' ),
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
			'instagram-icon', [
				'label' => __( 'Instagram icon', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'twitter_link',
			[
				'label' => esc_html__( 'Twitter Link', 'elementor-master' ),
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
			'twitter-icon', [
				'label' => __( 'Twitter icon', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'pinterest_link',
			[
				'label' => esc_html__( 'Pinterest Link', 'elementor-master' ),
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
			'pinterest-icon', [
				'label' => __( 'Pinterest icon', 'elementor-master' ),
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

		<div class="about-us-block -follow-us">
    	    <div class="about-us-title"><?php echo $settings['title']; ?></div>
    	    <p class="about-us-description mb25"><?php echo $settings['description']; ?></p>
    	    <div class="about-us-social-list mt30" data-lazy-load-enabled="1">
				<a class="js-new-tab item -facebook" href="<?php echo $settings['facebook_link']['url']; ?>" style="background-image: url(<?php echo $settings['facebook-icon']['url']; ?>);">Facebook</a>
				<a class="item -youtube" href="<?php echo $settings['youtube_link']['url']; ?>" style="background-image: url(<?php echo $settings['youtube-icon']['url']; ?>);">YouTube</a>
				<a class="js-new-tab item -instagram" href="<?php echo $settings['instagram_link']['url']; ?>" style="background-image: url(<?php echo $settings['instagram-icon']['url']; ?>);">Instagram</a>
				<a class="js-new-tab item -twitter" href="<?php echo $settings['twitter_link']['url']; ?>" style="background-image: url(<?php echo $settings['twitter-icon']['url']; ?>);">Twitter</a>
				<a class="js-new-tab item -pinterest" href="<?php echo $settings['pinterest_link']['url']; ?>" style="background-image: url(<?php echo $settings['pinterest-icon']['url']; ?>);">Pinterest</a>
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