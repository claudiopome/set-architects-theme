<?php /* Template Name: Studio 
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

	<div class="section-container page-studio"> 

		<div class="page-studio-inner">
			<div class="studio-profile">
				<?php the_field( 'studio-profile' ); ?>
			</div>
			<?php $img = get_field( 'studio-image' ); ?>
			<?php if ($img) { ?>
				<div class="studio-image">
					<?php
						$img = get_field( 'studio-image' );
						$sm = $img['sizes']['medium'];
						$md = $img['sizes']['medium_large'];
						$lg = $img['sizes']['large'];
						$full = $img['url'];
					?>
					<img
						class="lazy <?php if ($layout == "background-image") { ?>background-image<?php } else { ?>normal-image<?php } ?>" 
						data-src="<?php echo $full; ?>" 
						data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
						data-sizes="100w" 
					/>
				</div>
			<?php } ?>
			<div class="studio-info">
				<div class="row">
					<div class="col-lg-6 col-12 studio-profiles">
						<?php the_field( 'studio-team' ); ?>
					</div>
					<div class="col-lg-6 col-12">
						<div class="awards-title">
							<p>Awards</p>
						</div>
						<?php if ( have_rows( 'studio-awards' ) ) : ?>
							<?php while ( have_rows( 'studio-awards' ) ) : the_row(); ?>
								<div class="row single-spec">
									<div class="col-lg-2 col-2">
										<p><?php the_sub_field( 'studio-awards-year' ); ?></p>
									</div>
									<div class="col-lg-10 col-10">
										<?php the_sub_field( 'studio-awards-award' ); ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php
get_footer();
