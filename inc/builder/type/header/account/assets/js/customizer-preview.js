/**
 * This file adds some LIVE to the Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Astra
 * @since x.x.x
 */

( function( $ ) {

	var tablet_break_point    = astraBuilderPreview.tablet_break_point || 768,
		mobile_break_point    = astraBuilderPreview.mobile_break_point || 544;

	var selector = '.ast-header-account-wrap';

	// Icon Color.
	astra_css(
		'astra-settings[header-account-icon-color]',
		'color',
		selector + ' .ast-header-account-icon:before'
	);

	// Icon Size.
	wp.customize( 'astra-settings[header-account-icon-size]', function( value ) {
		value.bind( function( size ) {
			if(
				size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
				size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
				size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
			) {
				var dynamicStyle = '';
				dynamicStyle += selector + ' .ast-header-account-icon:before {';
				dynamicStyle += 'font-size: ' + size.desktop + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
				dynamicStyle += selector + ' .ast-header-account-icon:before {';
				dynamicStyle += 'font-size: ' + size.tablet + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
				dynamicStyle += selector + ' .ast-header-account-icon:before {';
				dynamicStyle += 'font-size: ' + size.mobile + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '} ';
				astra_add_dynamic_css( 'header-account-icon-size', dynamicStyle );
			}
		} );
	} );

	// Image Width.
	wp.customize( 'astra-settings[header-account-image-width]', function( value ) {
		value.bind( function( size ) {
			if(
				size.desktop != '' || size.desktop != '' || size.desktop != '' || size.desktop != '' ||
				size.tablet != '' || size.tablet != '' || size.tablet != '' || size.tablet != '' ||
				size.mobile != '' || size.mobile != '' || size.mobile != '' || size.mobile != ''
			) {
				var dynamicStyle = '';
				dynamicStyle += selector + ' .ast-header-account-type-avatar .avatar {';
				dynamicStyle += 'width: ' + size.desktop + 'px' + ';';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
				dynamicStyle += selector + ' .ast-header-account-type-avatar .avatar {';
				dynamicStyle += 'width: ' + size.tablet + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '} ';

				dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
				dynamicStyle += selector + ' .ast-header-account-type-avatar .avatar {';
				dynamicStyle += 'width: ' + size.mobile + 'px' + ';';
				dynamicStyle += '} ';
				dynamicStyle += '} ';
				astra_add_dynamic_css( 'header-account-image-width', dynamicStyle );
			}
		} );
	} );

	// Margin.
    wp.customize( 'astra-settings[header-account-margin]', function( value ) {
        value.bind( function( margin ) {
            if(
                margin.desktop.bottom != '' || margin.desktop.top != '' || margin.desktop.left != '' || margin.desktop.right != '' ||
                margin.tablet.bottom != '' || margin.tablet.top != '' || margin.tablet.left != '' || margin.tablet.right != '' ||
                margin.mobile.bottom != '' || margin.mobile.top != '' || margin.mobile.left != '' || margin.mobile.right != ''
            ) {
				var selector = '.ast-header-account-wrap';
                var dynamicStyle = '';
                dynamicStyle += selector + ' {';
                dynamicStyle += 'margin-left: ' + margin['desktop']['left'] + margin['desktop-unit'] + ';';
                dynamicStyle += 'margin-right: ' + margin['desktop']['right'] + margin['desktop-unit'] + ';';
                dynamicStyle += 'margin-top: ' + margin['desktop']['top'] + margin['desktop-unit'] + ';';
                dynamicStyle += 'margin-bottom: ' + margin['desktop']['bottom'] + margin['desktop-unit'] + ';';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + tablet_break_point + 'px) {';
                dynamicStyle += selector + ' {';
                dynamicStyle += 'margin-left: ' + margin['tablet']['left'] + margin['tablet-unit'] + ';';
                dynamicStyle += 'margin-right: ' + margin['tablet']['right'] + margin['tablet-unit'] + ';';
                dynamicStyle += 'margin-top: ' + margin['tablet']['top'] + margin['desktop-unit'] + ';';
                dynamicStyle += 'margin-bottom: ' + margin['tablet']['bottom'] + margin['desktop-unit'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';

                dynamicStyle +=  '@media (max-width: ' + mobile_break_point + 'px) {';
                dynamicStyle += selector + ' {';
                dynamicStyle += 'margin-left: ' + margin['mobile']['left'] + margin['mobile-unit'] + ';';
                dynamicStyle += 'margin-right: ' + margin['mobile']['right'] + margin['mobile-unit'] + ';';
                dynamicStyle += 'margin-top: ' + margin['mobile']['top'] + margin['desktop-unit'] + ';';
                dynamicStyle += 'margin-bottom: ' + margin['mobile']['bottom'] + margin['desktop-unit'] + ';';
                dynamicStyle += '} ';
                dynamicStyle += '} ';
                astra_add_dynamic_css( 'header-account-margin', dynamicStyle );
            }
        } );
    } );

} )( jQuery );