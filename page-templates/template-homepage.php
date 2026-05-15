<?php /* Template Name: Homepage */ ?>
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

	<div class="section-container page-homepage"> 

		<?php $show_popup = !isset($_COOKIE['visited_homepage']); ?>
		<?php if ($show_popup): ?>
			
		<?php endif; ?>

		<div class="loader" id="loader">
			<p><?php bloginfo( 'name' ); ?></p>
		</div>

		<div class="content-sections">


			<?php $logic = get_field( 'homepage-featured-projects-logic' ); ?>
			<?php
			// Get and shuffle the featured projects once
			$homepage_featured_projects = get_field( 'homepage-featured-projects' );
			if ($logic == "random") {
				if ( $homepage_featured_projects ) {
					shuffle( $homepage_featured_projects );
				}
			} else {

			}
			?>

			<div class="single-section images-section <?php echo !isset($_GET['section']) || $_GET['section'] === 'images' ? 'active' : ''; ?>">
				<?php if ( $homepage_featured_projects ) : ?>
					<?php foreach ( $homepage_featured_projects as $post ) : ?>
						<?php setup_postdata ( $post ); ?>
						<div class="single-featured-project">
							<a href="<?php the_permalink(); ?>">
								<?php $img = get_field( 'project-thumbnail-image' );
								$width = $img['width'];
								$height = $img['height'];
								$orientation = ($height > $width) ? 'vertical' : 'horizontal'; ?>
								<div class="single-featured-project-visual <?php echo $orientation; ?>">
									<?php
										$img = get_field( 'project-thumbnail-image' );
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
								<div class="single-featured-project-info">
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
							</a>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>

			<div class="single-section drawings-section <?php echo isset($_GET['section']) && $_GET['section'] === 'drawings' ? 'active' : ''; ?>">
				<?php if ( $homepage_featured_projects ) : ?>
					<?php foreach ( $homepage_featured_projects as $post ) : ?>
						<?php setup_postdata ( $post ); ?>
						<div class="single-featured-project">
							<a href="<?php the_permalink(); ?>">
								<?php $img = get_field( 'project-thumbnail-drawing' );
								$width = $img['width'];
								$height = $img['height'];
								$orientation = ($height > $width) ? 'vertical' : 'horizontal'; ?>
								<div class="single-featured-project-visual <?php echo $orientation; ?>">
									<?php
										$img = get_field( 'project-thumbnail-drawing' );
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
								<div class="single-featured-project-info">
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
							</a>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>

			<div class="single-section info-section <?php echo isset($_GET['section']) && $_GET['section'] === 'info' ? 'active' : ''; ?>">
				<?php if ( $homepage_featured_projects ) : ?>
					<?php foreach ( $homepage_featured_projects as $post ) : ?>
						<?php setup_postdata ( $post ); ?>
						<div class="single-featured-project">
							<a href="<?php the_permalink(); ?>">
								<div class="single-featured-project-visual">
									<div class="single-featured-project-text">
										<p>
											<?php
											$text = get_field( 'project-thumbnail-text' );
											if ( $text ) {
												$stripped = wp_strip_all_tags( $text ); // Remove HTML tags
												$truncated = mb_substr( $stripped, 0, 420 ); // Get first 420 chars safely (UTF-8)
												if ( mb_strlen( $stripped ) > 420 ) {
													$truncated .= '…';
												}
												echo esc_html( $truncated );
											}
											?>
										</p>
									</div>
								</div>
								<div class="single-featured-project-info">
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
							</a>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>

		</div>	

	</div>

<?php
get_footer();
