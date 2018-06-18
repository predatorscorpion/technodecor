<?php
if( ! defined('WP_UNINSTALL_PLUGIN') ) exit;

global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "technodecor_gallery`");
$wpdb->query("DROP TABLE IF EXISTS `" . $wpdb->prefix . "technodecor_gallery_photos`");

$allposts = get_posts([
    'numberposts' => -1,
    'post_type' => ['productions', 'service', 'interior-designs'],
    'post_status' => 'any'
]);
foreach( $allposts as $postinfo) {
    delete_post_meta($postinfo->ID, 'gallary-id');
}
