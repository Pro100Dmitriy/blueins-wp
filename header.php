<?php
/**
 * The template for displaying the header
 **/

//<title><?php bloginfo('name'); echo ' | '; bloginfo('description'); </title>
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>
<body>


<?php do_shortcode('[blu_woo_get_notification]') ?>

<?php wp_body_open(); ?>

    <div id="fullscreen-menu" class="fullscreen-menu"> 
        <div class="container">
            <div class="close-fullscreen-button-cover">
                <button id="close-fullscreen-menu-button" class="close-button">Close Fullscreen Menu</button>
            </div>
            <nav class="fullscreen-menu__nav">
                <?php
                                
                    wp_nav_menu( [
                        'menu'            => 'Main', 
                        'container'       => false,
                        'menu_class'      => 'fullscreen__nav__list',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul class="fullscreen__nav__list">%3$s</ul>',
                        'depth'           => 3,
                        'walker'          => new blueins_fullscreen_walker_nav_menu
                    ] );

                
                ?>
            </nav>
            <div class="fullscreen-menu__additional">
                <nav class="fullscreen-menu__additional__user-page">
                    <ul class="fullscreen-menu__additional__user-page__links">
                        <li class="fullscreenuser-page__links__user-profile">
                            <?php
                                if( !is_user_logged_in() ){
                            ?>
                                <a class="light-seventeen" href="<?php echo get_permalink(23); ?>">Войти / Зарегистрироваться</a>
                            <?php }else{ 
                                global $current_user;
                                wp_get_current_user();
                            
                                //echo 'Username: ' . $current_user->user_login . "\n";
                                //echo 'User email: ' . $current_user->user_email . "\n";
                                //echo 'User first name: ' . $current_user->user_firstname . "\n";
                                //echo 'User last name: ' . $current_user->user_lastname . "\n";
                                //echo 'User display name: ' . $current_user->display_name . "\n";
                                //echo 'User ID: ' . $current_user->ID . "\n";
                                ?>
                                <a class="light-seventeen" href="<?php echo get_permalink(23); ?>">
                                    <div class="blueins-user-avatar-cover">
                                        <?php echo get_avatar( $current_user->ID, 45 ); ?>
                                    </div>  
                                    <span class="blueins-user-avatar-name"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></span>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </nav>
                <nav class="fullscreen-menu__additional__social-menu">
                    <p class="regular-fiveteen">Подписаться на нас:</p>
                    <ul class="fullscreen-menu__additional__social-menu__links">
                        <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'vk_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Vk.svg" width="33px" height="33px" alt="Меню"></a></li>
                        <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'facebook_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Facebook.svg" width="33px" height="33px" alt="Меню"></a></li>
                        <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'instagram_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Dark/Instagram.svg" width="33px" height="33px" alt="Меню"></a></li>
                    </ul>   
                </nav> 
            </div>
        </div>
    </div>

    <?php
        if( is_cart() || is_checkout() ){

        }else{
    ?>
    <!-- Cart -->
    <div id="cart-menu" class="cart-menu">
        <div class="cart__top">
            <h3 class="h3-style"><?php esc_html_e( 'Cart', 'woocommerce' ); ?></h3>
            <button id="blueins-close-mini-cart-button" class="close-button">Close Mini Cart</button>
        </div>
        <div class="blueins_cart_center">
            <?php
                /**
                 * Functions hooked into storefront_header action
                 *
                 * @hooked storefront_header_container                 - 0
                 * @hooked storefront_skip_links                       - 5
                 * @hooked storefront_social_icons                     - 10
                 * @hooked storefront_site_branding                    - 20
                 * @hooked storefront_secondary_navigation             - 30
                 * @hooked storefront_product_search                   - 40
                 * @hooked storefront_header_container_close           - 41
                 * @hooked storefront_primary_navigation_wrapper       - 42
                 * @hooked storefront_primary_navigation               - 50
                 * @hooked storefront_header_cart                      - 60
                 * @hooked storefront_primary_navigation_wrapper_close - 68
                 */
                do_action( 'blueins_header' );
            ?>
        </div>      
    </div>
    <div id="cart-overlay" class="cart-overlay"></div>
    <!-- Cart -->
    <?php
        }
    ?>

    <!-- Go to tooop! -->
    <button id="go-to-top" class="go-to-top hidden">
        <span></span>
    </button>
    <!-- Go to tooop! -->


    <header class="header">
    <!-- Header -->
        <div class="header__top">
            <div class="big-container">
                <div class="header__top__content">
                    <div class="header__top__content__left">
                        <nav class="social-menu">
                            <ul class="social-menu__links">
                                <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'vk_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Small/Vk.svg" width="33px" height="33px" alt="Меню"></a></li>
                                <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'facebook_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Small/Facebook.svg" width="33px" height="33px" alt="Меню"></a></li>
                                <li><a rel="nofollow" target="_blank" href="<?php echo get_theme_mod( 'instagram_header' ); ?>"><img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Small/Instagram.svg" width="33px" height="33px" alt="Меню"></a></li>
                            </ul>   
                        </nav>    
                        <nav class="site-menu">    
                            <?php                              
                                wp_nav_menu( [
                                    'menu'            => 'AQ', 
                                    'container'       => false,
                                    'menu_class'      => 'site-menu__links',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'items_wrap'      => '<ul class="site-menu__links">%3$s</ul>',
                                    'depth'           => 1
                                ] );                         
                            ?>
                        </nav>                  
                    </div>
                    <div class="header__top__content__right">
                        <div class="phone">
                            <img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Small/Phone.svg" width="33px" height="33px" alt="Меню">
                            <p class="light-thirteen"><a href="tel:<?php echo get_theme_mod( 'phone_header' ); ?>"><?php echo get_theme_mod( 'phone_header' ); ?></a></p>
                        </div>
                        <div class="time_work">
                            <img src="<?php echo bloginfo('template_url') . "/assets/img/" ?>Icon/Small/Clock.svg" width="33px" height="33px" alt="Меню">
                            <p class="light-thirteen"><?php 
                                echo get_theme_mod( 'time_header' );
                                //echo esc_html( get_option( 'time_work', '' ) ); 
                            ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header__bottom-cover" class="header__bottom-cover">
            <div class="header__bottom  <?php  echo $args; ?>">
                <div class="big-container">
                    <div class="header__bottom__content">
                        <div class="header__bottom__content__left">
                            <div class="burger">
                                <button name="burger" id="burger__button" class="burger__button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><g transform="translate(12 -61)"><g transform="translate(0 82.733)"><g transform="translate(0 0)"><path d="M20.7,236H.842a.842.842,0,0,0,0,1.683H20.7a.842.842,0,0,0,0-1.683Z" transform="translate(0 -236)" fill="#fff"/></g></g><g transform="translate(0 76)"><path d="M20.7,76H.842a.842.842,0,1,0,0,1.683H20.7A.842.842,0,1,0,20.7,76Z" transform="translate(0 -76)" fill="#fff"/></g><g transform="translate(0 89.466)"><g transform="translate(0 0)"><path d="M20.7,396H.842a.842.842,0,1,0,0,1.683H20.7a.842.842,0,1,0,0-1.683Z" transform="translate(0 -396)" fill="#fff"/></g></g></g><rect width="45" height="45" fill="none"/></svg>
                                </button>
                            </div>
                            <nav class="main-menu"> 
                                <?php
                                
                                wp_nav_menu( [
                                    'menu'            => 'Main', 
                                    'container'       => false,
                                    'menu_class'      => 'main-menu__links',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'items_wrap'      => '<ul class="main-menu__links">%3$s</ul>',
                                    'depth'           => 3,
                                    'walker'          => new blueins_walker_nav_menu
                                ] );
                                
                                ?>
                            </nav>
                        </div>
                        <div class="header__bottom__content__center">
                            <a href="<?php echo get_home_url(); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><defs><style>.a{fill:#fff;}.b{fill:none;}</style></defs><g transform="translate(17 17)"><g transform="translate(0 0)"><path class="a" d="M238.963,224.959,244.205,230v7.675l-5.242,5.038h-6.892l-5.242-5.038V230l5.242-5.038h6.892m.788-1.959h-8.469l-6.413,6.163v9.344l6.413,6.162h8.469l6.413-6.162v-9.344Z" transform="translate(-202.844 -201.157)"/><path class="a" d="M89.015,81.33l3.756,7.093a3.314,3.314,0,0,1-.061,3.369,3.4,3.4,0,0,1-4.619,1.32l-7.1-3.74c.3-.229.621-.456.957-.677a3.1,3.1,0,0,0,.959-4.178,10.236,10.236,0,0,1-.979-2.235,10.221,10.221,0,0,1,2.239.973,3.1,3.1,0,0,0,4.175-.969c.219-.336.446-.657.674-.958M89.47,78A14.47,14.47,0,0,0,86.7,81.216a1.14,1.14,0,0,1-1.537.355,12.052,12.052,0,0,0-5.379-1.646c-.14,0-.209.012-.2.028h0a11.033,11.033,0,0,0,1.635,5.569,1.139,1.139,0,0,1-.351,1.538,14.414,14.414,0,0,0-3.209,2.776l9.519,5.011a5.408,5.408,0,0,0,7.325-7.34Z" transform="translate(-70.053 -70.36)"/><path class="a" d="M257.6,1.376h0m-1.39,1.966a9.668,9.668,0,0,1,.9,2.234,3.094,3.094,0,0,0,3.636,2.26c.322-.068.719-.141,1.155-.2l-2.364,7.683a3.467,3.467,0,0,1-6.625.009L250.53,7.649c.437.059.834.131,1.156.2a3.1,3.1,0,0,0,3.63-2.262,9.662,9.662,0,0,1,.9-2.236m0-3.342a12.162,12.162,0,0,0-2.793,5.088,1.141,1.141,0,0,1-1.1.86,1.175,1.175,0,0,1-.232-.024,16.3,16.3,0,0,0-3.2-.359,9.561,9.561,0,0,0-1.034.053l3.192,10.285a5.429,5.429,0,0,0,10.373-.011l3.163-10.3a9.851,9.851,0,0,0-1.008-.05,16.2,16.2,0,0,0-3.225.367,1.126,1.126,0,0,1-.234.024,1.14,1.14,0,0,1-1.1-.858A12.164,12.164,0,0,0,256.207,0Z" transform="translate(-223.573 0)"/><path class="a" d="M416.608,80.973c.229.3.456.621.677.957a3.1,3.1,0,0,0,4.178.959,10.168,10.168,0,0,1,2.236-.979,10.255,10.255,0,0,1-.974,2.238,3.091,3.091,0,0,0,.969,4.175c.336.22.657.446.958.675l-7.091,3.762a3.4,3.4,0,0,1-4.624-1.313,3.314,3.314,0,0,1-.067-3.367l3.738-7.107m-.461-3.33-5.011,9.518a5.408,5.408,0,0,0,7.341,7.323l9.5-5.035a14.448,14.448,0,0,0-3.216-2.768,1.14,1.14,0,0,1-.355-1.537,11.021,11.021,0,0,0,1.622-5.574h0c.017-.017-.05-.028-.186-.028a12.1,12.1,0,0,0-5.381,1.658,1.137,1.137,0,0,1-1.537-.351,14.465,14.465,0,0,0-2.776-3.209Z" transform="translate(-370.278 -70.035)"/><path class="a" d="M7.64,251.186l7.685,2.367a3.467,3.467,0,0,1,.01,6.625l-7.686,2.386c.05-.375.117-.762.2-1.155a3.094,3.094,0,0,0-2.262-3.63,9.7,9.7,0,0,1-2.247-.9,9.711,9.711,0,0,1,2.24-.9,3.1,3.1,0,0,0,2.26-3.64c-.082-.392-.15-.784-.2-1.154M5.6,248.51a14.562,14.562,0,0,0,.317,4.232,1.14,1.14,0,0,1-.834,1.337A12.145,12.145,0,0,0,0,256.884a12.157,12.157,0,0,0,5.093,2.793,1.141,1.141,0,0,1,.836,1.335,14.435,14.435,0,0,0-.307,4.233l10.292-3.2a5.427,5.427,0,0,0-.012-10.368Z" transform="translate(0 -224.169)"/><path class="a" d="M90.069,412.839a3.53,3.53,0,0,1,2.978,1.743,3.314,3.314,0,0,1,.067,3.366l-3.74,7.1c-.229-.3-.455-.621-.676-.956a3.1,3.1,0,0,0-4.178-.958,10.236,10.236,0,0,1-2.236.979,10.234,10.234,0,0,1,.974-2.238,3.092,3.092,0,0,0-.969-4.175c-.336-.22-.657-.447-.959-.675l7.092-3.757a3.5,3.5,0,0,1,1.648-.429h0m0-1.959a5.448,5.448,0,0,0-2.568.655L78,416.573a14.471,14.471,0,0,0,3.216,2.768,1.139,1.139,0,0,1,.355,1.537,11.023,11.023,0,0,0-1.62,5.572h0c-.017.017.05.028.186.028a12.094,12.094,0,0,0,5.381-1.659,1.14,1.14,0,0,1,1.538.352,14.435,14.435,0,0,0,2.776,3.209l5.016-9.52a5.447,5.447,0,0,0-4.777-7.98Z" transform="translate(-70.36 -370.635)"/><path class="a" d="M477.784,250.531c-.051.374-.117.761-.2,1.155a3.1,3.1,0,0,0,2.268,3.63,9.667,9.667,0,0,1,2.241.9,9.7,9.7,0,0,1-2.239.905,3.1,3.1,0,0,0-2.26,3.635c.083.392.15.784.2,1.155l-7.691-2.368a3.466,3.466,0,0,1-.01-6.624l7.685-2.386m2.027-2.681-10.293,3.2a5.427,5.427,0,0,0,.013,10.368l10.3,3.172a14.6,14.6,0,0,0-.316-4.232,1.139,1.139,0,0,1,.834-1.337,12.167,12.167,0,0,0,5.086-2.805,12.166,12.166,0,0,0-5.093-2.793,1.139,1.139,0,0,1-.836-1.335,14.5,14.5,0,0,0,.307-4.233Z" transform="translate(-420.087 -223.573)"/><path class="a" d="M256.863,467.772a3.374,3.374,0,0,1,3.312,2.44l2.382,7.677c-.436-.059-.833-.131-1.155-.2a3.175,3.175,0,0,0-.63-.065,3.1,3.1,0,0,0-3,2.334,9.671,9.671,0,0,1-.9,2.237,9.687,9.687,0,0,1-.9-2.235,3.1,3.1,0,0,0-3-2.326,3.174,3.174,0,0,0-.638.066c-.322.069-.719.142-1.155.2l2.368-7.686a3.374,3.374,0,0,1,3.314-2.449m0-1.959a5.329,5.329,0,0,0-5.191,3.83l-3.166,10.292a9.567,9.567,0,0,0,1.008.05,16.28,16.28,0,0,0,3.224-.366,1.137,1.137,0,0,1,1.337.834,12.173,12.173,0,0,0,2.8,5.087,12.163,12.163,0,0,0,2.789-5.093,1.141,1.141,0,0,1,1.1-.861,1.111,1.111,0,0,1,.232.024,16.3,16.3,0,0,0,3.2.359,9.825,9.825,0,0,0,1.035-.052l-3.192-10.285a5.323,5.323,0,0,0-5.182-3.82Z" transform="translate(-224.169 -420.184)"/><path class="a" d="M416.276,412.492a3.49,3.49,0,0,1,1.643.426l7.1,3.74c-.3.229-.621.456-.957.677a3.092,3.092,0,0,0-.959,4.178,10.223,10.223,0,0,1,.979,2.234,10.208,10.208,0,0,1-2.238-.972,3.1,3.1,0,0,0-4.176.969c-.219.336-.446.657-.674.958l-3.756-7.093a3.31,3.31,0,0,1,.062-3.369,3.528,3.528,0,0,1,2.979-1.746m0-1.959a5.448,5.448,0,0,0-4.771,7.992l5.034,9.506a14.453,14.453,0,0,0,2.768-3.217,1.135,1.135,0,0,1,.953-.514,1.15,1.15,0,0,1,.588.16,12.041,12.041,0,0,0,5.379,1.647c.14,0,.209-.012.2-.029h.006a11.028,11.028,0,0,0-1.636-5.569,1.14,1.14,0,0,1,.351-1.538,14.489,14.489,0,0,0,3.21-2.776l-9.516-5.012a5.451,5.451,0,0,0-2.553-.651Z" transform="translate(-370.609 -370.319)"/></g></g><rect class="b" width="100" height="100"/></svg>
                            </a>
                        </div>
                        <div class="header__bottom__content__right">
                            <nav class="user-page">
                                <ul class="user-page__links">
                                    <li class="user-page__links__user-profile">
                                        <?php
                                            if( !is_user_logged_in() ){
                                        ?>
                                            <a id="blueins_open_user_form_popup" class="light-seventeen" href="<?php echo get_permalink(23); ?>">Войти</a>
                                        <?php }else{ 
                                            global $current_user;
                                            wp_get_current_user();
                                        
                                            //echo 'Username: ' . $current_user->user_login . "\n";
                                            //echo 'User email: ' . $current_user->user_email . "\n";
                                            //echo 'User first name: ' . $current_user->user_firstname . "\n";
                                            //echo 'User last name: ' . $current_user->user_lastname . "\n";
                                            //echo 'User display name: ' . $current_user->display_name . "\n";
                                            //echo 'User ID: ' . $current_user->ID . "\n";
                                            ?>
                                            <a class="light-seventeen" href="<?php echo get_permalink(23); ?>">
                                                <div class="blueins-user-avatar-cover">
                                                    <?php echo get_avatar( $current_user->ID, 45 ); ?>
                                                </div>  
                                                <span class="blueins-user-avatar-name"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></span>
                                            </a>
                                        <?php } ?>
                                    </li>
                                    <li><?php echo do_shortcode('[blu_woo_wishlist_page]'); ?></li>
                                    <li>
                                        <button name="cart" id="cart-icon-menu" class="cart-icon cart-hov-information">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><g transform="translate(-2.359 10)"><g transform="translate(22.237)"><path d="M82.527,2.8a3.26,3.26,0,0,0-5.86-1.457.383.383,0,1,0,.619.452A2.493,2.493,0,0,1,81.767,2.9a.384.384,0,0,0,.379.329.411.411,0,0,0,.055,0A.384.384,0,0,0,82.527,2.8Z" transform="translate(-76.593)" fill="#fff"/></g><g transform="translate(16.125 4.985)"><path d="M39.769,46.475l-1.15-1.917a.383.383,0,0,0-.329-.186h-1.1a.383.383,0,0,0,0,.767h.885l.69,1.15H23.246l.69-1.15h.406a.383.383,0,1,0,0-.767h-.623a.383.383,0,0,0-.329.186l-1.15,1.917a.384.384,0,0,0,.329.581H39.44a.384.384,0,0,0,.329-.581Z" transform="translate(-22.185 -44.372)" fill="#fff"/></g><g transform="translate(25.467 2.149)"><path d="M111.674,20.53a.383.383,0,0,0-.238-.171l-5.227-1.223a.383.383,0,0,0-.461.286l-.394,1.685a.383.383,0,0,0,.747.174l.307-1.312,4.48,1.048-.7,3.01a.383.383,0,0,0,.286.46.388.388,0,0,0,.088.01.383.383,0,0,0,.373-.3l.791-3.383A.382.382,0,0,0,111.674,20.53Z" transform="translate(-105.343 -19.126)" fill="#fff"/></g><g transform="translate(17.62 1.165)"><g transform="translate(0)"><path d="M43.021,13.667l-.349-2.955a.384.384,0,0,0-.426-.336l-6.413.758a.384.384,0,0,0-.336.426l.582,4.929a.384.384,0,0,0,.38.339l.046,0a.384.384,0,0,0,.336-.426L36.3,11.851l5.652-.668.3,2.574a.383.383,0,0,0,.762-.09Z" transform="translate(-35.494 -10.374)" fill="#fff"/></g></g><g transform="translate(20.485 3.681)"><path d="M68.691,36.228l-.761-3.165a.383.383,0,0,0-.462-.283l-6.177,1.486a.384.384,0,0,0-.283.462l.38,1.582a.383.383,0,1,0,.746-.179l-.291-1.209,5.431-1.306.671,2.792a.384.384,0,0,0,.746-.18Z" transform="translate(-60.997 -32.769)" fill="#fff"/></g><g transform="translate(15.359 6.902)"><g transform="translate(0)"><path d="M33.764,61.8a.384.384,0,0,0-.383-.364H16.509a.384.384,0,0,0-.383.364l-.767,14.954a.383.383,0,0,0,.383.4H34.147a.383.383,0,0,0,.383-.4ZM16.145,76.4l.728-14.187H33.016L33.744,76.4Z" transform="translate(-15.359 -61.441)" fill="#fff"/></g></g><g transform="translate(26.67 8.436)"><path d="M117.2,75.093a1.15,1.15,0,1,0,1.15,1.15A1.152,1.152,0,0,0,117.2,75.093Zm0,1.534a.383.383,0,1,1,.383-.383A.384.384,0,0,1,117.2,76.627Z" transform="translate(-116.052 -75.093)" fill="#fff"/></g><g transform="translate(20.918 8.436)"><path d="M66,75.093a1.15,1.15,0,1,0,1.15,1.15A1.152,1.152,0,0,0,66,75.093Zm0,1.534a.383.383,0,1,1,.383-.383A.384.384,0,0,1,66,76.627Z" transform="translate(-64.852 -75.093)" fill="#fff"/></g><g transform="translate(21.685 9.586)"><path d="M77.814,85.333h-.03a.384.384,0,0,0-.383.383.379.379,0,0,0,.03.148v1.961a2.492,2.492,0,0,1-4.985,0V85.717a.383.383,0,1,0-.767,0v2.109a3.259,3.259,0,0,0,6.518,0V85.717A.384.384,0,0,0,77.814,85.333Z" transform="translate(-71.679 -85.333)" fill="#fff"/></g></g><rect width="45" height="45" fill="none"/></svg>
                                        </button>
                                    </li>
                                    <!--li class="user-page__links__like-icon">
                                        <a href="like.html" class="like-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><g transform="translate(11 -16.534)"><g transform="translate(0 28.534)"><path d="M11.295,48.606c-.476-.412-.718-.646-3.262-2.809C3.2,41.683,0,38.966,0,35a6.158,6.158,0,0,1,6-6.464,5.975,5.975,0,0,1,5.294,3.574,5.975,5.975,0,0,1,5.294-3.574,6.158,6.158,0,0,1,6,6.464c0,3.967-3.2,6.685-8.033,10.8C12,47.97,11.792,48.175,11.295,48.606ZM6,29.858c-2.666,0-4.677,2.21-4.677,5.141,0,3.356,3.01,5.915,7.567,9.79.772.657,1.567,1.332,2.4,2.06.837-.728,1.632-1.4,2.4-2.06,4.557-3.875,7.567-6.435,7.567-9.79,0-2.931-2.011-5.141-4.677-5.141-2.407,0-4.1,2.158-4.657,4.147v0l-1.275,0h0C10.169,32.248,8.585,29.858,6,29.858Z" transform="translate(0 -28.534)" fill="#fff"/></g></g><rect width="45" height="45" fill="none"/></svg>
                                        </a>
                                    </li-->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Header -->
    </header>


    <!-- User Registration -->
    <div id="blueins_user_form_popup" class="blueins_login_user_form_popup">
        <div class="blueins_login_user_form_popup__close-button">
            <button id="blueins_user_form_popup-colose" class="close-button">Close Popup</button>
        </div>
        <div class="blueins_login_user_form_popup__containter">
            <?php
                do_action('blueins_authorization_user');
            ?>
        </div>
    </div>
    <div id="blueins_user_form_popup-overlay" class="blueins_login_user_form_popup-overlay"></div>
    <!-- User Registration -->


    <?php
        wc_get_template_part( 'fastview', 'template' );
    ?>
