<?php
/**
 * Template Name: Privacy Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="terms-page">
  <section class="terms-hero">
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="Zásady ochrany osobních údajů">
    <div class="container">
      <h1 class="terms-hero-title">Zásady ochrany osobních údajů</h1>
      <p class="terms-hero-after-title">Aktualizováno: 17. 03. 2026</p>
    </div>
  </section>

  <section class="terms-content container">
    <h2>1. Správce osobních údajů</h2>
    <p>Správcem osobních údajů je:</p>
     <p><strong>Provozovatel e‑shopu:</strong></p>
     <p>Název společnosti / jméno podnikatele: <strong>Anastasiia Nedosichenko</strong></p>
      <p>Sídlo / adresa podnikání: <strong>Lesní 534, 289 24, Milovice - Mladá</strong></p>
      <p>IČO: <strong>19254067</strong></p>
      <p>Email: <strong>nailslab.cz@gmail.com</strong></p>
      <p>Telefon: <strong>+420 722 392 887</strong></p>
   

    <h2>2. Jaké údaje zpracováváme</h2>
    <p>Při objednávce zpracováváme následující údaje:</p>
    <ul>
      <li>jméno a příjmení</li>
      <li>emailovou adresu</li>
      <li>telefonní číslo</li>
      <li>doručovací adresu</li>
      <li>údaje o objednávce</li>
    </ul>

    <h2>3. Účel zpracování</h2>
    <p>Osobní údaje jsou zpracovávány za účelem:</p>
    <ul>
      <li>vyřízení objednávky</li>
      <li>komunikace se zákazníkem</li>
      <li>splnění zákonných povinností</li>
    </ul>

    <h2>4. Doba uchování údajů</h2>
    <p>Osobní údaje uchováváme po dobu nezbytnou pro splnění smlouvy a zákonných povinností.</p>

    <h2>5. Práva zákazníka</h2>
    <p>Zákazník má právo:</p>
    <ul>
      <li>požadovat přístup ke svým údajům</li>
      <li>požadovat opravu nebo výmaz údajů</li>
      <li>podat stížnost u dozorového úřadu</li>
    </ul>
  </section>
</main>

<?php get_footer(); ?>
