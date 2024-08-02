<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nathalie_Mota
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
            ?>
            <img src="<?= the_post_thumbnail_url();?>" >
             <h1> <?= the_title();?> </h1>
            <p> <?= the_content(); ?></p>
            <?= get_field("reference");?>
            <?= get_field("type")?>
            <!-- <?= get_term();?> -->
            
            <?php 
		endwhile; // End of the loop.
		?>
		TESTTESTTESTTESTTEST
	</main><!-- #main -->

<?php
get_footer();
