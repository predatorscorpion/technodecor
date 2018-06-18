<?php
if ($galleryId = get_post_meta($post->ID, 'gallary-id', true)):
    $photos = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "technodecor_gallery_photos
                                  WHERE gallery_id=" . $galleryId . "
                                  ORDER BY id DESC");

    if (count($photos)): ?>
        <section class="galleries-for slider">
            <?php foreach ($photos as $photo): ?>
                <div>
                    <img src="<?= wp_upload_dir()['baseurl'] . $photo->img_path; ?>" alt="<?= $post->post_title; ?>" />
                </div>
            <?php endforeach; ?>
        </section>
        <section class="galleries-nav slider">
            <?php foreach ($photos as $photo): ?>
                <div>
                    <img src="<?= wp_upload_dir()['baseurl'] . $photo->img_path; ?>" alt="<?= $post->post_title; ?>" />
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif;
endif;
