//color picker 
jQuery(document).ready(function($){
    $('.bar-background').wpColorPicker();
});
//$( 'html' ).attr( 'style', 'margin-top: ' + mysticky_welcomebar_height + 'px !important' );
$( 'html' ).attr( 'style', 'margin-top: ' + 69 + 'px !important' );
jQuery( '.mysticky-welcomebar-fixed' ).addClass( 'mysticky-welcomebar-animation' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'top', (adminBarHeight + 0) + 'px' );
								jQuery( '.mysticky-welcomebar-fixed' ).css( 'opacity', '1' );
								$( 'html' ).css( 'margin-bottom', '' );
								jQuery( '#mysticky_divi_style' ).remove();
								jQuery( '.et_fixed_nav #top-header' ).css( 'top', welcombar_height + 'px' );
								jQuery( 'head' ).append( '<style id="mysticky_divi_style" type="text/css">.et_fixed_nav #main-header {top: ' + welcombar_height + 'px !important}.et_fixed_nav #top-header + #main-header{top: ' + divi_total_height + 'px !important}</style>' );
								$( 'html' ).attr( 'style', 'margin-top: ' + mysticky_welcomebar_height + 'px !important' );
								$( '#mysticky-nav' ).css( 'top', mysticky_welcomebar_height + 'px' );