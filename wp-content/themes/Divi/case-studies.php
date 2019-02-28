<?php
/* Template Name: case-studies */ 
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
?>
<script type="text/javascript">
$(window).load(function(){

var slider1 = $("#lightSlider1").lightSlider(); 

$("#goToPrevSlide1").on('click', function () {
    slider1.goToPrevSlide();
});
$("#goToNextSlide1").on('click', function () {
    slider1.goToNextSlide();
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
						
						echo do_shortcode('[wpmem_form login redirect_to="http://107.180.78.15:83/?page_id=946&link=https://vimeo.com/' .$id1. '&id=' .$id1. '"]');				
						$link = $_GET['link'];
						$newlink = substr($link,18);
						$source = "https://player.vimeo.com/video/".$newlink;
						if (is_user_logged_in()){
					?>
						<div id="videotitle"></div>
						<iframe src="<?php echo $source; ?>" width="100%" height="57%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
						<div class="video-desc">
						<h3>Description</h3>
						<div id="videodesc"></div>
						</div>						
						<div id="gallery" class="content fluid light" data-mcs-theme="inset-2-light">
						<div class="album-title">Related videos</div>
						<div id="thumbs1">
						<a id="goToPrevSlide1"></a><ul id="lightSlider1" class="content-slider lsGrab"></ul>
						<a id="goToNextSlide1"></a>
						</div>
						</div>
					<?php } ?>	
					</div>
					</div> <!-- .entry-content -->
					
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