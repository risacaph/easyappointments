/**
 * Editor script for the Mariners Appointment booking block.
 *
 * Written in plain JavaScript (no build step) using the WordPress globals.
 */
( function ( blocks, element, blockEditor, components, serverSideRender, i18n ) {
	'use strict';

	var el = element.createElement;
	var __ = i18n.__;
	var useBlockProps = blockEditor.useBlockProps;
	var InspectorControls = blockEditor.InspectorControls;
	var PanelBody = components.PanelBody;
	var TextControl = components.TextControl;

	function setter( props, key ) {
		return function ( value ) {
			var update = {};
			update[ key ] = value;
			props.setAttributes( update );
		};
	}

	blocks.registerBlockType( 'mariners-appointment/booking', {
		edit: function ( props ) {
			var attributes = props.attributes;

			return el(
				'div',
				useBlockProps(),
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: __( 'Booking settings', 'mariners-appointment' ), initialOpen: true },
						el( TextControl, {
							label: __( 'Booking URL (optional)', 'mariners-appointment' ),
							help: __( 'Leave empty to use the URL from the plugin settings.', 'mariners-appointment' ),
							value: attributes.url || '',
							onChange: setter( props, 'url' )
						} ),
						el( TextControl, {
							label: __( 'Height (px)', 'mariners-appointment' ),
							type: 'number',
							value: attributes.height || '',
							onChange: function ( value ) {
								props.setAttributes( { height: value ? parseInt( value, 10 ) : undefined } );
							}
						} ),
						el( TextControl, {
							label: __( 'Service ID', 'mariners-appointment' ),
							value: attributes.service || '',
							onChange: setter( props, 'service' )
						} ),
						el( TextControl, {
							label: __( 'Provider ID', 'mariners-appointment' ),
							value: attributes.provider || '',
							onChange: setter( props, 'provider' )
						} )
					)
				),
				el( serverSideRender, {
					block: 'mariners-appointment/booking',
					attributes: attributes
				} )
			);
		},
		save: function () {
			return null; // Dynamic block rendered server-side.
		}
	} );
} )(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.serverSideRender,
	window.wp.i18n
);
