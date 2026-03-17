<?php
/**
 * Template Name: Complaints Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="terms-page">
  <section class="terms-hero">
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="Reklamační řád">
    <div class="container">
      <h1 class="terms-hero-title">Reklamační řád</h1>
      <p class="terms-hero-after-title">Aktualizováno: 17. 06. 2026</p>
    </div>
  </section>

  <section class="terms-content container">
    <h2>1. Úvodní ustanovení</h2>
    <p>Tento reklamační řád upravuje způsob a podmínky uplatnění reklamace zboží zakoupeného prostřednictvím internetového obchodu.</p>

    <p><strong>Provozovatel e‑shopu:</strong></p>
   
      <p>Název společnosti / jméno podnikatele: <strong>Anastasiia Nedosichenko</strong></p>
      <p>Sídlo / adresa podnikání: <strong>Lesní 534, 289 24, Milovice - Mladá</strong></p>
      <p>IČO: <strong>19254067</strong></p>
      <p>Email: <strong>nailslab.cz@gmail.com</strong></p>
      <p>Telefon: <strong>+420 722 392 887</strong></p>
   

    <h2>2. Práva z vadného plnění</h2>
    <p>Kupující má právo uplatnit reklamaci zboží v zákonné lhůtě 24 měsíců od jeho převzetí.</p>
    <p>Reklamace se nevztahuje na:</p>
    <ul>
      <li>běžné opotřebení výrobku</li>
      <li>nesprávné použití produktu</li>
      <li>mechanické poškození způsobené zákazníkem</li>
    </ul>

    <h2>3. Uplatnění reklamace</h2>
    <p>Reklamaci může zákazník uplatnit:</p>
    <ul>
      <li>emailem na adresu nailslab.cz@gmail.com</li>
      <li>zasláním zboží na adresu provozovatele e‑shopu</li>
    </ul>
    <p>Zákazník je povinen přiložit:</p>
    <ul>
      <li>číslo objednávky</li>
      <li>popis závady</li>
      <li>kontaktní údaje</li>
    </ul>

    <h2>4. Vyřízení reklamace</h2>
    <p>Reklamace bude vyřízena bez zbytečného odkladu, nejpozději do 30 dnů od jejího uplatnění.</p>
    <p>Zákazník bude o výsledku reklamace informován emailem.</p>
  </section>
</main>

<?php get_footer(); ?>
