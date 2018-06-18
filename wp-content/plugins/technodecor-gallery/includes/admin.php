<?php

/* register menu item */
function mspGalleryAdminMenuSetup(){
    add_menu_page("Technodecor галерея", "Technodecor галерея", "edit_others_posts", "technodecor-gallery", "technodecorGallery", "dashicons-images-alt");

    add_submenu_page("technodecor-gallery", "Додати галерею", "Додати галерею", "edit_others_posts", "add-gallery", "addGallery");
    add_submenu_page("technodecor-gallery", "Додати фото до галереї", "Додати фото до галереї", "edit_others_posts", "add-photos-gallery", "addPhotosToGallery");
}
add_action('admin_menu', 'mspGalleryAdminMenuSetup');

function technodecorGallery()
{
    global $wpdb;
?>
    <link rel="stylesheet" type="text/css" href="<?= MSP_GALLERY_MODULE_URL; ?>src/css/technodecor-style.css" />

<?php

    if (isset($_POST['gallery-action']) && $_POST['gallery-action'] === 'edit') {
        foreach ($_POST['gallery-id'] as $key => $val) {
            $wpdb->update(
                $wpdb->prefix . 'technodecor_gallery',
                [
                    'name' => trim($_POST['gallery-name'][$key])
                ],
                [
                    'id' => $val
                ]
            );
        }
    } elseif (isset($_GET['action']) && isset($_GET['id'])) {
        if ($_GET['action'] === 'delete') {
            $wpdb->delete(
                $wpdb->prefix . 'technodecor_gallery',
                [
                    'id' => intval($_GET['id'])
                ]
            );
            echo "<meta http-equiv='refresh' content='0;url=/wp-admin/admin.php?page=technodecor-gallery'>";
            exit();
        }
    }
?>

    <h2>Список галерей</h2>
    <a href="/wp-admin/admin.php?page=add-gallery" class="button button-primary">Додати галерею</a>

<?php
    $galleries = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "technodecor_gallery ORDER BY id");

    if (count($galleries)):
?>
    <form method="post" action="/wp-admin/admin.php?page=technodecor-gallery">
        <input type="hidden" name="gallery-action" value="edit" />
        <table class="table-galleries">
            <tr>
                <td>№</td>
                <td>Назва</td>
                <td></td>
                <td></td>
            </tr>
<?php
        $index = 0;
        foreach ($galleries as $gallery):
            $index++;
?>
            <tr>
                <td><?= $index; ?></td>
                <td>
                    <input type="hidden" name="gallery-id[]" value="<?= $gallery->id; ?>" />
                    <input type="text" name="gallery-name[]" value="<?= $gallery->name; ?>" />
                </td>
                <td>
                    <a href="/wp-admin/admin.php?page=technodecor-gallery&action=delete&id=<?= $gallery->id; ?>"
                       onclick="if (confirm('Ви дійсно хочете видалити вибрану галерею?')) { return true; } else { return false; }" class="preview button">Видалити</a>
                </td>
            </tr>
<?php
        endforeach;
?>
        </table>
        <input type="submit" value="Зберегти" class="button button-primary" />
    </form>
<?php
    else:
        echo "<br/><br/><b>Не знайдено жодної галереї...</b>";
    endif;
}

function addGallery()
{
    global $wpdb;
?>
    <link rel="stylesheet" type="text/css" href="<?= MSP_GALLERY_MODULE_URL; ?>src/css/technodecor-style.css" />

<?php

    if (!empty($_POST) && wp_verify_nonce($_POST['gallery-check-name'], 'gallery-action') && trim($_POST['gallery-name'])) {
        $resAdd = $wpdb->insert(
            $wpdb->prefix . 'technodecor_gallery',
            [
                'name' => trim($_POST['gallery-name'])
            ]
        );

        if ($resAdd) {
            echo '<div class="updated notice notice-success"><strong>Галерея успішно додана!</strong></div>';
            echo "<meta http-equiv='refresh' content='0;url=/wp-admin/admin.php?page=technodecor-gallery'>";
            exit();
        } else {
            echo '<div class="notice notice-error"><strong>Помилка при додаванні галереї!</strong></div>';
            exit();
        }
    }
?>
    <h2>Додати нову галерею</h2>
    <form method="post" action="/wp-admin/admin.php?page=add-gallery">
        <?php wp_nonce_field('gallery-action','gallery-check-name', false); ?>
        <input type="text" name="gallery-name" placeholder="Введіть назву галереї..." style="width: 300px;" />
        <input type="submit" value="Додати" class="button button-primary" />
    </form>
<?php
}

