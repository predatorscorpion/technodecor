<?php
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size('300x300', 300, 300, true);
}

register_nav_menus( array(
	'top' => 'Top menu',
) );

//Custom post types
require_once(get_template_directory() . '/includes/functions/services.php');
require_once(get_template_directory() . '/includes/functions/productions.php');
require_once(get_template_directory() . '/includes/functions/productions-type.php');
require_once(get_template_directory() . '/includes/functions/interior-design-posts.php');


//Submit Call Form
require_once(get_template_directory().'/includes/functions/sign_up_form.php');
//Submit Contact Form
require_once(get_template_directory().'/includes/functions/contacts_form.php');


/**
 * Register menu item
 */
function mspgeneralSettingsMenu()
{
    add_menu_page("General settings", "General settings", "manage_options", "general-settings", "generalSettings", "dashicons-admin-generic");
}
add_action('admin_menu', 'mspgeneralSettingsMenu');

function generalSettings()
{
    if (!empty($_POST) && isset($_POST['save-general-settings'])) {
        if (wp_verify_nonce($_POST['verify-general-settings'],'save-general-settings')) {
            $email = trim($_POST['email']);
            $facebook = trim($_POST['facebook']);
            $google = trim($_POST['google']);
            $twitter = trim($_POST['twitter']);
            $linkedIn = trim($_POST['linkedin']);
            $youtube = trim($_POST['youtube']);

            $resEmailUpdate = update_option('technodecorEmail', $email);
            $resNetworkUpdate = update_option('networkData', [
                'email' => $email,
                'facebook' => $facebook,
                'google' => $google,
                'twitter' => $twitter,
                'linkedin' => $linkedIn,
                'youtube' => $youtube
            ]);

            if($resNetworkUpdate && $resEmailUpdate){
                echo "<div class='updated'><p><strong>Data saved successfully!</strong></p></div>";
            } else {
                echo "<div class='error'><p><strong>Error saving data!</strong></p></div>";
            }
        }
    }

    $technodecorEmail = get_option('technodecorEmail');
    $networkData = get_option('networkData');
?>

    <style>
        fieldset.contacts-container{
            width: 80%;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0px;
        }
        fieldset.contacts-container legend{
            font-size: 20px;
            font-weight: 700;
        }
        fieldset.contacts-container label{
            display: block;
            padding-bottom: 10px;
        }
        fieldset.contacts-container label span{
            font-weight: 700;
            font-size: 14px;
        }

        fieldset.contacts-container label input[type="text"],
        fieldset.contacts-container label input[type="email"] {
            border-radius: 5px;
            width: 100%;
            padding: 7px;
        }
    </style>

    <fieldset class="contacts-container">
        <legend>General settings</legend>
        <form method="post" action="/wp-admin/admin.php?page=general-settings">
            <?php wp_nonce_field('save-general-settings','verify-general-settings'); ?>
            <label>
                <span>E-mail:</span><br/>
                <input type="email" name="email" value="<?= $technodecorEmail; ?>" placeholder="E-mail" />
            </label>
            <label>
                <span>Facebook:</span><br/>
                <input type="text" name="facebook" value="<?= $networkData['facebook']; ?>" placeholder="Facebook" />
            </label>
            <label>
                <span>Google+:</span><br/>
                <input type="text" name="google" value="<?= $networkData['google']; ?>" placeholder="Google+" />
            </label>
            <label>
                <span>Twitter:</span><br/>
                <input type="text" name="twitter" value="<?= $networkData['twitter']; ?>" placeholder="Twitter" />
            </label>
            <label>
                <span>LinkedIn:</span><br/>
                <input type="text" name="linkedin" value="<?= $networkData['linkedin']; ?>" placeholder="LinkedIn" />
            </label>
            <label>
                <span>YouTube:</span><br/>
                <input type="text" name="youtube" value="<?= $networkData['youtube']; ?>" placeholder="YouTube" />
            </label>
            <input type="submit" value="Save" name="save-general-settings" class="button button-primary" />
        </form>
    </fieldset>

    <?php
}
