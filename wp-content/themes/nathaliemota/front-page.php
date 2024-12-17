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



    <?php get_template_part("template-parts/photo/filter-photo")?>


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
                <article class="photo-item">
                    <img
                        src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="gallery-image">
                </article>
        <?php
            }
            wp_reset_postdata(); // Reseta a query
        }
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

<!-- Adiciona os estilos para o overlay -->
<style>
    .photo-overlay {
        display: none;
        /* Oculto por padrão */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .photo-overlay :hover {
        opacity: ;
    }

    .photo-overlay img {
        max-width: 90%;
        max-height: 80%;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .photo-overlay .close-overlay {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }

    .photo-overlay .overlay-caption {
        margin-top: 15px;
        color: #fff;
        font-size: 18px;
        text-align: center;
    }

    .photo-item:hover img {
        filter: brightness(0.4);
        /* Reduz o brilho para 70%, deixando a imagem mais escura */
        transition: filter 0.5s ease-in-out;
        /* Adiciona transição suave */
    }
</style>

<!-- Adiciona o script para controlar o overlay -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleciona todas as imagens da galeria
        const galleryImages = document.querySelectorAll('.galerie-photo img');
        const overlay = document.getElementById('photo-overlay');
        const overlayImage = overlay.querySelector('.overlay-image');
        const overlayCaption = overlay.querySelector('.overlay-caption');
        const closeOverlay = overlay.querySelector('.close-overlay');

        // Exibe o overlay ao clicar na imagem
        galleryImages.forEach(image => {
            image.addEventListener('click', function() {
                const imgSrc = this.getAttribute('src');
                const caption = this.getAttribute('alt') || 'Sem descrição disponível';

                overlayImage.src = imgSrc; // Define a imagem no overlay
                overlayCaption.textContent = caption; // Define a legenda
                overlay.style.display = 'flex'; // Exibe o overlay
            });
        });

        // Fecha o overlay ao clicar no botão de fechar
        closeOverlay.addEventListener('click', function() {
            overlay.style.display = 'none';
        });

        // Fecha o overlay ao clicar fora da imagem
        overlay.addEventListener('click', function(event) {
            if (event.target === overlay) {
                overlay.style.display = 'none';
            }
        });
    });
</script>