function addPhotosToGallery()
{
    global $wpdb;
    $baseDir = wp_upload_dir()['basedir'];
    $galleryDirName = '/technodecor-gallery/';

    $galleries = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "technodecor_gallery ORDER BY id");

    if (isset($_POST['gallery-id']) && isset($_FILES['img'])) {
        if (!in_array($_FILES['img']['type'], ['image/jpg', 'image/jpeg', 'image/png'], true)) {
            echo '<div class="notice notice-error"><strong>Некоректний тип файлу! Використовуйте тільки .jpeg, .jpg or .png</strong></div>';
            exit();
        } elseif ($_FILES['img']['size'] > 1024 * 3 * 1024) {
            echo '<div class="notice notice-error"><strong>Розмір файлу більше 3 MB!</strong></div>';
            exit();
        } elseif (is_uploaded_file($_FILES['img']['tmp_name'])) {
            if (!file_exists($baseDir . $galleryDirName . $_POST['gallery-id'])) {
                mkdir($baseDir . $galleryDirName . $_POST['gallery-id'], 0755, true);
            }

            $fileName = $_FILES['img']['name'];
            $fileNameArr = explode('.', $fileName);
            $fileExtension = $fileNameArr[count($fileNameArr) - 1];
            $newFileName = md5($fileName . rand(0, 100)) . '.' . $fileExtension;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $baseDir . $galleryDirName . $_POST['gallery-id'] . '/' . $newFileName)) {
                $resInsert = $wpdb->insert(
                    $wpdb->prefix . 'technodecor_gallery_photos',
                    [
                        'gallery_id' => $_POST['gallery-id'],
                        'img_path' => $galleryDirName . $_POST['gallery-id'] . '/' . $newFileName
                    ],
                    ['%d', '%s']
                );

                if ($resInsert) {
                    echo '<div class="updated notice notice-success"><strong>Фото успішно додане!</strong></div>';
                    echo '<meta http-equiv="refresh" content="0;url=/wp-admin/admin.php?page=add-photos-gallery&gallery-id=' . $_POST['gallery-id'] . '">';
                    exit();
                } else {
                    echo '<div class="notice notice-error"><strong>Помилка при додаванні фото!</strong></div>';
                    exit();
                }
            }
        }
    } elseif (isset($_GET['action']) && isset($_GET['img_id']) && isset($_GET['gallery-id'])) {
        if ($_GET['action'] === 'delete') {
            $deletePhoto = $wpdb->get_row("SELECT img_path
                                           FROM " . $wpdb->prefix . "technodecor_gallery_photos
                                           WHERE id=" . $_GET['img_id']);

            if ($deletePhoto) {
                unlink($baseDir . $deletePhoto->img_path);
                $wpdb->delete(
                    $wpdb->prefix . 'technodecor_gallery_photos',
                    [
                        'id' => intval($_GET['img_id'])
                    ]
                );
            }
            echo '<meta http-equiv="refresh" content="0;url=/wp-admin/admin.php?page=add-photos-gallery&gallery-id=' . $_GET['gallery-id'] . '">';
            exit();
        }
    }
?>

    <link rel="stylesheet" type="text/css" href="<?= MSP_GALLERY_MODULE_URL; ?>src/css/technodecor-style.css" />
<?php


    if (count($galleries)):
        $selectedGallery = (isset($_GET['gallery-id'])) ? $_GET['gallery-id'] : $galleries[0]->id;
?>
    <h2>Виберіть галерею:</h2>
    <select name="gallery-id" onchange="document.location.href = '/wp-admin/admin.php?page=add-photos-gallery&gallery-id=' + jQuery(this).val();">
<?php
        foreach ($galleries as $gallery):
?>
            <option value="<?= $gallery->id; ?>"<?php if ($selectedGallery === $gallery->id): ?> selected<?php endif; ?>><?= $gallery->name; ?></option>
<?php
        endforeach;
?>
    </select>

        <h2>Завантажити фото до вибраної галереї</h2>
    <form method="post" action="/wp-admin/admin.php?page=add-photos-gallery" enctype="multipart/form-data">
        <input type="hidden" name="gallery-id" value="<?= $selectedGallery; ?>" />
        <input type="file" name="img" />
        <input type="submit" value="Завантажити" class="button button-primary" />
    </form>
<?php

    $photos = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "technodecor_gallery_photos
                                  WHERE gallery_id=" . $selectedGallery . "
                                  ORDER BY id DESC");

    if (count($photos) && file_exists($baseDir . $galleryDirName . $selectedGallery)): ?>
        <div class="img-container">
        <?php foreach ($photos as $photo): ?>
                <div class="img-item">
                    <img src="<?= wp_upload_dir()['baseurl'] . $photo->img_path ?>" style="width: 100%;" />
                    <a href="/wp-admin/admin.php?page=add-photos-gallery&action=delete&gallery-id=<?= $selectedGallery; ?>&img_id=<?= $photo->id; ?>"
                       onclick="if (confirm('Ви дійсно хочете видалити вибране фото?')) { return true; } else { return false; }" class="preview button">Видалити</a>
                </div>
        <?php endforeach; ?>
        </div>
<?php
    endif;
endif;
}

function addGallerybox() {
    $postTypes = [
        'productions',
        'service',
        'interior-designs'
    ];
    add_meta_box('gallery-box', 'Вибрати галерею', 'selectGallery', $postTypes, 'normal', 'high');
}
add_action('add_meta_boxes', 'addGallerybox');

function selectGallery()
{
    global $wpdb, $post;

    $gallaries = $wpdb->get_results("SELECT id, name FROM ".$wpdb->prefix."technodecor_gallery");

    if (count($gallaries)):
        $currentGalleryId = get_post_meta($post->ID, 'gallary-id', true);
        wp_nonce_field(plugin_basename(__FILE__), 'post_gallary_check', false);
?>
        <select name="technodecor-gallery" style="width: 100%;">
            <option value="0">-</option>
<?php
            foreach ($gallaries as $gallary):
?>
                <option value="<?= $gallary->id; ?>"<?php if ($gallary->id == $currentGalleryId): ?> selected<?php endif; ?>><?= $gallary->name; ?></option>
<?php
            endforeach;
?>
        </select>
<?php
    else:
        echo "<br/><br/><b>Не знайдено жодної галереї...</b>";
    endif;
}

function savePostGallary($post_id)
{
    global $wpdb;

    if (!wp_verify_nonce($_POST['post_gallary_check'], plugin_basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' == $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
        return $post_id;
    } elseif (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    if (!isset($_POST['technodecor-gallery']) || intval($_POST['technodecor-gallery']) == 0) {
        delete_post_meta($post_id, 'gallary-id');
    } else {
        update_post_meta($post_id, 'gallary-id', intval($_POST['technodecor-gallery']));
    }
}

add_action('save_post', 'savePostGallary');
