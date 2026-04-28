<?php
/**
 * Template Name: Privacy Page
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="terms-page">
  <section class="terms-hero">
    <img
      src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>"
      alt="Zásady ochrany osobních údajů"
    >
    <div class="container">
      <h1 class="terms-hero-title">Zásady ochrany osobních údajů</h1>
      <p class="terms-hero-after-title">Aktualizováno: 17. 03. 2026</p>
    </div>
  </section>

  <section class="terms-content container">
    <h2>1. Správce osobních údajů</h2>
    <p>Správcem osobních údajů je provozovatel e-shopu:</p>

    <p>Jméno podnikatele: <strong>Anastasiia Nedosichenko</strong></p>
    <p>Sídlo / adresa podnikání: <strong>Lesní 534, 289 24, Milovice - Mladá</strong></p>
    <p>IČO: <strong>19254067</strong></p>
    <p>E-mail: <strong>nailslab.cz@gmail.com</strong></p>
    <p>Telefon: <strong>+420 722 392 887</strong></p>

    <h2>2. Jaké osobní údaje zpracováváme</h2>
    <p>V souvislosti s provozem e-shopu můžeme zpracovávat zejména tyto osobní údaje:</p>
    <ul>
      <li>jméno a příjmení</li>
      <li>e-mailovou adresu</li>
      <li>telefonní číslo</li>
      <li>fakturační a doručovací adresu</li>
      <li>údaje o objednávkách</li>
      <li>údaje o zákaznickém účtu, pokud si jej vytvoříte</li>
      <li>technické údaje, jako je IP adresa nebo základní informace o zařízení a prohlížeči</li>
      <li>cookies a obdobné technologie</li>
    </ul>

    <h2>3. Za jakým účelem osobní údaje zpracováváme</h2>
    <p>Osobní údaje zpracováváme zejména za účelem:</p>
    <ul>
      <li>vyřízení objednávky</li>
      <li>dodání zboží</li>
      <li>komunikace se zákazníkem</li>
      <li>vedení zákaznického účtu</li>
      <li>vyřizování reklamací a dotazů</li>
      <li>splnění zákonných povinností, zejména v oblasti účetnictví a daní</li>
      <li>zajištění bezpečného a správného fungování webových stránek</li>
    </ul>

    <h2>4. Právní základ zpracování</h2>
    <p>Osobní údaje zpracováváme na základě:</p>
    <ul>
      <li>plnění smlouvy</li>
      <li>plnění právní povinnosti</li>
      <li>oprávněného zájmu správce</li>
      <li>souhlasu, pokud je v konkrétním případě vyžadován</li>
    </ul>

    <h2>5. Doba uchování údajů</h2>
    <p>Osobní údaje uchováváme pouze po dobu nezbytně nutnou k naplnění účelu jejich zpracování.</p>
    <ul>
      <li>údaje související s objednávkou uchováváme po dobu nezbytnou pro splnění smlouvy a následně po dobu stanovenou právními předpisy</li>
      <li>účetní a daňové doklady uchováváme po dobu stanovenou právními předpisy</li>
      <li>údaje zákaznického účtu uchováváme po dobu existence účtu nebo do doby jeho zrušení, pokud právní předpisy nevyžadují delší uchování</li>
      <li>údaje zpracovávané na základě souhlasu uchováváme do odvolání souhlasu</li>
    </ul>

    <h2>6. Komu mohou být osobní údaje předány</h2>
    <p>Osobní údaje mohou být v nezbytném rozsahu předány zejména těmto příjemcům:</p>
    <ul>
      <li>dopravcům a výdejním místům za účelem doručení zboží</li>
      <li>poskytovatelům platebních služeb</li>
      <li>poskytovatelům hostingu, technické správy a IT podpory</li>
      <li>účetním, daňovým nebo právním poradcům, pokud je to nezbytné</li>
      <li>orgánům veřejné moci, pokud to vyžaduje zákon</li>
    </ul>

    <h2>7. Cookies</h2>
    <p>Na webových stránkách používáme cookies a obdobné technologie za účelem správného fungování webu, analýzy návštěvnosti, zapamatování uživatelských nastavení a případně marketingových aktivit, pokud je to povoleno.</p>

    <h2>8. Práva zákazníka</h2>
    <p>Máte právo:</p>
    <ul>
      <li>požadovat přístup ke svým osobním údajům</li>
      <li>požadovat opravu nepřesných údajů</li>
      <li>požadovat výmaz osobních údajů, pokud to umožňuje zákon</li>
      <li>požadovat omezení zpracování</li>
      <li>vznést námitku proti zpracování</li>
      <li>na přenositelnost údajů</li>
      <li>odvolat souhlas, pokud je zpracování založeno na souhlasu</li>
      <li>podat stížnost u Úřadu pro ochranu osobních údajů</li>
    </ul>

    <h2>9. Kontakt</h2>
    <p>V případě dotazů týkajících se ochrany osobních údajů nás můžete kontaktovat na e-mailu <strong>nailslab.cz@gmail.com</strong> nebo telefonicky na <strong>+420 722 392 887</strong>.</p>
  </section>
</main>

<?php get_footer(); ?>
