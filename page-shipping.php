<?php
/**
 * Template Name: Shipping Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="terms-page">
  <section class="terms-hero">
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="Doprava a platba">
    <div class="container">
      <h1 class="terms-hero-title">Doprava a platba</h1>
      <p class="terms-hero-after-title">Aktualizováno: [doplňte datum]</p>
    </div>
  </section>

  <section class="terms-content container">
    <h2>Způsoby dopravy</h2>
    <p>Objednané zboží je doručováno prostřednictvím přepravních společností.</p>
    <p><strong>Možnosti dopravy:</strong></p>
    <ul>
      <li>Zásilkovna</li>
      <li>Kurýrní služba</li>
    </ul>
    <p>Doba doručení je obvykle 2–5 pracovních dnů.</p>
    <p>Cena dopravy je zobrazena při dokončení objednávky.</p>

    <h2>Způsoby platby</h2>
    <p>Kupující může objednávku uhradit následujícími způsoby:</p>
    <ul>
      <li>online platební kartou</li>
      <li>bankovním převodem</li>
      <li>dobírkou (pokud je dostupná)</li>
    </ul>
    <p>Objednávka bude odeslána po přijetí platby, pokud není zvolena dobírka.</p>
  </section>
</main>

<?php get_footer(); ?>
