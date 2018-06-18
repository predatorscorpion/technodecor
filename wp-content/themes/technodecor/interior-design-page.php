<?php

/* Template Name: Interior design page */

require_once 'header.php';
global $post;

?>
<div class="page-content">
    <div class="block-heading">
        <h2><?= $post->post_title; ?></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-info interior-design">
                <?= $post->post_content;
                require_once(get_template_directory() . '/includes/gallery-template.php');

                $interiorDesigns = get_posts([
                    'numberposts' => -1,
                    'post_type' => 'interior-designs',
                    'orderby' => 'date',
                    'order' => 'desc'
                ]);

                if ($interiorDesigns):
                ?>
                <ul class="interior-designs">
                    <?php foreach ($interiorDesigns as $interiorDesign): ?>
                        <li>
                            <a href="<?php the_permalink($interiorDesign->ID); ?>"><?= $interiorDesign->post_title; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>