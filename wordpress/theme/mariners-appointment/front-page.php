<?php
/**
 * The front page template — a marketing landing page for appointment scheduling.
 *
 * Layout inspired by common scheduling landing pages: hero, feature cards,
 * use cases, stats, an embedded booking section, an FAQ accordion, and a
 * closing call to action. All copy is translatable with sensible defaults.
 *
 * Tip: assign a static front page (Settings → Reading) and drop the
 * [mariners_appointment] shortcode / block into it — its content renders in the
 * "Book" section below.
 *
 * @package MarinersAppointmentTheme
 */

get_header();
?>

<div class="ma-landing no-sidebar">

	<!-- Hero -->
	<section class="ma-hero">
		<div class="ma-container ma-hero__inner">
			<div class="ma-hero__text">
				<h1 class="ma-hero__title"><?php esc_html_e( 'Schedule anything.', 'mariners-appointment' ); ?></h1>
				<p class="ma-hero__subtitle">
					<?php esc_html_e( 'A powerful, self-hosted appointment scheduler your customers will love. Take bookings around the clock — no commissions, no limits, your data on your servers.', 'mariners-appointment' ); ?>
				</p>
				<p class="ma-hero__actions">
					<a class="ma-button ma-button--light" href="#book"><?php esc_html_e( 'Book an appointment', 'mariners-appointment' ); ?></a>
					<a class="ma-button ma-button--ghost" href="#features"><?php esc_html_e( 'See features', 'mariners-appointment' ); ?></a>
				</p>
			</div>
			<div class="ma-hero__art" aria-hidden="true">
				<svg viewBox="0 0 200 200" width="220" height="220" role="img">
					<defs>
						<linearGradient id="ma-badge" x1="0" y1="0" x2="0" y2="1">
							<stop offset="0" stop-color="#0b3d66"/>
							<stop offset="1" stop-color="#178ca8"/>
						</linearGradient>
					</defs>
					<rect x="10" y="10" width="180" height="180" rx="42" fill="url(#ma-badge)"/>
					<g fill="none" stroke="#ffffff" stroke-width="8" stroke-linecap="round">
						<circle cx="100" cy="48" r="15"/>
						<line x1="100" y1="62" x2="100" y2="150"/>
						<line x1="66" y1="78" x2="134" y2="78"/>
						<path d="M46 118 Q100 172 154 118" stroke-width="9"/>
						<line x1="46" y1="118" x2="40" y2="92"/>
						<line x1="154" y1="118" x2="160" y2="92"/>
					</g>
				</svg>
			</div>
		</div>
	</section>

	<!-- Features -->
	<section id="features" class="ma-section">
		<div class="ma-container">
			<h2 class="ma-section__title"><?php esc_html_e( 'Everything you need to take bookings', 'mariners-appointment' ); ?></h2>
			<p class="ma-section__lead"><?php esc_html_e( 'Built to adapt to your business, from a single provider to a full team.', 'mariners-appointment' ); ?></p>

			<div class="ma-cards">
				<div class="ma-card">
					<div class="ma-card__icon" aria-hidden="true">⚓</div>
					<h3 class="ma-card__title"><?php esc_html_e( 'Simple', 'mariners-appointment' ); ?></h3>
					<p><?php esc_html_e( 'A clean booking flow your customers can complete in seconds — on any device, in their own language.', 'mariners-appointment' ); ?></p>
				</div>
				<div class="ma-card">
					<div class="ma-card__icon" aria-hidden="true">🛟</div>
					<h3 class="ma-card__title"><?php esc_html_e( 'Stable', 'mariners-appointment' ); ?></h3>
					<p><?php esc_html_e( 'Self-hosted and dependable. Your schedule and customer data stay under your control at all times.', 'mariners-appointment' ); ?></p>
				</div>
				<div class="ma-card">
					<div class="ma-card__icon" aria-hidden="true">🧭</div>
					<h3 class="ma-card__title"><?php esc_html_e( 'Flexible', 'mariners-appointment' ); ?></h3>
					<p><?php esc_html_e( 'Services, providers, working plans, Google &amp; CalDAV sync, reminders, webhooks — tailor it to how you work.', 'mariners-appointment' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- Use cases -->
	<section class="ma-section ma-section--soft">
		<div class="ma-container ma-split">
			<div class="ma-split__text">
				<h2 class="ma-section__title"><?php esc_html_e( 'A great fit for any service business', 'mariners-appointment' ); ?></h2>
				<p><?php esc_html_e( 'If you book time with customers, Mariners Appointment can run your calendar.', 'mariners-appointment' ); ?></p>
				<ul class="ma-usecases">
					<li><?php esc_html_e( 'Clinics &amp; healthcare', 'mariners-appointment' ); ?></li>
					<li><?php esc_html_e( 'Salons &amp; spas', 'mariners-appointment' ); ?></li>
					<li><?php esc_html_e( 'Consulting &amp; coaching', 'mariners-appointment' ); ?></li>
					<li><?php esc_html_e( 'Repair &amp; home services', 'mariners-appointment' ); ?></li>
					<li><?php esc_html_e( 'Tutoring &amp; lessons', 'mariners-appointment' ); ?></li>
					<li><?php esc_html_e( 'Charters &amp; tours', 'mariners-appointment' ); ?></li>
				</ul>
				<p><a class="ma-button" href="#book"><?php esc_html_e( 'Start booking', 'mariners-appointment' ); ?></a></p>
			</div>
			<div class="ma-split__art" aria-hidden="true">
				<div class="ma-mockcal">
					<div class="ma-mockcal__head"><?php esc_html_e( 'This week', 'mariners-appointment' ); ?></div>
					<div class="ma-mockcal__row"><span>09:00</span><b><?php esc_html_e( 'Consultation', 'mariners-appointment' ); ?></b></div>
					<div class="ma-mockcal__row is-busy"><span>11:30</span><b><?php esc_html_e( 'Check-up', 'mariners-appointment' ); ?></b></div>
					<div class="ma-mockcal__row"><span>14:00</span><b><?php esc_html_e( 'Follow-up', 'mariners-appointment' ); ?></b></div>
					<div class="ma-mockcal__row is-busy"><span>16:15</span><b><?php esc_html_e( 'New client', 'mariners-appointment' ); ?></b></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Stats -->
	<section class="ma-section ma-stats">
		<div class="ma-container ma-stats__grid">
			<div class="ma-stat"><span class="ma-stat__num">24/7</span><span class="ma-stat__label"><?php esc_html_e( 'Online booking', 'mariners-appointment' ); ?></span></div>
			<div class="ma-stat"><span class="ma-stat__num">0%</span><span class="ma-stat__label"><?php esc_html_e( 'Booking commission', 'mariners-appointment' ); ?></span></div>
			<div class="ma-stat"><span class="ma-stat__num">30+</span><span class="ma-stat__label"><?php esc_html_e( 'Languages', 'mariners-appointment' ); ?></span></div>
			<div class="ma-stat"><span class="ma-stat__num">100%</span><span class="ma-stat__label"><?php esc_html_e( 'Self-hosted &amp; open source', 'mariners-appointment' ); ?></span></div>
		</div>
	</section>

	<!-- Booking (renders the static front page content, e.g. the booking block) -->
	<section id="book" class="ma-section">
		<div class="ma-container">
			<h2 class="ma-section__title"><?php esc_html_e( 'Book your appointment', 'mariners-appointment' ); ?></h2>
			<div class="ma-booking">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						the_content();
					endwhile;
				endif;

				if ( ! get_the_content() ) :
					?>
					<p class="ma-section__lead">
						<?php esc_html_e( 'Add the [mariners_appointment] shortcode or the "Mariners Appointment Booking" block to this front page to show your live booking calendar here.', 'mariners-appointment' ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="ma-section ma-section--soft">
		<div class="ma-container ma-faq">
			<h2 class="ma-section__title"><?php esc_html_e( 'Frequently asked questions', 'mariners-appointment' ); ?></h2>

			<details class="ma-faq__item">
				<summary><?php esc_html_e( 'Is it really free?', 'mariners-appointment' ); ?></summary>
				<p><?php esc_html_e( 'Yes. Mariners Appointment is open source under the GPL-3.0 license and free for personal and commercial use.', 'mariners-appointment' ); ?></p>
			</details>
			<details class="ma-faq__item">
				<summary><?php esc_html_e( 'Do I need a separate installation?', 'mariners-appointment' ); ?></summary>
				<p><?php esc_html_e( 'The scheduler is self-hosted. Install it on your server, then connect it to WordPress with the companion plugin to embed the booking page.', 'mariners-appointment' ); ?></p>
			</details>
			<details class="ma-faq__item">
				<summary><?php esc_html_e( 'Can customers get reminders?', 'mariners-appointment' ); ?></summary>
				<p><?php esc_html_e( 'Yes. Email confirmations are sent on booking and cancellation, and appointment reminders can be scheduled ahead of time.', 'mariners-appointment' ); ?></p>
			</details>
			<details class="ma-faq__item">
				<summary><?php esc_html_e( 'Does it sync with my calendar?', 'mariners-appointment' ); ?></summary>
				<p><?php esc_html_e( 'It integrates with Google Calendar and CalDAV, so your availability stays accurate across the tools you already use.', 'mariners-appointment' ); ?></p>
			</details>
		</div>
	</section>

	<!-- Closing CTA -->
	<section class="ma-cta">
		<div class="ma-container">
			<h2 class="ma-cta__title"><?php esc_html_e( 'Ready to fill your calendar?', 'mariners-appointment' ); ?></h2>
			<p class="ma-cta__text"><?php esc_html_e( 'Give your customers a fast, self-service way to book time with you.', 'mariners-appointment' ); ?></p>
			<a class="ma-button ma-button--light" href="#book"><?php esc_html_e( 'Book an appointment', 'mariners-appointment' ); ?></a>
		</div>
	</section>

</div>

<?php
get_footer();
