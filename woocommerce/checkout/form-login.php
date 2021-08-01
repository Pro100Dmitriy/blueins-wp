<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>

<div class="blueins_login_notify">
	<p class="regular-fiveteen">Уже покупали? Тогда <a id="blueins_open_user_form_popup_checkout" href="#">войдите</a> в аккаунт для продолжения работы!</p>
</div>