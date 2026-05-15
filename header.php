<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nemesis
 */

?>
<!-- 
Davide Giorgetta (2025) ✨ 11
Graphic design and web development
www.davidegiorgetta.com
-->

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header"> 
		<div class="site-header-inner">

			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</div> 

			<div class="sections-navigation">
				<div class="sections-box">
					<div class="single-section section-images <?php echo !isset($_GET['section']) || $_GET['section'] === 'images' ? 'active' : ''; ?>">
						<?php _e( 'Images', 'set-architects'); ?>
					</div>
					<div class="single-section section-drawings <?php echo isset($_GET['section']) && $_GET['section'] === 'drawings' ? 'active' : ''; ?>">
						<?php _e( 'Drawings', 'set-architects'); ?>
					</div>
					<div class="single-section section-info <?php echo isset($_GET['section']) && $_GET['section'] === 'info' ? 'active' : ''; ?>">
						<?php _e( 'Text', 'set-architects'); ?>
					</div>
				</div>
			</div>

			<nav id="site-navigation" class="navbar navbar-expand-md main-navigation">
				<div class="collapse navbar-collapse" id="collapse-navigation">
					<div class="navbar-nav">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</div>
				</div>
			</nav>

		</div>

		<button class="navbar-toggler menu-toggle collapsed" type="button" data-toggle="collapse" data-target="#collapse-navigation" aria-controls="collapse-navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

	</header>

	<div id="content" class="site-content">

	