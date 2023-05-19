<?php 
/**
 * Template for custom taxonomy 'Vrsta'
 */
?>

<?php

$term_name = get_queried_object()->name;
$term_id = get_queried_object()->term_id;

$args = array(
    'post_type' => 'proizvodi',
    'tax_query' => array(
        array(
        'taxonomy' => 'vrsta',
        'field' => 'term_id',
        'terms' => $term_id,
         )
      )
    );
    $query = new WP_Query( $args );
?>

<h1><?= $term_name; ?></h1>


<?php
    if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            the_title();
        endwhile;
    endif;
?>