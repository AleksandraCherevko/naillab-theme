<?php
/**
 * Template Name: Contact Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="contact-page">

  <!-- HERO -->
  <section class="contact-hero">
    <img class="about-hero-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="Kontakt">
    <div class="container">
      <h1 class="contact-hero-title">Kontaktujte nás</h1>
      <p class="contact-hero-after-title">Máte otázky? Rádi vám pomůžeme.</p>
    </div>
  </section>

  <!-- CONTACTS + FORM -->
  <section class="contact-main">
    <div class="container contact-main__grid">

      <div class="contact-cards">
        <div class="contact-card">
          <div class="contact-card__icon">
            <svg class="icon" width="30" height="30" aria-hidden="true">
              <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-mail'); ?>"></use>
            </svg>
          </div>
          <div>
            <h3>Email</h3>
            <p><a href="mailto:nailslab.cz@gmail.com">nailslab.cz@gmail.com</a></p>
          </div>
        </div>

        <div class="contact-card">
          <div class="contact-card__icon">
            <svg class="icon" width="30" height="30" aria-hidden="true">
              <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-phone'); ?>"></use>
            </svg>
          </div>
          <div>
            <h3>Telefon</h3>
            <p><a href="tel:+420722392887">+420 722 392 887</a></p>
          </div>
        </div>

        <div class="contact-card">
          <div class="contact-card__icon">
            <svg class="icon" width="30" height="30" aria-hidden="true">
              <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-instagram-svgrepo'); ?>"></use>
            </svg>
          </div>
          <div>
            <h3>Instagram</h3>
            <p><a href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener">@naillab.cz</a></p>
          </div>
        </div>

        <div class="contact-card">
          <div class="contact-card__icon">
            <svg class="icon" width="30" height="30" aria-hidden="true">
              <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-telegram-svgrepo'); ?>"></use>
            </svg>
          </div>
          <div>
            <h3>Telegram</h3>
            <p><a href="https://t.me/+0Di5fohdymU0ZTJi" target="_blank" rel="noopener">@naillab.cz</a></p>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <h3 class="napiste-nam-title">Napište nám</h3>
        <?php echo do_shortcode('[wpforms id="147"]'); ?>
      </div>

    </div>
  </section>

  <!-- LEGAL -->
  <section class="contact-legal">
    <div class="container">
     <h2>Provozovatel e‑shopu:</h2>
      <p>Název společnosti / jméno podnikatele: <strong>Anastasiia Nedosichenko</strong></p>
      <p>Sídlo / adresa podnikání: <strong>Lesní 534, 289 24, Milovice - Mladá</strong></p>
      <p>IČO: <strong>19254067</strong></p>
      <p>Email: <strong>nailslab.cz@gmail.com</strong></p>
      <p>Telefon: <strong>+420 722 392 887</strong></p>
    </div>
  </section>

</main>

<?php get_footer(); ?>
