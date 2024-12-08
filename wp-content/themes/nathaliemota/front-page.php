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
    <?php get_template_part("template-parts/header/hero") ?>
    <section class="galerie-photo">
        <?php
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => '8',
            'order' => 'DESC',
            'orderby' => 'DATE',
            'paged' => 1,
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();


        ?>
                <?php get_template_part('template-parts/photo/one-photo') ?>
        <?php
            }
        }
        ?>
    </section>
</main><!-- #main -->


<?php
get_footer();
