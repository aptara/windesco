<?php
/* Template Name: infomercials */ 
get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>
<script type="text/javascript">
$(window).load(function(){
var slider = $("#lightSlider").lightSlider();

$("#goToPrevSlide").on('click', function () {
    slider.goToPrevSlide();
});
$("#goToNextSlide").on('click', function () {
    slider.goToNextSlide();
});

});
</script>
<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>
<?php if (!is_user_logged_in()){ ?>
	<style>
	.entry-title,.main_title,.published{
	visibility:hidden;
	}
	.entry-content.login-form {
		background: #69be50;
		padding-top: 160px;
	}
	.entry-content.login-form {
		position:relative;
	}
	.entry-content.login-form  .econtent:before {
		content: " ";
		width: 100%;
		background: #69be50;
		/* height: 100px; */
		position: absolute;
	}
	.econtent {
		min-height:170px;
	}
	#wpmem_msg {
		position:absolute;
		z-index:9;
		margin-top: 30px;
	}
	</style>
<?php } ?>
<style>
.econtent p { display: none; }
</style>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="entry-title main_title"><?php the_title(); ?></h1>
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
				?>

				<?php endif; ?>
			
					<div class="entry-content <?php if (!is_user_logged_in()){ ?>login-form <?php }?>">
					<div class="econtent">
					<?php
						//echo $url = $_SERVER['HTTP_REFERER'];
						//echo '</br>';
						//echo $id = substr($url, -9);
						$id1 = $_GET['id'];
						
						echo do_shortcode('[wpmem_form login redirect_to="http://107.180.78.15:83/?page_id=950&link=https://vimeo.com/' .$id1. '&id=' .$id1. '"]');				
						$link = $_GET['link'];
						$newlink = substr($link,18);
						$source = "https://player.vimeo.com/video/".$newlink;
						if (is_user_logged_in()){
					?>
					<div id="videotitle1"></div>
					<div class="videoplayer">
					<iframe width="100%" height="57%" src="<?php echo $source; ?>" frameborder="0" allowFullScreen mozallowfullscreen webkitAllowFullScreen></iframe>
					</div>
					<div class="video-desc"><h3>Description</h3>
					<div id="videodesc1"></div></div>
					<div id="gallery" class="content fluid light" data-mcs-theme="inset-2-light">
					<div class="album-title">Related Videos</div>
					<div id="thumbs-carousal">  
					<a id="goToPrevSlide"></a><ul id="lightSlider" class="content-slider lsGrab"></ul>
					<a id="goToNextSlide"></a>
					</div>	
					</div>
					
					<?php } ?>
					</div>
					</div> <!-- .entry-content -->
 
				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php

get_footer();
