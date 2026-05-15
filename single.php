<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nemesis
 */

get_header();
?>

	<div class="section-container">

		<?php if ( have_posts() ) : 
			while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

<?php
get_footer();
