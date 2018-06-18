<?php require_once 'head.php'; ?>
<header>
    <div class="promo-block" data-path-to-theme="<?= get_template_directory_uri(); ?>">
        <div class="main-slider" data-images="img1.jpg img2.jpg">
            <div class="logo">
                <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/images/logo.png" alt="<?= get_bloginfo(); ?>"></a>
                <a href="<?= home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/images/logo-text.png" class="logo-text" alt="<?= get_bloginfo(); ?>"></a>
            </div>
        </div>
    </div>
    <div class="lang-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 menu">
                    <div class="menu__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <?php wp_nav_menu(array('menu' => 'Top-menu-'.$currentLang)); ?>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 lang-filter">
                    <ul><?php pll_the_languages(array('show_flags' => 0, 'show_names' => 0, 'display_names_as' => 'slug')); ?></ul>
                </div>
            </div>
        </div>
    </div>
</header>
