<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article class="article-load" id="post-<?php the_ID(); ?>">
	<div class="row">

		<div class="col-12">
			<header class="entry-header">

			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>

			<?php if ( 'post' == get_post_type() ) : ?>

				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

			</header><!-- .entry-header -->	
		</div><!--col-12-->
		
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-lg-6 col-12 align-self-center">
				<img data-src= "<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large' )?>" class="lazy">
			</div>	<!--col-md-6 imagen-->
			
			<div class="col-lg-6 col-12">
				<div class="entry-content">

					<?php the_excerpt(); ?>

					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						)
					);
					?>

				</div><!-- .entry-content -->
			</div><!--col-md-6 content-->

		<?php else: ?>
		
			<div class="col-12">
				<div class="entry-content data-scroll">

					<?php the_excerpt(); ?>

					<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						)
					);
					?>

				</div><!-- .entry-content -->
			</div><!--col-12 content-->

		<?php endif; ?>
	
		
	</div><!--row-->
</article><!-- #post-## -->
<hr>
