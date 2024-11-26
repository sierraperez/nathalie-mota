<?php
$photo_terms = wp_get_object_terms($post->ID,  'categorie', array('fields' => 'ids'));
$args = array(
    'post_type' => 'photo',
    'post__not_in' => array($post->ID),
    'posts_per_page' => 2,
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie',
            'field' => 'id',
            'terms' => $photo_terms,
        ),
    ),
);
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
?>
     <?php get_template_part('template-parts/photo/one-photo') ?>
<?php }
}
?>