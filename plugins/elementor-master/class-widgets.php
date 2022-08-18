<?php
/**
 * Widgets class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorMaster;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once 'widgets/home-categories.php';
		require_once 'widgets/featured-brands.php';
		require_once 'widgets/home-big-banners.php';
		require_once 'widgets/about-us-header.php';
		require_once 'widgets/about-us-second.php';
		require_once 'widgets/about-us-thrid.php';
		require_once 'widgets/about-us-fourth.php';
		require_once 'widgets/about-us-fifth.php';
		require_once 'widgets/about-us-sixth.php';
		require_once 'widgets/about-us-seventh.php';
		require_once 'widgets/about-us-social.php';
		require_once 'widgets/contact-header.php';
		require_once 'widgets/contacts.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Home_Categories() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Featured_Brands() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Home_Big_Banners() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Second() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Thrid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Fourth() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Fifth() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Sixth() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Seventh() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\About_Us_Social() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Contact_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Contacts() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();
