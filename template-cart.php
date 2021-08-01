<?php
/**
 * Template name: Корзина
 **/

get_header('', 'user__header__bottom');
?>


	<main id="primary" class="site-main main">
    <!-- Main -->

        <section class="user__title">
            <div class="section-title">
                <h1 class="section-text__title h1-style"><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="cart__content">
            <div class="container">
                
                <?php
                while ( have_posts() ) :

                    the_post();

                    

                    the_content();

                endwhile; // End of the loop.
                ?>

            </div>
      </section>

    <!-- Main -->
	</main>

<?php
get_footer('cart');
