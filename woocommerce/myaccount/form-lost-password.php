<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<section class="user__title myaccount_authorization__nopadding">
	<div class="section-title">
		<h1 class="section-text__title h1-style"><?php the_title(); ?></h1>
	</div>
</section>

<section class="myaccount_lost_password">
	<div class="small-container">
		<div class="content-d-flex-center">
		
			<div class="myaccount_lost_password__tabs">
				<div class="myaccount_lost_password__tabs__content">
					<form method="post" class="woocommerce-ResetPassword lost_reset_password">

						<p class="regular-fiveteen"><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

						<p class="el-input input-email woocommerce-form-row">
							<label class="el-input__label" for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
							<input class="el-input__field" type="text" name="user_login" id="user_login" autocomplete="username" />
						</p>

						<div class="clear"></div>

						<?php do_action( 'woocommerce_lostpassword_form' ); ?>

						<p class="woocommerce-ResetPassword__submit">
							<input type="hidden" name="wc_reset_password" value="true" />
							<button type="submit" class="el-form__button woocommerce-Button" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
						</p>

						<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>

<?php
do_action( 'woocommerce_after_lost_password_form' );
