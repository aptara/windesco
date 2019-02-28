<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

// 
function add_footer_javascripts(){ ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		if( jQuery('.change_bg_on_scroll').length ) {
			setUpScrollImages();
		}
		jQuery('a').each(function(){ 
			var l = jQuery(this); 
			hrefArr = l.attr('href').split('#'); 
			if ( hrefArr.length > 1 ) { 
				if ( hrefArr[0] == window.location.pathname || hrefArr[0]+'/' == window.location.pathname ) { 
					l.attr( 'href', '#'+hrefArr[1] ); 
				} 
			} 
		} );
	});
	jQuery(window).bind('scroll', pagescrolled);
	pagescrolled();
	function setUpScrollImages() {
		jQuery('body').css( {
			'background-image': jQuery(jQuery('.change_bg_on_scroll')[0]).css('background-image')
		} );
		jQuery('.change_bg_on_scroll').css({ 'background-color':'transparent', 'background-image': 'none !important' });
	}
	function pagescrolled() {
		
	}
</script>
<?php } 
add_action('wp_footer', 'add_footer_javascripts'); ?>