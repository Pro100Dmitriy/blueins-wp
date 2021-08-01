<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 */

defined( 'ABSPATH' ) || exit; ?>

<section class="user__title">
	<div class="section-title">
		<h1 class="section-text__title h1-style"><?php the_title(); ?></h1>
	</div>
</section>

<section class="user__content">
	<div class="container">
		<div class="user__content__flex">
			<div class="user__content__menu">
				<?php
					/**
					 * My Account navigation.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_navigation' );
				?>
			</div>
			<div class="user__content__information">
				<?php
					/**
					 * My Account content.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_content' );
				?>
			</div>
		</div>
	</div>
</section>