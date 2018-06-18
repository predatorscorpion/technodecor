<?php

/* Template Name: Contacts page */

require_once 'header.php';
global $post;

?>
<div class="page-content">
    <div class="block-heading">
        <h2><?= $post->post_title; ?></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 contacts-list">
                <address>
                    <ul>
                        <li class="phone"><a href="tel:+38 (096) 140-35-36">+38 (096) 140-35-36</a> - <?= $arrayLang['decorative-plaster']; ?></li>
                        <li class="phone"><a href="tel:+38 (067) 674-27-64">+38 (067) 674-27-64</a> - <?= $arrayLang['custom-made-furniture']; ?></li>
                        <li class="phone"><a href="tel:+38 (032) 255-53-77">+38 (032) 255-53-77</a> - <?= $arrayLang['call-center']; ?></li>
                        <li class="phone"><a href="tel:+38 (098) 868-81-09">+38 (098) 868-81-09</a> - <?= $arrayLang['repair-construction-works']; ?></li>
                        <li class="phone"><a href="tel:+38 (099) 255-53-77">+38‎ (099) 483-79-48</a> - <?= $arrayLang['interior-design']; ?></li>
                        <li class="address"><a href="<?= $langAddress['main-address-link']; ?>" target="_blank"><span><?= $langAddress['main-address']; ?></span></a></li>
                        <li class="address"><a href="<?= $langAddress['address-kyiv-link']; ?>" target="_blank"><span><?= $langAddress['address-kyiv']; ?></span></a></li>
                        <li class="phone"><a href="tel:+38 (095) 127-98-55">+38 (095) 127-98-55</a></li>
                    </ul>
                    <ul>
                        <li class="address"><a href="<?= $langAddress['address-kamien-kashirsky-link']; ?>" target="_blank"><span><?= $langAddress['address-kamien-kashirsky']; ?></span></a></li>
                        <li class="phone"><a href="tel:+38 (097) 25-40-613">+38 (097) 25-40-613</a></li>
                    </ul>
                    <ul>
                        <li class="address"><a href="<?= $langAddress['address-lviv-link']; ?>" target="_blank"><span><?= $langAddress['address-lviv']; ?></span></a></li>
                        <li class="email"><a href="mailto:<?= $technodecorEmail; ?>"><?= $technodecorEmail; ?></a></li>
                    </ul>
                </address>
            </div>
            <div class="col-lg-6 col-md-6">
                <h3 class="feedback"><?= $arrayLang['feedback']; ?></h3>
                <form action="javascript:void(null);" method="post" class="contacts-form">
                    <input type="text" name="name" placeholder="<?= $arrayLang['your-name']; ?>" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-name'] ?>" />
                    <input type="email" name="e-mail" placeholder="<?= $arrayLang['email']; ?>" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-email'] ?>" />
                    <textarea name="user-comments" placeholder="<?= $arrayLang['message']; ?>" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-tel']; ?>"></textarea>
                    <div class="div-img-loader">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/img_ajax_loader.gif" alt="ajax_loader" />
                    </div>
                    <div class="text-center">
                        <input type="submit" value="<?= $arrayLang['submit']; ?>" />
                    </div>
                    <p class="message-successfully-submitted"><?= $arrayLang['message-successfully-submitted']; ?></p>
                    <p class="error-while-submitting-message"><?= $arrayLang['error-while-submitting-message']; ?></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>