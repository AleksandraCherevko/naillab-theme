<?php
defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

echo wc_get_stock_html($product);

if (!$product->is_in_stock()) {
	return;
}

do_action('woocommerce_before_add_to_cart_form');
?>

<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype="multipart/form-data">
	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	<?php
	$max_quantity = $product->backorders_allowed() ? '' : (int) $product->get_stock_quantity();
	?>

	<div class="quantity">
		<label class="screen-reader-text" for="product-quantity-<?php echo esc_attr($product->get_id()); ?>">
			<?php echo esc_html($product->get_name()); ?> množství
		</label>

		<input
			type="number"
			id="product-quantity-<?php echo esc_attr($product->get_id()); ?>"
			class="input-text qty text"
			name="quantity"
			value="1"
			min="1"
			<?php echo $max_quantity ? 'max="' . esc_attr($max_quantity) . '"' : ''; ?>
			step="1"
			inputmode="numeric"
			autocomplete="off"
		>
	</div>

	<?php do_action('woocommerce_after_add_to_cart_quantity'); ?>

	<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt">
		<?php echo esc_html($product->single_add_to_cart_text()); ?>
	</button>

	<?php do_action('woocommerce_after_add_to_cart_button'); ?>
</form>

<?php do_action('woocommerce_after_add_to_cart_form'); ?>
