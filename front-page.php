<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { get_sidebar(); } ?>

<div id="primary" <?php astra_primary_class(); ?>>

  <?php astra_primary_content_top(); ?>

  <?php astra_content_page_loop(); ?>

  <!-- CONTACT SECTION -->
  <section class="contact-strip">
    <div class="container contact-strip__inner">
      <div class="contact-strip__image">
        <img class="contact-strip__img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/logo.jpg'); ?>" alt="Kontakt">
      </div>

      <div class="contact-strip__text">
        <h2 class="contact-strip__title">Potřebujete poradit?</h2>
        <p class="contact-strip__email"><a class="contact-strip__link" href="mailto:naillab.cz@gmail.com">naillab.cz@gmail.com</a></p>
        <p class="contact-strip__phone"><a class="contact-strip__link" href="tel:+420722392887">+420 722 392 887</a></p>
       <div class="contact-strip__soc">
            <p class="contact-strip__socmedia"><a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram">Instagram</a></p>
            <p class="contact-strip__socmedia"><a  class="contact-strip__link"href="https://t.me/+0Di5fohdymU0ZTJi" target="_blank" rel="noopener" aria-label="Telegram">Telegram</a></p>
       </div>
      </div>
    </div>
  </section>

  <?php astra_primary_content_bottom(); ?>

</div>

<?php if ( astra_page_layout() === 'right-sidebar' ) { get_sidebar(); } ?>

<?php get_footer(); ?>
