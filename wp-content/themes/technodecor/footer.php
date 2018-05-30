<?php
	/**
	 * Template Footer
	 */
?>
<footer>
	<?php wp_footer(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 logo">
                <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/images/logo.gif" alt="<?= $arrayLang['technodecor']; ?>"></a>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-6">
                <address>
                    <ul>
                        <li class="email"><a href="mailto:technodecor@ukr.net">technodecor@ukr.net</a></li>
                        <li class="phone"><a href="tel:+38 (032) 255-53-77" >+38 (032) 255-53-77</a> - Call Center</li>
                        <li class="phone"><a href="tel:+38 (099) 255-53-77" >+38‎ (099) 483-79-48</a> - Дизайн інтер'єру</li>
                        <li class="address"><a href="https://goo.gl/maps/Tz7Lkz6K9Po" target="_blank"><span>79000, Україна, Львівська обл., Львів, вул. Огієнка 7</span></a></li>
                        <li class="more-contacts"><a href="<? if ($currentLang != $defaultLang): ?>/<?= $currentLang; ?><? endif; ?>/contacts/"><?= $arrayLang['more-contacts'] ?></a></li>
                    </ul>
                </address>
                <div class="social-links">
                    <ul>
                        <li><a href="https://www.facebook.com/%D0%A2%D0%B5%D1%85%D0%BD%D0%BE%D0%BB%D0%BE%D0%B3%D1%96%D1%97-%D0%94%D0%B5%D0%BA%D0%BE%D1%80%D1%83-1629017373995554/" class="facebook" target="_blank"></a></li>
                        <li><a href="https://plus.google.com/u/0/+%D0%A2%D0%B5%D1%85%D0%BD%D0%BE%D0%BB%D0%BE%D0%B3%D1%96%D1%97%D0%B4%D0%B5%D0%BA%D0%BE%D1%80%D1%83%D0%9B%D1%8C%D0%B2%D1%96%D0%B2" class="google" target="_blank"></a></li>
                        <li><a href="https://twitter.com/tehnodecor" class="twitter" target="_blank"></a></li>
                        <li><a href="https://www.linkedin.com/feed/" class="linkedin" target="_blank"></a></li>
                        <li><a href="https://www.youtube.com/channel/UCr3wp12h7dy2Aw1KLEPdWdw" class="youtube" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
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
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/src/js/custom.js"></script>

</body>
</html>