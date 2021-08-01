<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
*	Myaccount Registration From
 */

?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

	<section class="user__title myaccount_authorization__nopadding">
		<div class="section-title">
			<h1 class="section-text__title h1-style">Войти</h1>
		</div>
	</section>

	<section class="myaccount_authorization">
		<div class="small-container">

			<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
				<div class="row">
					<div class="myaccount_authorization__center">
						<div class="myaccount-animation-block">
						<!-- Login -->

							<div class="myaccount-animation-block__tab-login">
								<div class="myaccount_authorization-login-from">

									<form class="woocommerce-form woocommerce-form-login login" method="post">

										<?php do_action( 'woocommerce_login_form_start' ); ?>

										<p class="el-input input-username woocommerce-form-row">
											<label class="el-input__label" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
											<input class="el-input__field" type="text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
										</p>
										<p class="el-input input-password woocommerce-form-row">
											<label class="el-input__label" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
											<i class="el-input__field-box">
												<input class="el-input__field" type="password" name="password" id="password" autocomplete="current-password" />
												<span class="svg-box">
													<i>
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
													</i>
												</span>
											</i>
										</p>

										<?php do_action( 'woocommerce_login_form' ); ?>

										<div class="woocommerce-form-login__remembers-lost">
											<p class="form-remember">
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
										<button type="submit" class="el-form__button woocommerce-button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>


										<div class="myaccount_woocommerce-form-login__no-accaount">
											<p>Нет аккаунта?</p>
											<button id="myaccount_button-activate-registration">Зарегистрироваться</button>
										</div>
										<?php do_action( 'woocommerce_login_form_end' ); ?>

									</form>

								</div>
							</div>
						<!-- Login -->

						<!-- Registration -->
							
							<div class="myaccount-animation-block__tab-registration">
								<div class="myaccount_registration-login-from">

									<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

										<?php do_action( 'woocommerce_register_form_start' ); ?>

											<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

												<p class="el-input input-username woocommerce-form-row">
													<label class="el-input__label" for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
													<input type="text" class="el-input__field" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
												</p>

											<?php endif; ?>

											<p class="el-input input-email woocommerce-form-row">
												<label class="el-input__label" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
												<input class="el-input__field" type="email" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
											</p>

											<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

												<p class="el-input input-password woocommerce-form-row">
													<label class="el-input__label" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
													<i class="el-input__field-box">
														<input type="password" class="el-input__field" name="password" id="reg_password" autocomplete="new-password" />
														<span class="svg-box">
															<i>
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
															</i>
														</span>
													</i>
												</p>

											<?php else : ?>

												<p class="woocommerce-form-register__password-will-send"><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

											<?php endif; ?>

											<div class="woocommerce-form-register__submit-but">
												<?php do_action( 'woocommerce_register_form' ); ?>

												<p class="woocommerce-form-register__button">
													<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
													<button type="submit" class="el-form__button woocommerce-button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
												</p>
											</div>
											
											<div class="myaccount_woocommerce-form-register__have-accaount">
												<p>Уже есть аккаунт?</p>
												<button id="myaccount_button-activate-login">Войти</button>
											</div>
										<?php do_action( 'woocommerce_register_form_end' ); ?>

									</form>

								</div>
							</div>
						
						<!-- Registration -->
						</div>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</section>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>