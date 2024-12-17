<?php

/**
 * The main template file
 *
 * This is the main template for displaying a gallery of photos.
 *
 * @package Nathalie_Mota
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part("template-parts/header/hero") ?>



    <?php get_template_part("template-parts/photo/filter-photo") ?>


    <!-- Galeria de Fotos -->
    <section class="galerie-photo" id="photo-gallery">
        <?php
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 8, // Mostra apenas 8 imagens inicialmente
            'order' => 'DESC',
            'orderby' => 'DATE',
            'paged' => 1, // Página inicial
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <!-- Cada imagem da galeria -->
                <?php get_template_part('template-parts/onephoto'); ?>
        <?php
            }
            echo '</div>';
        } else {
            echo "Désolée. Nous n'avons pas d'autres photos dans cette catégorie.";
        }
        wp_reset_postdata();
        ?>
    </section>

    <!-- Botão para carregar mais -->
    <button id="load-more" data-page="1">Charger plus</button>

    <!-- Estrutura do Overlay -->
    <div id="photo-overlay" class="photo-overlay">
        <span class="close-overlay">&times;</span>
        <img class="overlay-image" src="" alt="Imagem em destaque">
        <p class="overlay-caption"></p>
    </div>

</main>

<?php
get_footer();
?>