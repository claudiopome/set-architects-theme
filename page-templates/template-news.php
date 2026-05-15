<?php /* Template Name: News */ ?>
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

	<div class="section-container page-news"> 

		<div class="news-thumbnails">
			<div class="empty-box"></div>
			<div class="news-thumbnails-container">
				<?php
				$args = array(
					'post_type'      => 'news',
					'posts_per_page' => -1, // or change as needed
					'post_status'    => 'publish',
				);

				$projects_query = new WP_Query($args);

				$thumbnail = 0; 
				if ($projects_query->have_posts()) :
					while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
						<div class="single-news-thumbnail" id="thumbnail-<?php echo $thumbnail; ?>">
							<?php if (get_field( 'news-image' )) { ?>
								<?php
									$img = get_field( 'news-image' );
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
							<?php } ?>
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
		
		<div class="news-header">
			<div class="row">
				<div class="col-lg-2 col-12">
					<p><?php _e( 'Date', 'set-architects'); ?></p>
				</div>
				<div class="col-lg-2 col-12">
					<p><?php _e( 'News', 'set-architects'); ?></p>
				</div>
				<div class="col-lg-2 col-12">
					<p><?php _e( 'Type', 'set-architects'); ?></p>
				</div>
				<div class="col-lg-6 col-12">
					<p><?php _e( 'About', 'set-architects'); ?></p>
				</div>
			</div>
		</div>
		<div class="news-list items-list">
			<?php $args = array(
				'post_type'      => 'news',
				'posts_per_page' => -1, // or change as needed
				'post_status'    => 'publish',
			);

			$projects_query = new WP_Query($args);

			$thumbnail = 0;
			if ($projects_query->have_posts()) :
				while ($projects_query->have_posts()) : $projects_query->the_post(); ?>

					<div class="single-news single-item" data-thumbnail="thumbnail-<?php echo $thumbnail; ?>">
						<?php 
						$link = get_field('news-link');
						if ( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
						?>
							<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
						<?php else: ?>
							<div class="no-link">
						<?php endif; ?>

							<div class="row">
								<div class="col-lg-2 col-4 column-date">
								
									<p>
									<?php echo esc_html ( get_field( 'news-date' ) ); ?>
									</p>
								</div>
								<div class="col-lg-2 col-8 column-title">
									<p><?php the_title(); ?></p>
								</div>
								<div class="col-lg-2 col-12 column-type">
									<?php the_field('news-type'); ?>
								</div>
								<div class="col-lg-6 col-12 column-text">
									<?php the_field('news-text'); ?>
								</div>
							</div>

						<?php if ( $link ): ?>
							</a>
						<?php else: ?>
							</div>
						<?php endif; ?>

					</div>

					<?php $thumbnail++; ?>
				<?php endwhile;
				wp_reset_postdata();
			else :
				echo '<p>No projects found.</p>';
			endif; ?>

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

	</div>

<?php
get_footer();
