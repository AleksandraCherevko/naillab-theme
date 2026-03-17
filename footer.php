<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php
	astra_content_after();

	astra_footer_before();
?>

<footer class="site-footer">
<div class="footer-container">

  <div class="footer-col footer-brand">
  <a href="<?php echo esc_url(home_url('/')); ?>">  <img class="footer-logo" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/naillab.jpg'); ?>" alt="naillab.cz"></a>
  </div>

 
  <div class="footer-col">
    <details class="footer-accordion">
      <summary class="footer-accordion-summary">Informace</summary>
      <?php
        wp_nav_menu([
          'theme_location' => 'footer_info',
          'container' => false,
          'menu_id' => 'footer-info-menu',
          'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        ]);
      ?>
    </details>

    <details class="footer-accordion">
      <summary class="footer-accordion-summary">Zákaznický servis</summary>
      <?php
        wp_nav_menu([
          'theme_location' => 'footer_service',
          'container' => false,
          'menu_id' => 'footer-service-menu',
          'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        ]);
      ?>
    </details>
  </div>


  <div class="footer-col">
    <details class="footer-accordion">
      <summary class="footer-accordion-summary">Kontakty</summary>
      <ul class="footer-contact">
        <li><a href="mailto:nailslab.cz@gmail.com">nailslab.cz@gmail.com</a></li>
        <li><a href="tel:+420722392887">+420 722 392 887</a></li>
      </ul>

      <div class="footer-socials">
        <a href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram">
          <svg class="icon" width="20" height="20" aria-hidden="true">
            <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-instagram'); ?>"></use>
          </svg>
        </a>
        <a href="https://t.me/+0Di5fohdymU0ZTJi" target="_blank" rel="noopener" aria-label="Telegram">
          <svg class="icon" width="20" height="20" aria-hidden="true">
            <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-telegram'); ?>"></use>
          </svg>
        </a>
      </div>
    </details>

    <details class="footer-accordion">
      <summary class="footer-accordion-summary">Platby</summary>
      <ul class="footer-payments">
        <li><span class="pay-icon">VISA</span></li>
        <li><span class="pay-icon">MasterCard</span></li>
        <li><span class="pay-icon">Apple Pay</span></li>
        <li><span class="pay-icon">Google Pay</span></li>
      </ul>
    </details>
  </div>
</div>
<div class="footer-bottom">
  <span>© 2026 naillab.cz</span>
</div>

</footer>



<?php
	astra_footer_after();
?>
	</div><!-- #page -->
<?php
	astra_body_bottom();
	wp_footer();
?>
	</body>
</html>
