<?php
/* Template Name: gridpage */ 
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
?>

<?php //if($_GET['page_id'] == '909') { ?>
<style>
/* .windEd a {
	width: 128px;
    height: 55px;
    margin-top: -6px;
    background: url(http://107.180.78.15:83/img/blue.png) 0 0 no-repeat;
    position: relative;
    float: right;
	
}

.windEd-footer a {
	width: 102px;
    height: 37px;
    margin-top: 6px;
    background: url(http://107.180.78.15:83/img/footer_blue.PNG) 0 0 no-repeat;
    position: relative;
    float: right;
} */
</style>
<?php //} ?>


<script type="text/javascript">
$(window).load(function(){
	var slider = $("#lightSlider").lightSlider();
	slider.goToSlide(3);
    slider.goToPrevSlide();
    slider.goToNextSlide();
    slider.getCurrentSlideCount();
    slider.refresh();
    slider.play(); 
    slider.pause(); 
	
	var slider1 = $("#lightSlider1").lightSlider();
    slider1.goToSlide(3);
    slider1.goToPrevSlide();
    slider1.goToNextSlide();
    slider1.getCurrentSlideCount();
    slider1.refresh();
    slider1.play(); 
    slider1.pause(); 
});
</script>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

<?php if ( ! $is_page_builder_used ) : ?>

					<!--<h1 class="entry-title main_title">
					<img src="../img/pagetitle.PNG" style="margin-left:-5px;"/>
					<?php //the_title(); ?></h1>-->
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				    endif; ?>
					
					<div id="education-articles">
					<div class="album-title">Education Articles<span class="imgicon"> <img src="../img/unlock.png" /> </span></div>
					<div>
					<div class="whitepaper">
					<?php echo do_shortcode('[the-post-grid id="933" title="GridEdu"]'); ?>
					</div>
					</div>
					
					
					<div id="gallery" class="content fluid light" data-mcs-theme="inset-2-light">
					<div class="">
					<div id="case-studies">
					<div class="album-title"> Case Studies 
					<?php if (is_user_logged_in()){ ?>
						<span class="imgicon"><img src="../img/unlock.png" /> </span>
					<?php } else { ?>
						<span class="imgiconl"><img src="../img/lock.png" /> </span>
					<?php } ?>
					</div>
					</div>
					
					<div class="whitepaper"><div id="thumbs1">
					<ul id="lightSlider1" class="content-slider lsGrab"></ul>
					</div>
					</div></div></div>
					
					<div id="white-papers">
					<div class="album-title">White Papers
					<?php if (is_user_logged_in()){ ?>
						<span class="imgicon"><img src="../img/unlock.png" /> </span>
					<?php } else { ?>
						<span class="imgiconl"><img src="../img/lock.png" /> </span>
					<?php } ?>
					</div>
					</div>
					
					<div class="whitepaper">
					<?php echo do_shortcode('[the-post-grid id="943" title="GridWhite"]'); ?>
					</div>
					<div id="main-inner">
					<div class="inner-content">
					<div class="inner-right">
					<div id="gallery" class="content fluid light" data-mcs-theme="inset-2-light">
					<div class="video-outer">
					<div id="infomercials">
					<div class="album-title"> Infomercials 
					<?php if (is_user_logged_in()){ ?>
						<span class="imgicon"><img src="../img/unlock.png" /> </span>
					<?php } else { ?>
						<span class="imgiconl"><img src="../img/lock.png" /> </span>
					<?php } ?>
					</div>
					</div>	                    			
					<div class="whitepaper"> 
						<div id="thumbs">                    					
						<ul id="lightSlider" class="content-slider lsGrab"></ul>
						</div>	
					</div> 
					</div></div> 
					<!--<div id="badge">
					<div class="vimeoBadge horizontal"> 
					</div>
					</div>-->
					</div>
					 </div>
					<!--<div style="clear:both;"></div>-->
					</div>
					
					</div>
					
<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->
						
			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>
</div> <!-- #main-content -->

<?php
get_footer();
?>