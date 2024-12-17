<div class="filter-area swiper-container">
    <form class="form-select flexrow swiper-wrapper" method="post">
        <input type="hidden" name="nonce" id='nonce' value="<?php echo wp_create_nonce('nathalie_mota_nonce'); ?>">
        <input type="hidden" name="ajaxurl" id='ajaxurl' value="<?php echo admin_url('admin-ajax.php'); ?>">
        <!--  -->
        <!-- $terms->term_id :  -->
        <!-- $terms->taxonomy : nom de la taxonomie -->
        <!-- $terms->name : nom de l'élément de la taxonomie -->
        <!-- $terms->term_taxonomy_id : n° de l'élément de la taxonomie -->
        <div class="filters">
            <select class="custom-select" id="categorie_id">
                <option value="">catégorie</option>
                <?php
                // Récupération des catégories pour les filtres
                $categories = get_terms('categorie');
                foreach ($categories as $category) {
                    echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
                }
                ?>
            </select>

            <select class="custom-select" id="format_id">
                <option value="">format</option>
                <?php
                // Récupération des formats pour les filtres
                $formats = get_terms('format');
                foreach ($formats as $format) {
                    echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
                }
                ?>
            </select>

            <select class="custom-select" id="date">
                <option value="DESC">Plus récent au plus ancien</option>
                <option value="ASC">Plus ancien au plus récent</option>
            </select>
        </div>
    </form>
</div>