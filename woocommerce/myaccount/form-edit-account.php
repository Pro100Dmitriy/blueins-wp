<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="user-container">

	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="user__form__name-sur"> 
			<p class="el-input user-name woocommerce-form-row">
				<label class="el-input__label" for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="el-input__field" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</p>
			<p class="el-input user-surname woocommerce-form-row">
				<label class="el-input__label" for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="el-input__field" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</p>
			<div class="clear"></div>
		</div>

		<p class="el-input input-login woocommerce-form-row">
			<label class="el-input__label" for="account_display_name">Логин&nbsp;<span class="required">*</span></label>
			<input type="text" class="el-input__field" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
		</p>
		<div class="clear"></div>

		<p class="el-input input-email woocommerce-form-row">
			<label class="el-input__label" for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input class="el-input__field" name="account_email" id="account_email" type="email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</p>

		<fieldset>
			<legend class="regular-fiveteen"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>
			<p class="el-input woocommerce-form-row">
				<label class="el-input__label" for="password_current">Текущий пароль</label>
				<i class="el-input__field-box">
					<input class="el-input__field" type="password" name="password_current" id="password_current" autocomplete="off" />
					<span class="svg-box">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
						</i>
					</span>
				</i>
			</p>
			<p class="el-input woocommerce-form-row">
				<label class="el-input__label" for="password_1">Новый пароль</label>
				<i class="el-input__field-box">
					<input class="el-input__field" type="password" name="password_1" id="password_1" autocomplete="off" />
					<span class="svg-box">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
						</i>
					</span>
				</i>
			</p>
			<p class="el-input woocommerce-form-row">
				<label class="el-input__label" for="password_2">Подтвердите новый пароль</label>
				<i class="el-input__field-box">
					<input class="el-input__field" type="password" name="password_2" id="password_2" autocomplete="off" />
					<span class="svg-box">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><defs><style>.cls-1{fill:#17191a;}.cls-2{fill:none;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Visible"><path class="cls-1" d="M25.81,16.28c-.14-.22-3.7-5.25-9.31-5.25-4.82,0-9.11,5-9.29,5.22a.39.39,0,0,0,0,.5C7.39,17,11.68,22,16.5,22s9.11-5,9.29-5.22A.36.36,0,0,0,25.81,16.28ZM16.5,21.19C12.64,21.19,9,17.51,8,16.5c.93-1,4.6-4.69,8.47-4.69,4.52,0,7.71,3.68,8.49,4.67C24.09,17.46,20.4,21.19,16.5,21.19Z"/><path class="cls-1" d="M16.5,13.37a3.13,3.13,0,1,0,3.13,3.13A3.13,3.13,0,0,0,16.5,13.37Zm0,5.48a2.35,2.35,0,1,1,2.35-2.35A2.36,2.36,0,0,1,16.5,18.85Z"/><rect class="cls-2" width="33" height="33"/></g></g></g></svg>
						</i>
					</span>
				</i>
			</p>
		</fieldset>
		<div class="clear"></div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<p class="profile-button-submit">
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="el-form__button woocommerce-Button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
			<input type="hidden" name="action" value="save_account_details" />
		</p>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>

</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
