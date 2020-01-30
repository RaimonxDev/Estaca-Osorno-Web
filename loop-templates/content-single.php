<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
	<?php echo get_the_post_thumbnail( $post->ID, 'medium-large' , array('class' => 'img-fluid mb-5 rounded lazy')); ?>
		
		

	</header><!-- .entry-header -->

	

	<div class="entry-content single-content bg-white p-md-5" data-scroll>
		
	<div class="meta">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta d-flex justify-content-start">
			<?php understrap_posted_on();?>
		</div><!-- .entry-meta -->
		<hr>
	</div>

		<?php the_content(); ?>

		<?php
		
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer mb-3">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
