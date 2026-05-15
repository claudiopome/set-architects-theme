<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nemesis
 */

?>

	</div>
	
	<footer class="site-footer">
		<div class="row">
			<div class="col-lg-2 col-12">
				<p><?php bloginfo( 'name' ); ?></p>
			</div>
			<div class="col-lg-2 col-12">
				<?php the_field( 'footer-column-1', 'option' ); ?>
			</div>
			<div class="col-lg-2 col-12">
				<?php the_field( 'footer-column-2', 'option' ); ?>
			</div>
			<div class="col-lg-2 col-12">
				<?php the_field( 'footer-column-3', 'option' ); ?>
			</div>
			<div class="col-lg-4 col-12 last-column">
				<?php the_field( 'footer-column-4', 'option' ); ?>
				<p>© <?php echo date('Y'); ?></p>
			</div>
		</div>
	</footer>
	
</div>

<?php wp_footer(); ?>

</body>
</html>
