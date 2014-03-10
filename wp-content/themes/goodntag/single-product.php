<h1>Produit : <?php echo $post->post_title ?></h1>

Prix : <?php echo get_post_meta($post->ID, 'product_price', true) ?>
