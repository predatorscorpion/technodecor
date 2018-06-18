<?php
require_once 'header.php';
global $post;

?>
<div class="page-content">
    <div class="block-heading">
        <h2><?= $post->post_title; ?></h2>
    </div>
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