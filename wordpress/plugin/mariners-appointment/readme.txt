=== Mariners Appointment ===
Contributors: marinersappointment
Tags: appointments, booking, calendar, scheduler, shortcode
Requires at least: 5.8
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Embed your self-hosted Mariners Appointment booking page anywhere in WordPress with a shortcode or block.

== Description ==

Mariners Appointment is a powerful, self-hosted appointment scheduling platform. This companion plugin lets you connect a WordPress site to your Mariners Appointment installation and embed the booking page into any post, page, or block-enabled area.

Features:

* Simple settings screen to store your booking URL and default embed height.
* `[mariners_appointment]` shortcode with optional attributes.
* A "Mariners Appointment Booking" block for the block editor (server-rendered, live preview).
* Optional pre-selection of a service or provider.
* Responsive iframe embed with optional auto-resize.

This plugin does not include the scheduler itself — it connects to a separate Mariners Appointment installation.

== Installation ==

1. Upload the `mariners-appointment` folder to `/wp-content/plugins/`, or install the zip via Plugins → Add New → Upload.
2. Activate the plugin through the Plugins screen.
3. Go to Settings → Mariners Appointment and enter your booking URL.
4. Add the `[mariners_appointment]` shortcode to a page, or insert the "Mariners Appointment Booking" block.

== Frequently Asked Questions ==

= Where do I get the booking URL? =

It is the address of your Mariners Appointment installation, for example `https://booking.example.com`.

= Can I pre-select a service or provider? =

Yes: `[mariners_appointment service="2" provider="5"]`.

= Can I override the URL per embed? =

Yes: `[mariners_appointment url="https://other.example.com"]`.

== Changelog ==

= 1.0.0 =
* Initial release: settings screen, shortcode, and block.
