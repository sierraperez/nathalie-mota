<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nathalie_Mota
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="hero-header" bis_skin_checked="1">
		<a href="<?php echo esc_url(home_url('/')); ?>">
			<img class= "hero-header__img"src="<?php echo get_template_directory_uri(); ?>/assets/img/nathalie-13.jpeg" alt="<?php bloginfo('name'); ?>">
			<h1 class="hero-header__page-title">Photographe Event</h1>
		</a>
	</div>
	</main><!-- #main -->

<?php
get_footer();
