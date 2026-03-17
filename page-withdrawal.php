<?php
/**
 * Template Name: Withdrawal Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="terms-page">
  <section class="terms-hero">
    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="Odstoupení od smlouvy">
    <div class="container">
      <h1 class="terms-hero-title">Odstoupení od smlouvy</h1>
      <p class="terms-hero-after-title">Aktualizováno: 17. 03. 2026</p>
    </div>
  </section>

  <section class="terms-content container">
    <h2>Právo na odstoupení od smlouvy</h2>
    <p>Zákazník, který je spotřebitelem, má právo odstoupit od kupní smlouvy uzavřené prostřednictvím internetového obchodu bez udání důvodu ve lhůtě 14 dnů od převzetí zboží.</p>
    <p>Lhůta pro odstoupení od smlouvy začíná běžet ode dne převzetí zboží.</p>

    <h2>Jak odstoupit od smlouvy</h2>
    <p>Pro odstoupení od smlouvy nás může zákazník kontaktovat prostřednictvím emailu nebo využít formulář pro odstoupení od smlouvy.</p>
    <p>Email: <strong>nailslab.cz@gmail.com</strong></p>
    <p>Zákazník je povinen zboží zaslat zpět na adresu provozovatele e‑shopu do 14 dnů od odstoupení od smlouvy.</p>

    <h2>Podmínky vrácení zboží</h2>
    <ul>
      <li>nepoužité</li>
      <li>nepoškozené</li>
      <li>pokud možno v původním obalu</li>
    </ul>
    <p>Zákazník odpovídá za snížení hodnoty zboží, pokud bylo se zbožím zacházeno jinak, než je nutné k seznámení se s jeho povahou a vlastnostmi.</p>

    <h2>Vrácení peněz</h2>
    <p>Prodávající vrátí zákazníkovi všechny přijaté peněžní prostředky, včetně nákladů na dodání zboží, nejpozději do 14 dnů od odstoupení od smlouvy.</p>
    <p>Prodávající není povinen vrátit peněžní prostředky dříve, než obdrží vrácené zboží.</p>

    <h2>Náklady na vrácení zboží</h2>
    <p>Přímé náklady na vrácení zboží nese zákazník.</p>

    <h2>Formulář pro odstoupení od smlouvy</h2>
    <p>Jméno a příjmení:</p>
    <p>Email:</p>
    <p>Číslo objednávky:</p>
    <p>Datum objednávky:</p>
    <p>Oznamuji, že odstupuji od kupní smlouvy na toto zboží.</p>
    <p>Datum:</p>
    <p>Podpis (pokud je formulář zasílán v listinné podobě)</p>

    <h2>Výjimky z práva na odstoupení od smlouvy</h2>
    <p>Kupující bere na vědomí, že v souladu s platnými právními předpisy nelze odstoupit od kupní smlouvy v případě zboží, které bylo dodáno v uzavřeném obalu a které kupující z obalu vyňal, pokud z hygienických důvodů není možné toto zboží vrátit.</p>
    <p>To se může týkat zejména kosmetických výrobků a produktů určených pro péči o nehty, pokud byly po dodání otevřeny nebo použity.</p>
    <p>Z hygienických důvodů tedy není možné vrátit otevřené nebo použité produkty.</p>
  </section>
</main>

<?php get_footer(); ?>
