<?php
/**
 * Plugin Name:       Mariners Appointment
 * Plugin URI:        https://github.com/mariners-appointment/mariners-appointment
 * Description:       Embed your self-hosted Mariners Appointment booking page anywhere in WordPress with a shortcode or block, and manage the connection from a simple settings screen.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Mariners Appointment
 * Author URI:        https://github.com/mariners-appointment/mariners-appointment
 * License:           GPL-3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       mariners-appointment
 * Domain Path:       /languages
 *
 * @package MarinersAppointment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

define( 'MARINERS_APPOINTMENT_VERSION', '1.0.0' );
define( 'MARINERS_APPOINTMENT_FILE', __FILE__ );
define( 'MARINERS_APPOINTMENT_PATH', plugin_dir_path( __FILE__ ) );
define( 'MARINERS_APPOINTMENT_URL', plugin_dir_url( __FILE__ ) );
define( 'MARINERS_APPOINTMENT_OPTION', 'mariners_appointment_settings' );

require_once MARINERS_APPOINTMENT_PATH . 'includes/class-ma-settings.php';
require_once MARINERS_APPOINTMENT_PATH . 'includes/class-ma-shortcode.php';

/**
 * Main plugin controller.
 */
final class Mariners_Appointment_Plugin {

	/**
	 * Singleton instance.
	 *
	 * @var Mariners_Appointment_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Settings handler.
	 *
	 * @var MA_Settings
	 */
	public $settings;

	/**
	 * Shortcode handler.
	 *
	 * @var MA_Shortcode
	 */
	public $shortcode;

	/**
	 * Retrieve the singleton instance.
	 *
	 * @return Mariners_Appointment_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor: wire up the plugin.
	 */
	private function __construct() {
		$this->settings  = new MA_Settings();
		$this->shortcode = new MA_Shortcode();

		add_action( 'init', array( $this, 'load_textdomain' ) );
		add_action( 'init', array( $this->shortcode, 'register' ) );
		add_action( 'admin_menu', array( $this->settings, 'register_menu' ) );
		add_action( 'admin_init', array( $this->settings, 'register_settings' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_public_assets' ) );
		add_filter(
			'plugin_action_links_' . plugin_basename( MARINERS_APPOINTMENT_FILE ),
			array( $this, 'action_links' )
		);
	}

	/**
	 * Load the plugin translations.
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'mariners-appointment',
			false,
			dirname( plugin_basename( MARINERS_APPOINTMENT_FILE ) ) . '/languages'
		);
	}

	/**
	 * Register the public facing assets (loaded on demand by the shortcode).
	 */
	public function register_public_assets() {
		wp_register_style(
			'mariners-appointment',
			MARINERS_APPOINTMENT_URL . 'assets/css/mariners-appointment.css',
			array(),
			MARINERS_APPOINTMENT_VERSION
		);

		wp_register_script(
			'mariners-appointment',
			MARINERS_APPOINTMENT_URL . 'assets/js/mariners-appointment.js',
			array(),
			MARINERS_APPOINTMENT_VERSION,
			true
		);
	}

	/**
	 * Add a "Settings" shortcut on the plugins screen.
	 *
	 * @param array $links Existing action links.
	 * @return array
	 */
	public function action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php?page=mariners-appointment' ) ),
			esc_html__( 'Settings', 'mariners-appointment' )
		);

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Return the configured Mariners Appointment base URL.
	 *
	 * @return string
	 */
	public static function get_base_url() {
		$settings = get_option( MARINERS_APPOINTMENT_OPTION, array() );

		return isset( $settings['base_url'] ) ? untrailingslashit( $settings['base_url'] ) : '';
	}
}

/**
 * Boot the plugin.
 *
 * @return Mariners_Appointment_Plugin
 */
function mariners_appointment() {
	return Mariners_Appointment_Plugin::instance();
}

mariners_appointment();

/**
 * Seed default options on activation.
 */
register_activation_hook(
	__FILE__,
	function () {
		if ( false === get_option( MARINERS_APPOINTMENT_OPTION ) ) {
			add_option(
				MARINERS_APPOINTMENT_OPTION,
				array(
					'base_url' => '',
					'height'   => 900,
				)
			);
		}
	}
);
