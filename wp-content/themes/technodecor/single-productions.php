<?php
require_once 'header.php';
global $post;

?>
    <div class="page-content">
        <div class="block-heading">
            <h2><?= $post->post_title; ?></h2>
        </div>
        <?php
        $productionType = get_posts([
            'numberposts' => -1,
            'post_type' => 'production-type',
            'meta_key' => 'parent_production',
            'meta_value' => $post->ID,
            'orderby' => 'date',
            'order' => 'desc'
        ]);
        if ($productionType): ?>
            <div class="masonry-container">
                <div class="elements-gride">
                    <?php foreach ($productionType as $production):
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-info">
                    <?= $post->post_content; ?>
                    <?php require_once(get_template_directory() . '/includes/gallery-template.php'); ?>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>