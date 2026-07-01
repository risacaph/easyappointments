<?php
/**
 * Admin settings screen for the Mariners Appointment plugin.
 *
 * @package MarinersAppointment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles the settings page and the Settings API registration.
 */
class MA_Settings {

	/**
	 * Settings group / page slug.
	 */
	const PAGE = 'mariners-appointment';

	/**
	 * Option group used by the Settings API.
	 */
	const GROUP = 'mariners_appointment_group';

	/**
	 * Register the options page under the Settings menu.
	 */
	public function register_menu() {
		add_options_page(
			__( 'Mariners Appointment', 'mariners-appointment' ),
			__( 'Mariners Appointment', 'mariners-appointment' ),
			'manage_options',
			self::PAGE,
			array( $this, 'render_page' )
		);
	}

	/**
	 * Register the settings, section and fields.
	 */
	public function register_settings() {
		register_setting(
			self::GROUP,
			MARINERS_APPOINTMENT_OPTION,
			array( $this, 'sanitize' )
		);

		add_settings_section(
			'mariners_appointment_main',
			__( 'Connection', 'mariners-appointment' ),
			function () {
				echo '<p>' . esc_html__(
					'Enter the URL of your self-hosted Mariners Appointment installation. This is the address customers use to reach the booking page.',
					'mariners-appointment'
				) . '</p>';
			},
			self::PAGE
		);

		add_settings_field(
			'base_url',
			__( 'Booking URL', 'mariners-appointment' ),
			array( $this, 'field_base_url' ),
			self::PAGE,
			'mariners_appointment_main'
		);

		add_settings_field(
			'height',
			__( 'Default height (px)', 'mariners-appointment' ),
			array( $this, 'field_height' ),
			self::PAGE,
			'mariners_appointment_main'
		);
	}

	/**
	 * Sanitize the submitted settings.
	 *
	 * @param array $input Raw settings input.
	 * @return array
	 */
	public function sanitize( $input ) {
		$output = array();

		$output['base_url'] = isset( $input['base_url'] ) ? esc_url_raw( trim( $input['base_url'] ) ) : '';

		$height           = isset( $input['height'] ) ? absint( $input['height'] ) : 900;
		$output['height'] = $height > 0 ? $height : 900;

		return $output;
	}

	/**
	 * Render the Booking URL field.
	 */
	public function field_base_url() {
		$settings = get_option( MARINERS_APPOINTMENT_OPTION, array() );
		$value    = isset( $settings['base_url'] ) ? $settings['base_url'] : '';

		printf(
			'<input type="url" class="regular-text code" name="%s[base_url]" value="%s" placeholder="https://booking.example.com" />',
			esc_attr( MARINERS_APPOINTMENT_OPTION ),
			esc_attr( $value )
		);
	}

	/**
	 * Render the default height field.
	 */
	public function field_height() {
		$settings = get_option( MARINERS_APPOINTMENT_OPTION, array() );
		$value    = isset( $settings['height'] ) ? $settings['height'] : 900;

		printf(
			'<input type="number" min="200" step="10" name="%s[height]" value="%s" /> <span class="description">%s</span>',
			esc_attr( MARINERS_APPOINTMENT_OPTION ),
			esc_attr( $value ),
			esc_html__( 'Used when the shortcode does not specify a height.', 'mariners-appointment' )
		);
	}

	/**
	 * Render the settings page wrapper.
	 */
	public function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html__( 'Mariners Appointment', 'mariners-appointment' ); ?></h1>

			<form action="options.php" method="post">
				<?php
				settings_fields( self::GROUP );
				do_settings_sections( self::PAGE );
				submit_button();
				?>
			</form>

			<hr />

			<h2><?php echo esc_html__( 'How to embed', 'mariners-appointment' ); ?></h2>
			<p><?php echo esc_html__( 'Add the booking page to any post or page with the shortcode:', 'mariners-appointment' ); ?></p>
			<p><code>[mariners_appointment]</code></p>
			<p><?php echo esc_html__( 'Optional attributes:', 'mariners-appointment' ); ?></p>
			<ul style="list-style: disc; margin-left: 20px;">
				<li><code>url</code> — <?php echo esc_html__( 'override the configured booking URL.', 'mariners-appointment' ); ?></li>
				<li><code>height</code> — <?php echo esc_html__( 'iframe height in pixels.', 'mariners-appointment' ); ?></li>
				<li><code>service</code> — <?php echo esc_html__( 'pre-select a service by its ID.', 'mariners-appointment' ); ?></li>
				<li><code>provider</code> — <?php echo esc_html__( 'pre-select a provider by its ID.', 'mariners-appointment' ); ?></li>
			</ul>
			<p><code>[mariners_appointment height="1000" service="2"]</code></p>
		</div>
		<?php
	}
}
