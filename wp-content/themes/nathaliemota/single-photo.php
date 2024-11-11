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
            <p>REFERENCE: <?= get_field("reference");?></p>
            <p> CATEGORIE: <?= strip_tags(get_the_term_list( $post->ID, 'categorie' ));?></p>
            <p>FORMAT: <?= strip_tags(get_the_term_list( $post->ID, 'format' ));?> </p>
            <p>TYPE: <?= get_field("type")?></p>
            <p>ANNEE: <?= the_time('Y');?></p> 
        <!--<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
if ($prev_post) : ?>
    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link prev-link" data-thumbnail="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/prev-arrow.png" alt="Previous">
    </a>
<?php endif; ?>
<?php if ($next_post) : ?>
    <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link--> 
            
            <?php 
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();
