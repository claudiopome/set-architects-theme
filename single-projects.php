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

	<div class="section-container single-page-project">

		<div class="content-sections">

			<div class="close-button" onclick="window.history.back()">
				<img src="<?php echo get_site_url(); ?>/wp-content/themes/set-architects/assets/build/img/close.svg">
			</div>

			<div class="single-section images-section <?php echo !isset($_GET['section']) || $_GET['section'] === 'images' ? 'active' : ''; ?>">
				<div class="single-project-visual">
					<div class="prev-images-button"></div>
					<div class="slider-images">
						<?php if ( have_rows( 'project-images' ) ) : ?>
							<?php while ( have_rows( 'project-images' ) ) : the_row(); ?>
								<div class="single-image">
									<?php
										$img = get_sub_field( 'project-images-image' );
										$sm = $img['sizes']['medium'];
										$md = $img['sizes']['medium_large'];
										$lg = $img['sizes']['large'];
										$full = $img['url'];
										$width = $img['width'];
										$height = $img['height'];
										$orientation = ($height > $width) ? 'vertical' : 'horizontal';
									?>
									<img
										class="<?php if ($layout == "background-image") { ?>background-image<?php } else { ?>normal-image<?php } ?>  <?php echo $orientation; ?>" 
										src="<?php echo $full; ?>" 
										data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
										data-sizes="100w" 
									/>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>
					</div>
					<div class="next-images-button"></div>
					<div class="images-cursor">
						<span class="cursor-counter"></span>
					</div>
				</div>
				<div class="single-project-info">
					<div class="row">
						<div class="col-lg-2 col-4 column-code">
							<p><?php the_field( 'project-code' ); ?></p>
						</div>
						<div class="col-lg-2 col-8 column-title">
							<p><?php the_title(); ?></p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $types = get_the_terms( get_the_ID(), 'type' );
								if ( $types && ! is_wp_error( $types ) ) {
									$type_names = wp_list_pluck( $types, 'name' );
									echo implode( ', ', $type_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $locations = get_the_terms( get_the_ID(), 'location' );
								if ( $locations && ! is_wp_error( $locations ) ) {
									$location_names = wp_list_pluck( $locations, 'name' );
									echo implode( ', ', $location_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $years = get_the_terms( get_the_ID(), 'year' );
								if ( $years && ! is_wp_error( $years ) ) {
									$year_names = wp_list_pluck( $years, 'name' );
									echo implode( ', ', $year_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12 last-column">
							<p>
								<?php $clients = get_the_terms( get_the_ID(), 'client' );
								if ( $clients && ! is_wp_error( $clients ) ) {
									$client_names = wp_list_pluck( $clients, 'name' );
									echo implode( ', ', $client_names );
								} ?>
							</p>
							<p>
								<?php $statuses = get_the_terms( get_the_ID(), 'status' );
								if ( $statuses && ! is_wp_error( $statuses ) ) {
									$status_names = wp_list_pluck( $statuses, 'name' );
									echo implode( ', ', $status_names );
								} ?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="single-section drawings-section <?php echo isset($_GET['section']) && $_GET['section'] === 'drawings' ? 'active' : ''; ?>">
				<div class="single-project-visual">
					<div class="prev-drawings-button"></div>
					<div class="slider-drawings">
						<?php if ( have_rows( 'project-drawings' ) ) : ?>
							<?php while ( have_rows( 'project-drawings' ) ) : the_row(); ?>
								<div class="single-image">
									<?php
										$img = get_sub_field( 'project-drawings-drawing' );
										$sm = $img['sizes']['medium'];
										$md = $img['sizes']['medium_large'];
										$lg = $img['sizes']['large'];
										$full = $img['url'];
										$width = $img['width'];
										$height = $img['height'];
										$orientation = ($height > $width) ? 'vertical' : 'horizontal';
									?>
									<img
										class="<?php if ($layout == "background-image") { ?>background-image<?php } else { ?>normal-image<?php } ?> <?php echo $orientation; ?>" 
										src="<?php echo $full; ?>" 
										data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
										data-sizes="100w" 
									/>
								</div>
							<?php endwhile; ?>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>
					</div>
					<div class="next-drawings-button"></div>
					<div class="drawings-cursor">
						<span class="cursor-counter"></span>
					</div>
				</div>
				<div class="single-project-info">
					<div class="row">
						<div class="col-lg-2 col-4 column-code">
							<p><?php the_field( 'project-code' ); ?></p>
						</div>
						<div class="col-lg-2 col-8 column-title">
							<p><?php the_title(); ?></p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $types = get_the_terms( get_the_ID(), 'type' );
								if ( $types && ! is_wp_error( $types ) ) {
									$type_names = wp_list_pluck( $types, 'name' );
									echo implode( ', ', $type_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $locations = get_the_terms( get_the_ID(), 'location' );
								if ( $locations && ! is_wp_error( $locations ) ) {
									$location_names = wp_list_pluck( $locations, 'name' );
									echo implode( ', ', $location_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $years = get_the_terms( get_the_ID(), 'year' );
								if ( $years && ! is_wp_error( $years ) ) {
									$year_names = wp_list_pluck( $years, 'name' );
									echo implode( ', ', $year_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12 last-column">
							<p>
								<?php $clients = get_the_terms( get_the_ID(), 'client' );
								if ( $clients && ! is_wp_error( $clients ) ) {
									$client_names = wp_list_pluck( $clients, 'name' );
									echo implode( ', ', $client_names );
								} ?>
							</p>
							<p>
								<?php $statuses = get_the_terms( get_the_ID(), 'status' );
								if ( $statuses && ! is_wp_error( $statuses ) ) {
									$status_names = wp_list_pluck( $statuses, 'name' );
									echo implode( ', ', $status_names );
								} ?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="single-section info-section <?php echo isset($_GET['section']) && $_GET['section'] === 'info' ? 'active' : ''; ?>">
				<div class="single-project-visual">
					<div class="project-info-inner">
						<div class="row">
							<div class="col-lg-2 col-12"></div>
							<div class="col-lg-8 col-12">
								<div class="project-description">
									<?php the_field( 'project-description' ); ?>
								</div>
							</div>
							<div class="col-lg-2 col-12"></div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-12"></div>
							<div class="col-lg-6 col-12">
								<?php if ( have_rows( 'project-specs' ) ) : ?>
									<?php while ( have_rows( 'project-specs' ) ) : the_row(); ?>
										<div class="row single-spec">
											<div class="col-lg-2 col-4 spec-label">
												<p><?php the_sub_field( 'project-specs-label' ); ?></p>
											</div>
											<div class="col-lg-6 col-8 spec-text">
												<?php the_sub_field( 'project-specs-text' ); ?>	
											</div>
											<div class="col-lg-4 col-12"></div>
										</div>
									<?php endwhile; ?>
								<?php else : ?>
									<?php // No rows found ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="single-project-info">
					<div class="row">
						<div class="col-lg-2 col-4 column-code">
							<p><?php the_field( 'project-code' ); ?></p>
						</div>
						<div class="col-lg-2 col-8 column-title">
							<p><?php the_title(); ?></p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $types = get_the_terms( get_the_ID(), 'type' );
								if ( $types && ! is_wp_error( $types ) ) {
									$type_names = wp_list_pluck( $types, 'name' );
									echo implode( ', ', $type_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $locations = get_the_terms( get_the_ID(), 'location' );
								if ( $locations && ! is_wp_error( $locations ) ) {
									$location_names = wp_list_pluck( $locations, 'name' );
									echo implode( ', ', $location_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p>
								<?php $years = get_the_terms( get_the_ID(), 'year' );
								if ( $years && ! is_wp_error( $years ) ) {
									$year_names = wp_list_pluck( $years, 'name' );
									echo implode( ', ', $year_names );
								} ?>
							</p>
						</div>
						<div class="col-lg-2 col-12 last-column">
							<p>
								<?php $clients = get_the_terms( get_the_ID(), 'client' );
								if ( $clients && ! is_wp_error( $clients ) ) {
									$client_names = wp_list_pluck( $clients, 'name' );
									echo implode( ', ', $client_names );
								} ?>
							</p>
							<p>
								<?php $statuses = get_the_terms( get_the_ID(), 'status' );
								if ( $statuses && ! is_wp_error( $statuses ) ) {
									$status_names = wp_list_pluck( $statuses, 'name' );
									echo implode( ', ', $status_names );
								} ?>
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

<?php
get_footer();
