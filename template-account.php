<?php
/**
 * Template name: Аккаунт Пользователя
 **/

get_header('', 'user__header__bottom');
?>

    <main id="primary" class="site-main main">
    <!-- Main -->

		<?php
		while ( have_posts() ) :

			the_post();

            

			the_content();

		endwhile; // End of the loop.
		?>

    <!-- Main -->
	</main>

<?php
get_footer();