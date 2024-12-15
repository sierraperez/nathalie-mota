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
    while (have_posts()) :
        the_post();
    ?>
        <div class="photo-info-container">
            <div class="photo-container">
                <div class="photo-info-left">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_content(); ?></p>
                    <p>REFERENCE : <span class="reference_value"><?php echo get_field("reference"); ?></span></p>
                    <p>CATEGORIE : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
                    <p>FORMAT : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
                    <p>TYPE : <?php echo get_field("type"); ?></p>
                    <p>ANNEE : <?php echo get_the_date('Y'); ?></p>
                </div>
                <div class="photo-info-right">
                    <img class="img-single" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo the_title_attribute(); ?>">
                </div>

            </div>


            <?php
            // Navegação entre posts com miniaturas e setas
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
        </div>

        <div class="photo-info-nav">
            <div class="photo-info-interest">
                <p>Cette photo vous intéresse ?</p>
            </div>
            <button id="contactBtn" class="photo-contact-btn open-contact-modal" data-photo-ref="#">Contact</button>

            <div class="photo-info-nav-block">
                <div class="navigation-thumbnails">
                    <?php if ($prev_post) : ?>
                        <!-- Miniatura do Post Anterior -->
                        <div class="prev-post-thumbnail">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($prev_post->ID); ?>">
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <!-- Miniatura do Post Seguinte -->
                        <div class="next-post-thumbnail">
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>" alt="<?php echo get_the_title($next_post->ID); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Setas de Navegação -->
                <div class="navigation-arrows">
                    <?php if ($prev_post) : ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link prev-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/prev-arrow.png" alt="Previous">
                        </a>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link next-link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/next-arrow.png" alt="Next">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php
    endwhile; // End of the loop.
    ?>
    <div class="sugestion">

        <?php get_template_part('template-parts/photo/photo-block') ?>
    </div>
</main><!-- #main -->

<?php
get_footer();
