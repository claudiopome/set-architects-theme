<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nemesis
 */

get_header();
?>

	<div class="section-container"> 

		<div class="page-header">
			<div class="secondary-title animateview">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>

		<div class="page-content">

			<div class="row">
				<div class="col-lg-6 col-12">
					<?php the_field( 'pagina-contenuto' ); ?>
				</div>
				<div class="col-lg-6 col-12"></div>
			</div>

		</div>

	</div>

<?php
get_footer();
