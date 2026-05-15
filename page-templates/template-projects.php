<?php /* Template Name: Projects */ ?>
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

	<div class="section-container page-projects"> 

		<div class="mobile-filters">
			<div class="filters-toggle">
				<p class="filters-button">Filters</p>
				<p class="sort-project" data-sort="column-project">
					<span class=""><?php _e( 'Sort', 'set-architects'); ?></span>
					<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
						<style type="text/css">
							.st0{fill:none;stroke:#000000;stroke-width:1.3;}
						</style>
						<path class="st0" d="M1,1l5.5,5L12,1"/>
					</svg>
				</p>
			</div>
			<?php
			$terms = get_terms(array(
				'taxonomy'   => 'type',
				'hide_empty' => false,
			));

			$output = '';

			if (!empty($terms) && !is_wp_error($terms)) {
				// Optional "All" button
				$output .= '<button data-mixitup-control data-filter="all">All</button>';

				foreach ($terms as $term) {
					$slug = sanitize_html_class($term->slug); // for use as a class in the filter
					$name = esc_html($term->name);

					$output .= '<button data-mixitup-control data-filter=".type-' . $slug . '">' . $name . '</button>';
				}
			} else {
				$output .= 'No types found.';
			}
			?>

			<div class="filters-list">
				<?php echo $output; ?>
				<div class="close-button">
					<img src="<?php echo get_site_url(); ?>/wp-content/themes/set-architects/assets/build/img/close.svg">
				</div>
			</div>

		</div>

		<div class="content-sections">

			<div class="single-section images-section <?php echo !isset($_GET['section']) || $_GET['section'] === 'images' ? 'active' : ''; ?>">
				<div class="projects-list row filters-container">
					<?php
					$args = array(
						'post_type'      => 'projects',
						'posts_per_page' => -1, // or change as needed
						'post_status'    => 'publish',
					);

					$projects_query = new WP_Query($args);

					if ($projects_query->have_posts()) :
						while ($projects_query->have_posts()) : $projects_query->the_post(); ?>

							<?php
							$type_terms = get_the_terms(get_the_ID(), 'type');
							$type_classes = [];

							if (!empty($type_terms) && !is_wp_error($type_terms)) {
								foreach ($type_terms as $term) {
									$type_classes[] = 'type-' . sanitize_html_class($term->slug);
								}
							}
							?>


							<?php if (get_field( 'project-thumbnail-image' )) { ?>
								<div class="single-project col-lg-3 col-6 mix <?php echo implode(' ', $type_classes); ?>">
									<a href="<?php the_permalink(); ?>">
										<?php
											$img = get_field( 'project-thumbnail-image' );
											$sm = $img['sizes']['medium'];
											$md = $img['sizes']['medium_large'];
											$lg = $img['sizes']['large'];
											$full = $img['url'];
											$width = $img['width'];
											$height = $img['height'];
											$orientation = ($height > $width) ? 'vertical' : 'horizontal';
										?>
										<img
											class="lazy <?php if ($layout == "background-image") { ?>background-image<?php } else { ?>normal-image<?php } ?> <?php echo $orientation; ?>" 
											data-src="<?php echo $full; ?>" 
											data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
											data-sizes="100w" 
										/>
									</a>
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
							<?php } else { ?>
								<?php continue; ?>
							<?php } ?>	

						<?php endwhile;
						wp_reset_postdata();
					else :
						echo '<p>No projects found.</p>';
					endif;
					?>
				</div>
			</div>

			<div class="single-section drawings-section <?php echo isset($_GET['section']) && $_GET['section'] === 'drawings' ? 'active' : ''; ?>">
				<div class="projects-list row filters-container">
					<?php
					$args = array(
						'post_type'      => 'projects',
						'posts_per_page' => -1, // or change as needed
						'post_status'    => 'publish',
					);

					$projects_query = new WP_Query($args);

					if ($projects_query->have_posts()) :
						while ($projects_query->have_posts()) : $projects_query->the_post(); ?>

							<?php
							$type_terms = get_the_terms(get_the_ID(), 'type');
							$type_classes = [];

							if (!empty($type_terms) && !is_wp_error($type_terms)) {
								foreach ($type_terms as $term) {
									$type_classes[] = 'type-' . sanitize_html_class($term->slug);
								}
							}
							?>

							<?php if (get_field( 'project-thumbnail-image' )) { ?>
								<div class="single-project col-lg-3 col-6 mix <?php echo implode(' ', $type_classes); ?>">
									<a href="<?php the_permalink(); ?>">
										<?php
											$img = get_field( 'project-thumbnail-drawing' );
											$sm = $img['sizes']['medium'];
											$md = $img['sizes']['medium_large'];
											$lg = $img['sizes']['large'];
											$full = $img['url'];
											$width = $img['width'];
											$height = $img['height'];
											$orientation = ($height > $width) ? 'vertical' : 'horizontal';
										?>
										<img
											class="lazy <?php if ($layout == "background-image") { ?>background-image<?php } else { ?>normal-image<?php } ?> <?php echo $orientation; ?>" 
											data-src="<?php echo $full; ?>" 
											data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
											data-sizes="100w" 
										/>
									</a>
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
							<?php } else { ?>
								<?php continue; ?>
							<?php } ?>

						<?php endwhile;
						wp_reset_postdata();
					else :
						echo '<p>No projects found.</p>';
					endif;
					?>
				</div>
			</div>

			<div class="single-section info-section <?php echo isset($_GET['section']) && $_GET['section'] === 'info' ? 'active' : ''; ?>">
				<div class="projects-thumbnails">
					<div class="empty-box"></div>
					<div class="projects-thumbnails-container">
						<?php
						$args = array(
							'post_type'      => 'projects',
							'posts_per_page' => -1, // or change as needed
							'post_status'    => 'publish',
						);

						$projects_query = new WP_Query($args);

						$thumbnail = 0; 
						if ($projects_query->have_posts()) :
							while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
								<div class="single-project-thumbnail <?php if (get_field( 'project-thumbnail-image' )) { ?><?php } else { ?>textual<?php } ?>" id="thumbnail-<?php echo $thumbnail; ?>">
									<?php
										$img = get_field( 'project-thumbnail-image' );
										$sm = $img['sizes']['medium'];
										$md = $img['sizes']['medium_large'];
										$lg = $img['sizes']['large'];
										$full = $img['url'];
									?>
									<img
										class="" 
										src="<?php echo $md; ?>" 
										data-srcset="<?php echo $md; ?> 768w, <?php echo $lg; ?> 1024w, <?php echo $full; ?> 1600w"
										data-sizes="100w" 
									/>
								</div>
								<?php $thumbnail++; ?>
							<?php endwhile;
							wp_reset_postdata();
						else :
							echo '<p>No projects found.</p>';
						endif; ?>
					</div>
					<div class="empty-box"></div>
				</div>
				<div class="projects-header">
					<div class="row">
						<div class="col-lg-2 col-12">
							<p class="sort-code" data-sort="column-code">
								<span><?php _e( 'Code', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p class="sort-project" data-sort="column-project">
								<span class="sort-project-desktop"><?php _e( 'Project', 'set-architects'); ?></span>
								<span class="sort-project-mobile"><?php _e( 'Sort', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p class="sort-type" data-sort="column-type">
								<span><?php _e( 'Type', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p class="sort-location" data-sort="column-location">
								<span><?php _e( 'Location', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-2 col-12">
							<p class="sort-year" data-sort="column-year">
								<span><?php _e( 'Year', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-1 col-12">
							<p class="sort-client" data-sort="column-client">
								<span><?php _e( 'Client', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
						<div class="col-lg-1 col-12 last-column">
							<p class="sort-status" data-sort="column-status">
								<span><?php _e( 'Status', 'set-architects'); ?></span>
								<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 7" style="enable-background:new 0 0 13 7;" xml:space="preserve">
									<style type="text/css">
										.st0{fill:none;stroke:#000000;stroke-width:1.3;}
									</style>
									<path class="st0" d="M1,1l5.5,5L12,1"/>
								</svg>
							</p>
						</div>
					</div>
				</div>
				<div class="projects-list filters-container">
					<?php
					$args = array(
						'post_type'      => 'projects',
						'posts_per_page' => -1, // or change as needed
						'post_status'    => 'publish',
					);

					$projects_query = new WP_Query($args);

					$thumbnail = 0;
					if ($projects_query->have_posts()) :
						while ($projects_query->have_posts()) : $projects_query->the_post(); ?>

							<?php
							$type_terms = get_the_terms(get_the_ID(), 'type');
							$type_classes = [];

							if (!empty($type_terms) && !is_wp_error($type_terms)) {
								foreach ($type_terms as $term) {
									$type_classes[] = 'type-' . sanitize_html_class($term->slug);
								}
							}
							?>

							<div class="single-project mix <?php echo implode(' ', $type_classes); ?> <?php if (get_field( 'project-thumbnail-image' )) { ?><?php } else { ?>no-link<?php } ?>" data-thumbnail="thumbnail-<?php echo $thumbnail; ?>">
									<?php if (get_field( 'project-thumbnail-image' )) { ?>
										<a href="<?php the_permalink(); ?>">
									<?php } ?>
									<div class="row">
										<div class="col-lg-2 col-4 column-code">
											<p><?php the_field( 'project-code' ); ?></p>
										</div>
										<div class="col-lg-2 col-8 column-project">
											<p><?php the_title(); ?></p>
										</div>
										<div class="col-lg-2 col-12 column-type">
											<p>
												<?php $types = get_the_terms( get_the_ID(), 'type' );
												if ( $types && ! is_wp_error( $types ) ) {
													$type_names = wp_list_pluck( $types, 'name' );
													echo implode( ', ', $type_names );
												} ?>
											</p>
										</div>
										<div class="col-lg-2 col-12 column-location">
											<p>
												<?php $locations = get_the_terms( get_the_ID(), 'location' );
												if ( $locations && ! is_wp_error( $locations ) ) {
													$location_names = wp_list_pluck( $locations, 'name' );
													echo implode( ', ', $location_names );
												} ?>
											</p>
										</div>
										<div class="col-lg-2 col-12 column-year">
											<p>
												<?php $years = get_the_terms( get_the_ID(), 'year' );
												if ( $years && ! is_wp_error( $years ) ) {
													$year_names = wp_list_pluck( $years, 'name' );
													echo implode( ', ', $year_names );
												} ?>
											</p>
										</div>
										<div class="col-lg-1 col-12 column-client">
											<p>
												<?php $clients = get_the_terms( get_the_ID(), 'client' );
												if ( $clients && ! is_wp_error( $clients ) ) {
													$client_names = wp_list_pluck( $clients, 'name' );
													echo implode( ', ', $client_names );
												} ?>
											</p>
										</div>
										<div class="col-lg-1 col-12 column-status last-column">
											<p>
												<?php $statuses = get_the_terms( get_the_ID(), 'status' );
												if ( $statuses && ! is_wp_error( $statuses ) ) {
													$status_names = wp_list_pluck( $statuses, 'name' );
													echo implode( ', ', $status_names );
												} ?>
											</p>
										</div>
									</div>
								<?php if (get_field( 'project-thumbnail-image' )) { ?>
									</a>
								<?php } ?>
							</div>
							
							<?php $thumbnail++; ?>
						<?php endwhile;
						wp_reset_postdata();
					else :
						echo '<p>No projects found.</p>';
					endif;
					?>
				</div>
			</div>

		</div>

	</div>

<?php
get_footer();
