<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>

<div class="el-blueins-login-from">

	<div class="woocommerce-form-login__title">
		<h3 class="h3-style">Войти</h3>
	</div>

	<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

		<?php do_action( 'woocommerce_login_form_start' ); ?>

		<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>

		<p class="el-input input-username form-row form-row-first">
			<label class="el-input__label" for="username">Логин или Email&nbsp;<span class="required">*</span></label>
			<input class="el-input__field input-text" type="text"  name="username" id="username" autocomplete="username" />
		</p>
		<p class="el-input input-password form-row form-row-last">
			<label class="el-input__label" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<i class="el-input__field-box">
				<input class="el-input__field input-text" type="password" name="password" id="password" autocomplete="current-password" />
				<span class="svg-box">
					<i>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
					</i>
				</span>
			</i>
		</p>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_login_form' ); ?>

		<div class="woocommerce-form-login__remembers-lost"> 
			<p class="form-row">
				<label class="el-checkbox woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
					<span class="woocommerce-form-login__remembers-lost__remember"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
			</p>
			<p class="lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Забыли пароль?</a>
			</p>
		</div>
		
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
		<button type="submit" class="el-form__button woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>">Войти</button>

		<div class="clear"></div>

		<div class="woocommerce-form-login__no-accaount">
			<p>Нет аккаунта?</p>
			<button id="button-activate-registration">Зарегистрироваться</button>
		</div>

		<?php //do_action( 'woocommerce_login_form_end' ); ?>

	</form>

</div>
