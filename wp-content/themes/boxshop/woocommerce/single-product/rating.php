<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

$review_link = apply_filters('boxshop_woocommerce_review_link_filter', '#reviews');

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
		<?php echo wc_get_rating_html( $average, $rating_count ); ?>
		<?php if ( comments_open() ) : ?><a href="<?php echo esc_url($review_link); ?>" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s Review', '%s Reviews', $review_count, 'boxshop' ), '<span class="count">' . $review_count . '</span>' ); ?></a><?php endif ?>
	</div>
	
<?php else: ?>

	<div class="woocommerce-product-rating">
		<?php if ( comments_open() ) : ?><a href="<?php echo esc_url($review_link); ?>" class="woocommerce-review-link" rel="nofollow"><?php esc_html_e( 'Write your comment', 'boxshop' ); ?></a><?php endif; ?>
	</div>
	
<?php endif; ?>