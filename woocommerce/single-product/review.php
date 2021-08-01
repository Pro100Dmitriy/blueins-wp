<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>


<li class="comment__item comment_container" id="comment-<?php comment_ID(); ?>">

	<div class="comment__item__avatar-cover">
		<?php
		/**
		 * The woocommerce_review_before hook
		 *
		 * @hooked woocommerce_review_display_gravatar - 10
		 */
		do_action( 'woocommerce_review_before', $comment );
		?>
	</div>
	<div class="comment__item__text">
	
		<?php
			do_action( 'woocommerce_review_before_comment_text', $comment );
		?>

		<div class="comment__item__text__info">
			<?php
			/**
			 * The woocommerce_review_meta hook.
			 *
			 * @hooked woocommerce_review_display_meta - 10
			 */
			do_action( 'woocommerce_review_meta', $comment );
			?>
			<?php
			/**
			 * The woocommerce_review_before_comment_meta hook.
			 *
			 * @hooked woocommerce_review_display_rating - 10
			 */
			do_action( 'woocommerce_review_before_comment_meta', $comment );
			?>
		</div>
		<div class="comment__item__text__message regular-fiveteen">
			<?php
			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
			do_action( 'woocommerce_review_comment_text', $comment );
			?>
		</div>

		<?php
			do_action( 'woocommerce_review_after_comment_text', $comment );
		?>

	</div>
</li>
