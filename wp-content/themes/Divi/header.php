<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->
     
	
	<!-- code added by anagha -->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
		
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://107.180.78.15:83/wp-content/themes/Divi/js/lightslider.js"></script>
	
	<link type="text/css" rel="stylesheet" href="wp-content/themes/Divi/css/lightslider.css" />      
	<script type="text/javascript">
	
	document.documentElement.className = 'js';
	
	/* script to fetch vimeo video */
	var apiEndpoint = 'http://vimeo.com/api/v2/';
	var oEmbedEndpoint = 'http://vimeo.com/api/oembed.json'
	var oEmbedCallback = 'switchVideo';
	var videosCallback = 'setupGallery';
	var vimeoUsername = 'user86923639'; 

	$(document).ready(function() {

	$.getScript(apiEndpoint + 'album/' +  '5271113' + '/videos.json?count=100&callback=' + videosCallback);
	$("#user_login").attr("placeholder", "User Name*");
	$("#log").attr("placeholder", "Username");
	$("#pwd").attr("placeholder", "Password");
	$("#user").attr("placeholder", "Username");
	$("#email").attr("placeholder", "Email");
	$("#user_email").attr("placeholder", "Email");
	$('#footer-info').html('&#169; 2018 WindESCo, Inc. All Rights Reserved.');	
	});		
	
	function getVideo(url) {
	$.getScript(oEmbedEndpoint + '?url=' + url + '&width=504&height=280&callback=' + oEmbedCallback);
	}
	function getVideo(description) {
	$.getScript(oEmbedEndpoint + '?description=' + description + oEmbedCallback);
	}
	function getUrlVars()
	{	
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}

	function setupGallery(videos) { 
	$('#stats').prepend('<img id="portrait" src="' + videos[0].user_portrait_medium + '" />');
	$('#stats h2').text(videos[0].user_name + "'s Videos");
	getVideo(videos[0].url);
	var GetQstr=getUrlVars()
	
	for (var i = 0; i < videos.length; i++) {
	var html = '<li class="lslide"><a rel="vimeo" href="http://107.180.78.15:83/?page_id=950&link=' + videos[i].url + '&id='+videos[i].id+'" class="fancybox-media"><div class="image-outer"><div class="image-outer-inner"><img src="' + videos[i].thumbnail_medium + '" class="thumb" title="This is the discription"/><img src="../img/Play_icon.png" class="video-icon"/></div><span>' + videos[i].title + '</span></div>';
	html += '</a></li>';
	var desc ="";
	var vtitle ="";
	if(GetQstr.id == videos[i].id){
	desc = '<p style="display:block;">' + videos[i].description + '</P>';
	vtitle = '<p style="display:block;" id="Desc_'+videos[i].id+'">' + videos[i].title + '</P>';
	}
	else{
	desc = '<p style="display:none;">' + videos[i].description + '</P>';
	vtitle = '<p style="display:none;" id="Desc_'+videos[i].id+'">' + videos[i].title + '</P>';
	}
	$('#lightSlider').append(html);	
	$('#videodesc1').append(desc);
	$('#videotitle1').append(vtitle);
	}
	}

	/* script to vimeo video for second album */
	var apiEndpoint = 'http://vimeo.com/api/v2/';
	var oEmbedEndpoint = 'http://vimeo.com/api/oembed.json'
	var oEmbedCallback1 = 'switchVideo';
	var videosCallback1 = 'setupGallery1';
	var vimeoUsername = 'user86923639';

	$(document).ready(function() {
	$.getScript(apiEndpoint + 'album/' +  '5271111' + '/videos.json?count=100&callback=' + videosCallback1);	
	});
	function getVideo(url) {
	$.getScript(oEmbedEndpoint + '?url=' + url + '&width=504&height=280&callback=' + oEmbedCallback1);
	}
	function getVideo(description) {
	$.getScript(oEmbedEndpoint + '?description=' + description + oEmbedCallback1);
	}
	function setupGallery1(videos) { 
	$('#stats').prepend('<img id="portrait" src="' + videos[0].user_portrait_medium + '" />');
	$('#stats h2').text(videos[0].user_name + "'s Videos");
	getVideo(videos[0].url);
	var GetQstr=getUrlVars()

	for (var i = 0; i < videos.length; i++) {
	var html = '<li id="videoli"><a onclick="OnClickLib(videos[i].Id)" rel="vimeo" href="http://107.180.78.15:83/?page_id=946&link=' + videos[i].url + '&id='+videos[i].id+'" class="fancybox-media"><div class="image-outer"><div class="image-outer-inner"><img src="' + videos[i].thumbnail_medium + '" class="thumb" title="This is the discription"/><img src="../img/Play_icon.png" class="video-icon"/></div><span>' + videos[i].title + '</span></div>';
	html += '</a></li>';
	var html1 ="";
	if(GetQstr.id == videos[i].id){
	html1 = '<p style="display:block;" id="Desc_'+videos[i].id+'">' + videos[i].description + '</P>';
	html2 = '<p style="display:block;" id="Desc_'+videos[i].id+'">' + videos[i].title + '</P>';
	}
	else{
	html1 = '<p style="display:none;" id="Desc_'+videos[i].id+'">' + videos[i].description + '</P>';
	html2 = '<p style="display:none;" id="Desc_'+videos[i].id+'">' + videos[i].title + '</P>';
	}


	$('#lightSlider1').append(html);
	$('#videodesc').append(html1);
	$('#videotitle').append(html2);
	}
	}
	/* vimeo video fetch end */
	
	$(document).ready(function($) {    
	$("#badge a").addClass("fancybox-media");        
	});
	function OnClickLib(Id){
		$("#Desc_"+Id).show()	
	}	
	setTimeout(function() {
		$( ".div_text" ).last().addClass( "checkbox_block" );
	}, 500);

	
	</script>

	<style id="badge-styles">
	.vimeoBadge img { border: 0; height: 125px;
		width: 242px;
		overflow: visible;
		background-image: url(images/thumb-bg.png);
		background-repeat: no-repeat;
		background-position: left top;
		padding-top: 20px;
			padding-bottom: 20px;
		padding-right: 30px;
		padding-left: 30px;
		margin-right:10px;
		border-radius:5px;
	}
	.vimeoBadge a, .vimeoBadge a:link, .vimeoBadge a:visited, .vimeoBadge a:active { color: #fff; text-decoration: none; cursor: pointer; display:block; width:301px; text-align:center;  }
	.vimeoBadge a:hover { color:#ffc600; }
	.vimeoBadge #vimeo_badge_logo { margin-top:10px; width: 57px; height: 16px; }
	.vimeoBadge .credit { font: normal 11px verdana,sans-serif; }
	.vimeoBadge .clip { padding:0; float:left; margin:0 10px 10px 0; line-height:0; }
	.vimeoBadge.vertical .clip { float: none; }
	.vimeoBadge .caption { font: normal 11px verdana,sans-serif; overflow:show; width: auto; height: 30px; }
	.vimeoBadge .clear { display: block; clear: both; visibility: hidden; }
	.vimeoBadge .s160 { width: 220px; height:112px; margin-right:100px;margin-bottom:70px;} .vimeoBadge .s80 { width: 112px; } .vimeoBadge .s100 { width: 100px; } .vimeoBadge .s200 { width: 200px; }
	</style>
	<?php if (is_user_logged_in()){ ?> 
		<style> .imgiconl{ display:none; } </style>
	<?php } else { ?>
	    <style> .imgicon{ display:none; } </style>		
	<?php } ?>
	
	<!-- code added for vimeo video end -->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	$product_tour_enabled = et_builder_is_product_tour_enabled();
	$page_container_style = $product_tour_enabled ? ' style="padding-top: 0px;"' : ''; ?>
	<div id="page-container"<?php echo $page_container_style; ?>>
<?php
	if ( $product_tour_enabled || is_page_template( 'page-template-blank.php' ) ) {
		return;
	}

	$et_secondary_nav_items = et_divi_get_top_nav_items();

	$et_phone_number = $et_secondary_nav_items->phone_number;

	$et_email = $et_secondary_nav_items->email;

	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;

	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;

	$et_slide_header = 'slide' === et_get_option( 'header_style', 'left' ) || 'fullscreen' === et_get_option( 'header_style', 'left' ) ? true : false;
?>

	<?php if ( $et_top_info_defined && ! $et_slide_header || is_customize_preview() ) : ?>
		<div id="top-header"<?php echo $et_top_info_defined ? '' : 'style="display: none;"'; ?>>
			<div class="container clearfix">

			<?php if ( $et_contact_info_defined ) : ?>

				<div id="et-info">
				<?php if ( '' !== ( $et_phone_number = et_get_option( 'phone_number' ) ) ) : ?>
					<span id="et-info-phone"><?php echo et_sanitize_html_input_text( $et_phone_number ); ?></span>
				<?php endif; ?>

				<?php if ( '' !== ( $et_email = et_get_option( 'header_email' ) ) ) : ?>
					<a href="<?php echo esc_attr( 'mailto:' . $et_email ); ?>"><span id="et-info-email"><?php echo esc_html( $et_email ); ?></span></a>
				<?php endif; ?>

				<?php
				if ( true === $show_header_social_icons ) {
					get_template_part( 'includes/social_icons', 'header' );
				} ?>
				</div> <!-- #et-info -->

			<?php endif; // true === $et_contact_info_defined ?>

				<div id="et-secondary-menu">
				<?php
					if ( ! $et_contact_info_defined && true === $show_header_social_icons ) {
						get_template_part( 'includes/social_icons', 'header' );
					} else if ( $et_contact_info_defined && true === $show_header_social_icons ) {
						ob_start();

						get_template_part( 'includes/social_icons', 'header' );

						$duplicate_social_icons = ob_get_contents();

						ob_end_clean();

						printf(
							'<div class="et_duplicate_social_icons">
								%1$s
							</div>',
							$duplicate_social_icons
						);
					}

					if ( '' !== $et_secondary_nav ) {
						echo $et_secondary_nav;
					}

					et_show_cart_total();
				?>
				</div> <!-- #et-secondary-menu -->

			</div> <!-- .container -->
		</div> <!-- #top-header -->
	<?php endif; // true ==== $et_top_info_defined ?>

	<?php if ( $et_slide_header || is_customize_preview() ) : ?>
		<div class="et_slide_in_menu_container">
			<?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) || is_customize_preview() ) { ?>
				<span class="mobile_menu_bar et_toggle_fullscreen_menu"></span>
			<?php } ?>

			<?php
				if ( $et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option( 'show_search_icon', true ) || class_exists( 'woocommerce' ) || is_customize_preview() ) { ?>
					<div class="et_slide_menu_top">

					<?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) ) { ?>
						<div class="et_pb_top_menu_inner">
					<?php } ?>
			<?php }

				if ( true === $show_header_social_icons ) {
					get_template_part( 'includes/social_icons', 'header' );
				}

				et_show_cart_total();
			?>
			<?php if ( false !== et_get_option( 'show_search_icon', true ) || is_customize_preview() ) : ?>
				<?php if ( 'fullscreen' !== et_get_option( 'header_style', 'left' ) ) { ?>
					<div class="clear"></div>
				<?php } ?>
				<form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
						printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
							esc_attr__( 'Search &hellip;', 'Divi' ),
							get_search_query(),
							esc_attr__( 'Search for:', 'Divi' )
						);
					?>
					<button type="submit" id="searchsubmit_header"></button>
				</form>
			<?php endif; // true === et_get_option( 'show_search_icon', false ) ?>

			<?php if ( $et_contact_info_defined ) : ?>

				<div id="et-info">
				<?php if ( '' !== ( $et_phone_number = et_get_option( 'phone_number' ) ) ) : ?>
					<span id="et-info-phone"><?php echo et_sanitize_html_input_text( $et_phone_number ); ?></span>
				<?php endif; ?>

				<?php if ( '' !== ( $et_email = et_get_option( 'header_email' ) ) ) : ?>
					<a href="<?php echo esc_attr( 'mailto:' . $et_email ); ?>"><span id="et-info-email"><?php echo esc_html( $et_email ); ?></span></a>
				<?php endif; ?>
				</div> <!-- #et-info -->

			<?php endif; // true === $et_contact_info_defined ?>
			<?php if ( $et_contact_info_defined || true === $show_header_social_icons || false !== et_get_option( 'show_search_icon', true ) || class_exists( 'woocommerce' ) || is_customize_preview() ) { ?>
				<?php if ( 'fullscreen' === et_get_option( 'header_style', 'left' ) ) { ?>
					</div> <!-- .et_pb_top_menu_inner -->
				<?php } ?>

				</div> <!-- .et_slide_menu_top -->
			<?php } ?>

			<div class="et_pb_fullscreen_nav_container">
				<?php
					$slide_nav = '';
					$slide_menu_class = 'et_mobile_menu';

					$slide_nav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s' ) );
					$slide_nav .= wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container' => '', 'fallback_cb' => '', 'echo' => false, 'items_wrap' => '%3$s' ) );
				?>

				<ul id="mobile_menu_slide" class="<?php echo esc_attr( $slide_menu_class ); ?>">

				<?php
					if ( '' == $slide_nav ) :
				?>
						<?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
							<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
						<?php }; ?>

						<?php show_page_menu( $slide_menu_class, false, false ); ?>
						<?php show_categories_menu( $slide_menu_class, false ); ?>
				<?php
					else :
						echo( $slide_nav );
					endif;
				?>

				</ul>
				<!--<span class="windEd"><a href="http://107.180.78.15:83/?page_id=909"></a></span>-->
			</div>
		</div>
	<?php endif; // true ==== $et_slide_header ?>

		<header id="main-header" data-height-onload="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>">
			<div class="container clearfix et_menu_container">
			<?php
				$logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
					? $user_logo
					: $template_directory_uri . '/images/logo.png';
			?>
				<div class="logo_container">
					<span class="logo_helper"></span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>" />
					</a>
				</div>
				<div id="et-top-navigation" data-height="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>" data-fixed-height="<?php echo esc_attr( et_get_option( 'minimized_menu_height', '40' ) ); ?>">
					<?php if ( ! $et_slide_header || is_customize_preview() ) : ?>
						<nav id="top-menu-nav">
						<?php
							$menuClass = 'nav';
							if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
							$primaryNav = '';

							$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );

							if ( '' == $primaryNav ) :
						?>
							<ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
								<?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
									<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
									
								<?php }; ?>

								<?php show_page_menu( $menuClass, false, false ); ?>
								<?php show_categories_menu( $menuClass, false ); ?>
								
							</ul>							
						<?php
							else :
								echo( $primaryNav );
							endif;
						?>
						</nav>
						<!--<span class="windEd"><a href="http://107.180.78.15:83/?page_id=909"></a></span>-->
					<?php endif; ?>

					<?php
					if ( ! $et_top_info_defined && ( ! $et_slide_header || is_customize_preview() ) ) {
						et_show_cart_total( array(
							'no_text' => true,
						) );
					}
					?>

					<?php if ( $et_slide_header || is_customize_preview() ) : ?>
						<span class="mobile_menu_bar et_pb_header_toggle et_toggle_<?php echo esc_attr( et_get_option( 'header_style', 'left' ) ); ?>_menu"></span>
					<?php endif; ?>

					<?php if ( ( false !== et_get_option( 'show_search_icon', true ) && ! $et_slide_header ) || is_customize_preview() ) : ?>
					<div id="et_top_search">
						<span id="et_search_icon"></span>
					</div>
					<?php endif; // true === et_get_option( 'show_search_icon', false ) ?>

					<?php do_action( 'et_header_top' ); ?>
				</div> <!-- #et-top-navigation -->
			</div> <!-- .container -->
			<div class="et_search_outer">
				<div class="container et_search_form_container">
					<form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
						printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
							esc_attr__( 'Search &hellip;', 'Divi' ),
							get_search_query(),
							esc_attr__( 'Search for:', 'Divi' )
						);
					?>
					</form>
					<span class="et_close_search_field"></span>
				</div>
			</div>
		</header> <!-- #main-header -->

		<div id="et-main-area">
