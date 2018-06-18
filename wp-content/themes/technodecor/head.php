<?php
/**
 * Template Header
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php wp_head(); ?>
        <title>
            <?php
            global $page, $paged;
            wp_title( '|', true, 'right' );
            bloginfo( 'name' );
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
            ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="<?= get_template_directory_uri(); ?>/images/favicon.ico" sizes="32x32" />
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/src/css/bootstrap.css">
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/src/css/slick.css">
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/src/css/slick-theme.css">
        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/src/css/style.css">
    </head>
    <body>

<?php
    $currentLang = pll_current_language();
    $defaultLang = pll_default_language();
    $arrayLang = parse_ini_file("lang/".$currentLang.".ini");
    $langAddress = parse_ini_file("lang/address-".$currentLang.".ini");

    $technodecorEmail = get_option('technodecorEmail');
    if (!$technodecorEmail) {
        $technodecorEmail = 'technodecor@ukr.net';
    }
