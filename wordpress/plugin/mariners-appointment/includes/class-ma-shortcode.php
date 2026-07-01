<?php
/**
 * Shortcode and block that embed the Mariners Appointment booking page.
 *
 * @package MarinersAppointment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the [mariners_appointment] shortcode and the matching block.
 */
class MA_Shortcode {

	/**
	 * Register the shortcode and (if available) the editor block.
	 */
	public function register() {
		add_shortcode( 'mariners_appointment', array( $this, 'render' ) );

		if ( function_exists( 'register_block_type' ) ) {
			$this->register_block();
		}
	}

	/**
	 * Register the server-rendered Gutenberg block.
	 */
	private function register_block() {
		$block_dir = MARINERS_APPOINTMENT_PATH . 'blocks/booking';

		if ( ! file_exists( $block_dir . '/block.json' ) ) {
			return;
		}

		// Register the editor script with explicit dependencies so no build step is required.
		wp_register_script(
			'mariners-appointment-block',
			MARINERS_APPOINTMENT_URL . 'blocks/booking/index.js',
			array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render', 'wp-i18n' ),
			MARINERS_APPOINTMENT_VERSION,
			true
		);

		register_block_type(
			$block_dir,
			array( 'render_callback' => array( $this, 'render' ) )
		);
	}

	/**
	 * Render the booking iframe.
	 *
	 * @param array $atts Shortcode / block attributes.
	 * @return string
	 */
	public function render( $atts ) {
		$atts = shortcode_atts(
			array(
				'url'      => '',
				'height'   => '',
				'service'  => '',
				'provider' => '',
			),
			is_array( $atts ) ? $atts : array(),
			'mariners_appointment'
		);

		$settings = get_option( MARINERS_APPOINTMENT_OPTION, array() );

		$base_url = '' !== $atts['url'] ? $atts['url'] : ( isset( $settings['base_url'] ) ? $settings['base_url'] : '' );
		$base_url = untrailingslashit( esc_url_raw( $base_url ) );

		if ( empty( $base_url ) ) {
			if ( current_user_can( 'manage_options' ) ) {
				return '<p class="mariners-appointment-notice">' . esc_html__(
					'Mariners Appointment: please set your Booking URL in Settings → Mariners Appointment.',
					'mariners-appointment'
				) . '</p>';
			}

			return '';
		}

		$default_height = isset( $settings['height'] ) ? absint( $settings['height'] ) : 900;
		$height         = '' !== $atts['height'] ? absint( $atts['height'] ) : $default_height;
		$height         = $height > 0 ? $height : 900;

		$query = array();
		if ( '' !== $atts['service'] ) {
			$query['service'] = absint( $atts['service'] );
		}
		if ( '' !== $atts['provider'] ) {
			$query['provider'] = absint( $atts['provider'] );
		}

		$src = $base_url;
		if ( ! empty( $query ) ) {
			$src = add_query_arg( $query, $base_url );
		}

		wp_enqueue_style( 'mariners-appointment' );
		wp_enqueue_script( 'mariners-appointment' );

		return sprintf(
			'<div class="mariners-appointment-embed"><iframe class="mariners-appointment-iframe" src="%1$s" style="height:%2$dpx;" title="%3$s" loading="lazy" frameborder="0"></iframe></div>',
			esc_url( $src ),
			(int) $height,
			esc_attr__( 'Mariners Appointment booking', 'mariners-appointment' )
		);
	}
}
