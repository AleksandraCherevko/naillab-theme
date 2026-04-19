<?php
/**
 * My Account dashboard.
 *
 * @package WooCommerce\Templates
 */

defined('ABSPATH') || exit;

$current_user = wp_get_current_user();
$username = $current_user->display_name ?: $current_user->user_login;

$orders_url = esc_url(wc_get_account_endpoint_url('orders'));
$addresses_url = esc_url(wc_get_account_endpoint_url('edit-address'));
$account_url = esc_url(wc_get_account_endpoint_url('edit-account'));
$logout_url = esc_url(wc_logout_url());
?>

<p class="account-dashboard-greeting">
    Dobrý den, <strong><?php echo esc_html($username); ?></strong>
    <span>
        (nejste <strong><?php echo esc_html($username); ?></strong>?
        <a href="<?php echo $logout_url; ?>">Odhlásit se</a>)
    </span>
</p>

<p class="account-dashboard-text">
    Ve svém zákaznickém účtu si můžete prohlédnout své
    <a href="<?php echo $orders_url; ?>">objednávky</a>,
    upravit
    <a href="<?php echo $addresses_url; ?>">fakturační a doručovací adresy</a>
    a změnit
    <a href="<?php echo $account_url; ?>">heslo nebo osobní údaje</a>.
</p>
