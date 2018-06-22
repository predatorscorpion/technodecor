<?php

/* Template Name: Home page */

require_once 'header.php';
global $post;

?>
<div class="page-content">
    <?php
    $services = get_posts([
        'numberposts' => 10,
        'post_type' => 'service',
        'orderby' => 'date',
        'order' => 'desc'
    ]);
    if($services):?>
        <div class="block-heading">
            <h2><?= $arrayLang['services']; ?></h2>
        </div>
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
        <?php if (wp_count_posts('service')->publish > 10): ?>
            <div class="link-more">
                <a href="<? if ($currentLang != $defaultLang): ?>/<?= $currentLang; ?><? endif; ?>/services"><?= $arrayLang['all-services']; ?></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php
        $productions = get_posts([
            'numberposts' => 10,
            'post_type' => 'productions',
            'orderby' => 'date',
            'order' => 'desc'
        ]);
        if ($productions):
    ?>
        <div class="block-heading">
            <h2><?= $arrayLang['production']; ?></h2>
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
        <?php if (wp_count_posts('production')->publish > 10): ?>
            <div class="link-more">
                <a href="<? if ($currentLang != $defaultLang): ?>/<?= $currentLang; ?><? endif; ?>/production"><?= $arrayLang['all-production']; ?></a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php require_once 'footer.php'; ?>