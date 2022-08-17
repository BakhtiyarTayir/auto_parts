<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class About_Us_Thrid extends Widget_Base {

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
		return 'aboutUsThrid';
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
		return esc_html__( 'About Us Thrid block', 'elementor' );
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
		return 'eicon-thumbnails-half';
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
			'right-image', [
				'label' => __( 'Right image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'block-title-1',
			array(
				'label'   => __( 'Block title 1', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'block-description-1',
			array(
				'label'   => __( 'Block description 1', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'icon-1', [
				'label' => __( 'Icon 1', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'block-title-2',
			array(
				'label'   => __( 'Block title 2', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'block-description-2',
			array(
				'label'   => __( 'Block description 2', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'icon-2', [
				'label' => __( 'Icon 2', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'block-title-3',
			array(
				'label'   => __( 'Block title 3', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'block-description-3',
			array(
				'label'   => __( 'Block description 3', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'icon-3', [
				'label' => __( 'Icon 3', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'block-title-4',
			array(
				'label'   => __( 'Block title 4', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'block-description-4',
			array(
				'label'   => __( 'Block description 4', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'icon-4', [
				'label' => __( 'Icon 4', 'elementor-master' ),
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

		<style>
			.about-us-shifter-item-content.-price::before {
				background-image: url(<?php echo $settings['icon-1']['url']; ?>);
			}
						.about-us-shifter-item-content.-video::before {
				background-image: url(<?php echo $settings['icon-2']['url']; ?>);
			}
			.about-us-shifter-item-content.-list::before {
				background-image: url(<?php echo $settings['icon-3']['url']; ?>);
			}
			.about-us-shifter-item-content.-review::before {
				background-image: url(<?php echo $settings['icon-4']['url']; ?>);
			}
		</style>
		
		<div class="about-us-block-holder -bg-grey" data-lazy-load-enabled="1">
                    <div class="about-us-block -half -benefits">
                        <div class="inner-wrap">
                            <div class="about-us-title -indent -align-left"><?php echo $settings['title']; ?></div>
                            <div class="shifter enabled -active shifter-ready" data-type="about-us" data-enabled="1">
                                <ul class="about-us-shifter">
                                    <li class="item">
                                        <div class="about-us-shifter-item-content -price -odd">
                                            <div class="title"><?php echo $settings['block-title-1']; ?></div>
                                            <div class="description"><?php echo $settings['block-description-1']; ?></div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="about-us-shifter-item-content -video -even">
                                            <div class="title"><?php echo $settings['block-title-2']; ?></div>
                                            <div class="description"><?php echo $settings['block-description-2']; ?></div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="about-us-shifter-item-content -list -odd">
                                            <div class="title"><?php echo $settings['block-title-3']; ?></div>
                                            <div class="description"><?php echo $settings['block-description-3']; ?></div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="about-us-shifter-item-content -review -even">
                                            <div class="title"><?php echo $settings['block-title-4']; ?></div>
                                            <div class="description"><?php echo $settings['block-description-4']; ?></div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="js-shifter-nav shifter-navigation -about-us -active"><span class="js-shifter-left shifter-arrow -left -about-us -active"></span>
                                    <div class="js-shifter-pagination shifter-pagination -about-us -active">
                                        <div class="dot -active"></div>
                                        <div class="dot"></div>
                                    </div><span class="js-shifter-right shifter-arrow -right -about-us -active"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about-us-block -half -greg"></div>
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