<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $current_user;
wp_get_current_user();

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="user__menu__avatar">
	<div class="user__menu__avatar__cover">
		<?php echo get_avatar( $current_user->ID, 100 ); ?>
	</div>
	<h2 class="user__menu__avatar__name medium-ninteen"><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></h2>
	<p class="user__menu__avatar__log regular-fiveteen">Логин: <span class="medium-fiveteen"><?php echo $current_user->display_name ?></span></p>
</div>
<nav class="user__menu__links">
	<ul class="user__menu__links__list">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="user__menu__links__list__item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
