<?php

/* Template Name: Production page */

require_once 'header.php';
global $post;

?>
<div class="page-content">
    <?php
        $productions = get_posts([
            'numberposts' => -1,
            'post_type' => 'productions',
            'orderby' => 'date',
            'order' => 'desc'
        ]);
        if ($productions):
    ?>
        <div class="block-heading">
            <h2><?= $post->post_title; ?></h2>
        </div>
        <div class="masonry-container">
            <div class="elements-gride">
                <?php foreach ($productions as $production):
                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($production->ID), 'full');
                    ?>
                    <div class="masonry-item">
                        <a href="<?php the_permalink($production->ID); ?>">
                            <h3><?= $production->post_title; ?></h3>
                            <img src="<?= $image_url[0]; ?>" alt="<?= $production->post_title; ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
