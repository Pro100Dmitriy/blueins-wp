<?php
/**
 * Template name: Список желаний
 */

get_header('','about__header__bottom');

?>

<main class="main">
<!-- Main -->

    <section class="user__title">
        <div class="section-title">
        <h1 class="section-text__title h1-style">Понравившиеся</h1>
        </div>
    </section>

    <section class="cart__content">
        <div class="small-container">
            <div class="like__content__information">
                <?php echo do_shortcode('[blu_woo_get_wishlist]'); ?>                
            </div>
        </div>
    </section>

<!-- Main -->
</main>

<?php get_footer(); ?>