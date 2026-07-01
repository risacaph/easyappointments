# Mariners Appointment for WordPress

This directory contains two independent WordPress extensions that complement the
self-hosted Mariners Appointment scheduler:

```
wordpress/
├── plugin/mariners-appointment/   # Plugin: embed the booking page in WordPress
└── theme/mariners-appointment/    # Theme: maritime navy/teal site theme
```

They are self-contained — install either one, both, or neither. Neither bundles
the scheduler itself; the plugin connects to a separate Mariners Appointment
installation over its public booking URL.

## Plugin

Embeds your Mariners Appointment booking page into any WordPress content.

**Features**

- Settings screen (**Settings → Mariners Appointment**) to store the booking URL and default height.
- `[mariners_appointment]` shortcode with optional `url`, `height`, `service`, and `provider` attributes.
- A server-rendered **"Mariners Appointment Booking"** block with a live preview (no build step required).
- Responsive iframe embed with optional `postMessage`-based auto-resize.

**Install**

1. Copy `plugin/mariners-appointment/` into `wp-content/plugins/`, or zip that folder and upload it via **Plugins → Add New → Upload**.
2. Activate it and set your Booking URL under **Settings → Mariners Appointment**.
3. Add `[mariners_appointment]` to a page, or insert the booking block.

**Examples**

```
[mariners_appointment]
[mariners_appointment height="1000" service="2" provider="5"]
[mariners_appointment url="https://booking.example.com"]
```

## Theme

A clean, responsive classic theme in the Mariners Appointment maritime palette,
ideal for service businesses. Includes header/footer/sidebar/single/page
templates, a **Full Width** page template (great for the booking page), custom
logo and menu support, and widget areas.

**Install**

1. Copy `theme/mariners-appointment/` into `wp-content/themes/`, or zip and upload via **Appearance → Themes → Add New → Upload**.
2. Activate it under **Appearance → Themes**.

## Packaging as installable zips

WordPress expects the extension folder at the root of the zip:

```bash
cd wordpress/plugin && zip -r mariners-appointment-plugin.zip mariners-appointment
cd wordpress/theme  && zip -r mariners-appointment-theme.zip  mariners-appointment
```

## License

GPL-3.0, matching the Mariners Appointment project.
