<?php 
/**
 * Template for single CPT Products
 */
get_header();
?>

<h1><?php the_title(); ?></h1>
<?php

$product_description = get_field('product_description');
$product_price = get_field('product_price');
$product_gallery = get_field('product_gallery');
?>

<p><?= $product_description ?></p>
<p><?= $product_price ?> RSD</p>

<div class="product-gallery">
    <?php
    if(!empty($product_gallery)):
        foreach($product_gallery as $image):
        ?>

        <img src="<?= $image ?>" alt="Slika proizvoda" width="400">

        <?php endforeach; 
    endif; 
    ?>
</div>

<?php
get_footer();
?>