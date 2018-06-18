<?php
	/**
	 * Template Footer
	 */
?>
<footer>
	<?php wp_footer(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 logo">
                <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/images/logo.png" alt="<?= get_bloginfo(); ?>"></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <address>
                    <ul>
                        <li class="email"><a href="mailto:<?= $technodecorEmail; ?>"><?= $technodecorEmail; ?></a></li>
                        <li class="phone"><a href="tel:+38 (032) 255-53-77">+38 (032) 255-53-77</a> - <?= $arrayLang['call-center']; ?></li>
                        <li class="phone"><a href="tel:+38 (099) 255-53-77">+38‎ (099) 483-79-48</a> - <?= $arrayLang['interior-design']; ?></li>
                        <li class="address"><a href="<?= $langAddress['main-address-link']; ?>" target="_blank"><span><?= $langAddress['main-address']; ?></span></a></li>
                        <li class="more-contacts"><a href="<? if ($currentLang != $defaultLang): ?>/<?= $currentLang; ?><? endif; ?>/contacts"><?= $arrayLang['more-contacts'] ?></a></li>
                    </ul>
                </address>
                <?php
                    $networkData = get_option('networkData');

                    if($networkData):
                        $facebookLink = ($networkData['facebook']) ? $networkData['facebook'] : '#';
                        $twitterLink = ($networkData['twitter']) ? $networkData['twitter'] : '#';
                        $googleLink = ($networkData['google']) ? $networkData['google'] : '#';
                        $linkedInLink = ($networkData['linkedin']) ? $networkData['linkedin'] : '#';
                        $youtubeLink = ($networkData['youtube']) ? $networkData['youtube'] : '#';
                    ?>
                        <div class="social-links">
                            <ul>
                                <li><a href="<?= $facebookLink; ?>" class="facebook" target="_blank"></a></li>
                                <li><a href="<?= $googleLink; ?>" class="google" target="_blank"></a></li>
                                <li><a href="<?= $twitterLink; ?>" class="twitter" target="_blank"></a></li>
                                <li><a href="<?= $linkedInLink; ?>" class="linkedin" target="_blank"></a></li>
                                <li><a href="<?= $youtubeLink; ?>" class="youtube" target="_blank"></a></li>
                            </ul>
                        </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <h3><?= $arrayLang['feedback']; ?></h3>
                <form action="javascript:void(null);" method="post" class="sign-up-form" data-message-success="<?= $arrayLang['thank-you']; ?>" data-message-default="<?= $arrayLang['submit']; ?>">
                    <input type="text" name="name" placeholder="<?= $arrayLang['your-name']; ?>" class="hvr-shadow" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-name']; ?>">
                    <input type="email" name="e-mail" placeholder="<?= $arrayLang['email']; ?>" class="hvr-shadow" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-email']; ?>">
                    <textarea name="message" placeholder="<?= $arrayLang['message']; ?>" class="hvr-shadow" data-toggle="tooltip" data-placement="top" data-trigger="manual" data-original-title="<?= $arrayLang['tooltip-message']; ?>"></textarea>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img_ajax_loader.gif" alt="ajax_loader" />
                    <input type="submit" value="<?= $arrayLang['submit']; ?>">
                    <p class="error-while-submitting-message"><?= $arrayLang['error-while-submitting-message']; ?></p>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copyright">
                Copyright &copy; <?= date('Y'); ?> <?= get_bloginfo(); ?>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/jquery.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/slick.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/custom.js"></script>

</body>
</html>