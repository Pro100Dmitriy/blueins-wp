<?php
/**
 * The template for displaying the footer
 **/
?>


<footer class="footer">
    <!-- Footer -->

        <div class="footer__form">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer__form__container">
                            <div class="section-text">
                                <span class="section-text__title h2-style"><?php echo get_theme_mod('email_footer_header'); ?></span>
                                <p class="seciton-text__description regular-fiveteen"><?php echo get_theme_mod('email_footer_description'); ?></p>
                            </div>
                            <?php echo do_shortcode('[blueins_subscribe_form text="Email" button="Подписаться"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer__links">
            <div class="footer__links__top">
                <div class="container">
                    <div class="row">
                        <?php
                            $sectionTitle = explode( ' | ', get_theme_mod('section_footer') );
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <nav class="footer-menu collapsible">
                                <div class="footer-menu__title list-title medium-ninteen collaps-title" data-collapse="true" data-collapse-breakpoint="480"><?php echo $sectionTitle[0]; ?><span></span></div>
                                <div class="item__nav">
                                    <?php
                                    wp_nav_menu( [
                                        'menu'            => 'Users', 
                                        'container'       => false,
                                        'menu_class'      => 'footer-menu__list',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul class="footer-menu__list">%3$s</ul>',
                                        'depth'           => 1,
                                        'walker'          => new blueins_footer_walker_nav_menu
                                    ] );
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <nav class="footer-menu collapsible">
                                <div class="footer-menu__title list-title medium-ninteen collaps-title" data-collapse="true" data-collapse-breakpoint="480"><?php echo $sectionTitle[1]; ?><span></span></div>
                                <div class="item__nav">
                                    <?php
                                    wp_nav_menu( [
                                        'menu'            => 'Information', 
                                        'container'       => false,
                                        'menu_class'      => 'footer-menu__list',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul class="footer-menu__list">%3$s</ul>',
                                        'depth'           => 1,
                                        'walker'          => new blueins_footer_walker_nav_menu
                                    ] );
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <nav class="footer-menu collapsible">
                                <div class="footer-menu__title list-title medium-ninteen collaps-title" data-collapse="true" data-collapse-breakpoint="480"><?php echo $sectionTitle[2]; ?><span></span></div>
                                <div class="item__nav">
                                    <?php
                                    wp_nav_menu( [
                                        'menu'            => 'Shop', 
                                        'container'       => false,
                                        'menu_class'      => 'footer-menu__list',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul class="footer-menu__list">%3$s</ul>',
                                        'depth'           => 1,
                                        'walker'          => new blueins_footer_walker_nav_menu
                                    ] );
                                    ?>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <nav class="footer-menu">
                                <div class="footer-menu__title list-title medium-ninteen"><?php echo $sectionTitle[3]; ?></div>
                                <ul class="footer-menu__list">
                                    <li class="footer-menu__list__item">
                                        <p class="list-description light-seventeen"><?php echo get_theme_mod('text_social_footer'); ?></p>
                                    </li>
                                    <li class="footer-menu__list__item">
                                        <ul class="sub-menu-social">
                                            <li class="sub-menu-social__item">
                                                <a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'vk_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Vk.svg" alt="ВК"></a>
                                            </li>
                                            <li class="sub-menu-social__item">
                                                <a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'facebook_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Facebook.svg" alt="Facebook"></a>
                                            </li>
                                            <li class="sub-menu-social__item">
                                                <a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'instagram_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Instagram.svg" alt="Instagram"></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__links__information">
                <div class="container">
                    <div class="row">
                        <div class="footer__links__information__content">
                            <p class="lights-fiveteen"><?php echo get_theme_mod('owner_information_footer'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__links__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <nav class="footer-menu-bottom">
                                <?php
                                    
                                    wp_nav_menu( [
                                        'menu'            => 'AQ', 
                                        'container'       => false,
                                        'menu_class'      => 'footer-menu-bottom__list',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'items_wrap'      => '<ul class="footer-menu-bottom__list">%3$s</ul>',
                                        'depth'           => 1,
                                        'walker'          => new blueins_footer_qa_walker_nav_menu
                                    ] );
                
                                
                                ?>
                            </nav>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="footer-text-bottom lights-fiveteen"><?php echo get_theme_mod('copyright_footer'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Footer -->
    </footer>

    <!-- Scripts -->
    <?php wp_footer(); ?>

</body>
</html>