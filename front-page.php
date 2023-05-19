<?php 
get_header();
?>

<h2>Proizvodi</h2>
<div class="homepage-ukidam-shop-wrapper">
        <?php
        // get all shop products
        $args = array(
            'post_type' => 'products',
            'posts_per_page' => 4,
        );
    
        $query = new WP_Query($args);
    
        if($query->have_posts()):
            while($query->have_posts()): $query->the_post();
            $product_description = get_field('product_description', $post->ID);
            $product_price = get_field('product_price', $post->ID);
            $product_gallery = get_field('product_gallery', $post->ID);
        ?>

    <div class="product_card">
        <h2><?php the_title(); ?></h2>
        <p><?= $product_description ?></p>
        <p><?= $product_price ?></p>         
        <div class="images-slider-wrapper">
            <?php if(!empty($product_gallery)):
            foreach($product_gallery as $image) {
            ?>
                <img src="<?= $image ?>" alt="Slika proizvoda" width="400">
            <?php
            }
            endif;
            ?>
        </div>         
    </div>

    <?php
            endwhile;
        endif;
        ?>
</div>

<?php
get_footer();
?>