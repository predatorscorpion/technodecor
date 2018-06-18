<?php

/* Template Name: Services page */

require_once 'header.php';
global $post;

?>
<div class="page-content">
    <div class="block-heading">
        <h2><?= $post->post_title; ?></h2>
    </div>
    <?php
    $services = get_posts([
        'numberposts' => -1,
        'post_type' => 'service',
        'orderby' => 'date',
        'order' => 'desc'
    ]);
    if($services):?>
        <div class="masonry-container">
            <div class="elements-gride">
                <?php foreach ($services as $service):
                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($service->ID), 'full');
                    ?>
                    <div class="masonry-item">
                        <a href="<?php the_permalink($service->ID); ?>">
                            <h3><?= $service->post_title; ?></h3>
                            <img src="<?= $image_url[0]; ?>" alt="<?= $service->post_title; ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
