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

  <!-- INSPIRATION SECTION -->

  <section class="insp-strip">
  <div class="container">
    <h2 class="insp-strip__title">Inspirujte se námi a sledujte nás na <span><a class="insp-strip-link__btn" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener">Instagramu</a></span></h2>


      <ul class="insp-strip__list">
        <li class="insp-strip__item">
            <a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram"><img class="insp-strip__img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/insta1.jpg'); ?>" alt="Amethyst-colored gel nails with plums"></a>
        </li>
         <li class="insp-strip__item">
            <a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram"><img class="insp-strip__img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/insta2.jpg'); ?>" alt="Burgundy-colored gel nails with dates"></a>
        </li>
         <li class="insp-strip__item">
            <a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram"><img class="insp-strip__img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/insta3.jpg'); ?>" alt="Cherry-colored gel nails with pie"></a>
        </li>
         <li class="insp-strip__item">
            <a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram"><img class="insp-strip__img"src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/insta4.jpg'); ?>" alt="Vanilla-colored and cream-colored gels nails with сinnabon"></a>
        </li>
         <li class="insp-strip__item">
            <a class="contact-strip__link" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener" aria-label="Instagram"><img class="insp-strip__img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/insta5.jpg'); ?>" alt="Ivory-colored and pmilkyway gels nails with marshmallows"></a>
        </li>
      </ul>
   <div class="insp-strip-btn__toggle">
        <button class="insp-strip__toggle" type="button">Zobrazit více</button>
    
        <div class="insp-strip__btn">
            <a class="insp-strip-link__btn" href="https://www.instagram.com/naillab.cz/" target="_blank" rel="noopener">
              Instagram
            </a>
        </div>
   </div>
  </div>
</section>

  <?php astra_primary_content_bottom(); ?>

</div>

<?php if ( astra_page_layout() === 'right-sidebar' ) { get_sidebar(); } ?>

<?php get_footer(); ?>
