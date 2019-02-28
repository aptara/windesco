<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
<?php if (!is_user_logged_in()){ ?>
	<style>
	.entry-title,.main_title,.published{
		visibility:hidden;
	}
	#post-1125 #post-930 .entry-content.login-form {
		background: #69be50;
		padding-top: 0px;
	}
	.entry-content.login-form {
		background: #69be50;
		padding-top: 160px;
	}
	.entry-content.login-form {
		position:relative;
	}
	#post-930 .entry-content.login-form  .econtent:before{
		content: " ";
		width: 100%;
		background: #69be50;
		height: 0px;
		position: absolute;
		z-index:5;
	}	
	.econtent {
		min-height:170px;
	}
	#wpmem_msg {
		position:absolute;
		z-index:9;
		margin-top: 30px;
	}
	.error-msg {
		visibility:hidden;
	}
	</style>
	<!-- /*.entry-content.login-form  .econtent:before{
		content: " ";
		width: 100%;
		background: #69be50;
		height: 100px;
		position: absolute;
		z-index:5;
	}*/ -->
	
	<?php } ?>
	
<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>
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

					<div class="entry-content <?php if (!is_user_logged_in() && $_GET['page_id'] == '1125'){ ?>login-form <?php }?>">
					<div class="econtent">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .econtent -->
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
