<?php /* Template Name: Contacts 
Template Post Type: page */ ?>
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

	<div class="section-container page-contact"> 

		<div class="page-contact-inner">
			<div class="row">
				<div class="col-lg-2 col-12"></div>
				<div class="col-lg-4 col-12">
					<?php the_field( 'contact-column-left' ); ?>
					<p class="credits credits-desktop">Credits</p>
					<div class="credits-container credits-container-desktop">
						<?php the_field( 'contact-credits' ); ?>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<?php the_field( 'contact-column-right' ); ?>
					<p class="credits credits-mobile">Credits</p>
					<div class="credits-container credits-container-mobile">
						<?php the_field( 'contact-credits' ); ?>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php
get_footer();
