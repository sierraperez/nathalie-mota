<div class="hero-header">
        <?php
            $args = array(
            'post_type' => 'photo', 
            'tax_query' => array(
                array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => 'paysage',
                ),
            ),
            'orderby' => 'rand',
            'posts_per_page' => '1',
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); 
                    if (has_post_thumbnail()) : ?>
                    <a href="<?= the_permalink() ?>" alt="<?= the_title() ?>"> 
                        <?= the_post_thumbnail("hero" , ['class' => 'hero-header__img']); ?>
                        <h1 class="hero-header__page-title">Photographe Event</h1>
                    </a>
                <?php endif; 
                }
            } else {
                esc_html_e( 'Sorry, no posts matched your criteria.' );
            }
            // Restore original Post Data.
            wp_reset_postdata();
        ?>
    </div>