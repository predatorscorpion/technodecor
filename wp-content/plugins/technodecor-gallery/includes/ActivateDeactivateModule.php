<?php

/**
 * Class ActivateDeactivateModule
 */
class ActivateDeactivateModule
{
    /**
     * Activate plugin
     */
    static function active_plugin()
    {
        global $wpdb;
        $galleryTable = $wpdb->prefix.'technodecor_gallery';
        $photosTable = $wpdb->prefix.'technodecor_gallery_photos';

        $sqlCreateTableGallery = "CREATE TABLE IF NOT EXISTS
                                        `".$galleryTable."` (
                                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `name` VARCHAR(255) NOT NULL,
                                            PRIMARY KEY(`id`)
                                        ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        $sqlCreateTableGalleryPhotos = "CREATE TABLE IF NOT EXISTS
                                        `".$photosTable."` (
                                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `gallery_id` INT(10) NOT NULL,
                                            `img_path` VARCHAR(255) NOT NULL,
                                            PRIMARY KEY(`id`)
                                        ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        if (!$wpdb->query($sqlCreateTableGallery) || !$wpdb->query($sqlCreateTableGalleryPhotos)) {
            exit($wpdb->last_error);
        }
    }

    /**
     * Deactivate plugin
     *
     * @return bool
     */
    static function deactive_plugin()
    {
        return true;
    }
}
