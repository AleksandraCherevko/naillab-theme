<?php
/**
 * Template Name: About Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="about-page">
  <section class="about-hero">
    <img class="about-hero-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.jpg'); ?>" alt="O nás">
    <div class="container">
      <h1 class="about-hero__title">O nás</h1>
      <p class="about-hero__after-title">Váš partner pro profesionální manikúru</p>
    </div>
  </section>

  <section class="about-section">
    <p>Milujeme krásné a upravené nehty stejně jako vy. Náš e‑shop vznikl s cílem nabídnout manikérkám a milovníkům nail designu kvalitní produkty, které pomáhají vytvářet dokonalou manikúru.</p>
    <p>Pečlivě vybíráme materiály, které splňují vysoké standardy kvality a usnadňují práci profesionálům i začátečníkům.</p>
  </section>

  <section class="about-story">
    <div class="container about-story__inner">
      <div class="about-story__media">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-hero.jpg'); ?>" alt="Náš příběh">
      </div>
      <div class="about-story__text">
        <h2 class="about-story__title">Náš příběh</h2>
        <p>Myšlenka založit náš obchod vznikla z vášně pro svět manikúry a nail designu. Víme, jak důležité je pracovat s kvalitními produkty, které jsou spolehlivé, bezpečné a přinášejí krásné výsledky.</p>
        <p>Proto jsme vytvořili místo, kde můžete najít vše potřebné pro profesionální práci – od gel laků a bází až po produkty pro nail art a modeláž nehtů.</p>
      </div>
    </div>
  </section>

  <section class="about-section">
    <h2 class="about-story__title">Co u nás najdete</h2>
    <ul class="about-list">
      <li class="about-list-item">gel laky v různých odstínech</li>
      <li class="about-list-item">báze a topy</li>
      <li class="about-list-item">produkty pro modeláž a zpevnění nehtů</li>
      <li class="about-list-item">materiály pro nail art</li>
      <li class="about-list-item">nástroje a pomocné tekutiny</li>
    </ul>
    <p>Naším cílem je nabídnout produkty, které splňují požadavky moderních nehtových studií.</p>
  </section>

  <section class="about-section">
    <h2 class="about-story__title">Proč si vybrat náš obchod</h2>
    <ul class="about-list">
      <li class="about-list-item">profesionální kvalita produktů</li>
      <li class="about-list-item">široký výběr materiálů pro manikérky</li>
      <li class="about-list-item">rychlé a spolehlivé doručení</li>
      <li class="about-list-item">pečlivě vybraný sortiment</li>
    </ul>
    <p>Chceme, aby práce s našimi produkty byla pro manikérky jednoduchá, příjemná a přinášela perfektní výsledky.</p>
  </section>

  <section class="about-section">
    <h2 class="about-story__title">Pro koho je náš e‑shop</h2>
    <ul class="about-list">
      <li class="about-list-item">profesionální manikérky</li>
      <li class="about-list-item">nehtová studia</li>
      <li class="about-list-item">začínající nail techniky</li>
      <li class="about-list-item">všichni, kdo milují krásné nehty</li>
    </ul>
  </section>

  <section class="about-gallery">
    <div class="container">
      <div class="about-gallery__grid">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-1.jpg'); ?>" alt="Woman holding a professional pedicure cosmetics set">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-2.jpg'); ?>" alt="Gloved hand spraying pedicure disinfectant">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-3.jpg'); ?>" alt="Nail prep liquid applied to a natural nail">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-4.jpg'); ?>" alt="Professional cuticle remover held by a woman">
      </div>
    </div>
  </section>

  <section class="about-cta">
    <div class="container about-cta__inner">
      <div>
        <h2 class='contact-us-title'>Kontaktujte nás</h2>
        <p>Máte otázky nebo potřebujete poradit s výběrem produktů?</p>
      </div>
      <a class="about-cta__btn" href="mailto:nailslab.cz@gmail.com">Napsat e‑mail</a>
    </div>
  </section>

  <section class="about-section about-legal">
 <p><strong>Provozovatel e‑shopu:</strong></p>
   
   <p>Název společnosti / jméno podnikatele: <strong>Anastasiia Nedosichenko</strong></p>
      <p>Sídlo / adresa podnikání: <strong>Lesní 534, 289 24, Milovice - Mladá</strong></p>
      <p>IČO: <strong>19254067</strong></p>
      <p>Email: <strong>nailslab.cz@gmail.com</strong></p>
      <p>Telefon: <strong>+420 722 392 887</strong></p>

  <p class="about-legal__more">Více informací najdete zde:</p>
  <ul class="about-legal__links">
    <li><a href="/obchodni-podminky/">Obchodní podmínky</a></li>
    <li><a href="/reklamacni-rad/">Reklamační řád</a></li>
    <li><a href="/doprava-a-platba/">Doprava a platba</a></li>
      <li><a href="/odstoupeni-od-smlouvy/">Odstoupení od smlouvy</a></li>
    <li><a href="/ochrana-osobnich-udaju/">Ochrana osobních údajů</a></li>
  
  </ul>
</section>

</main>

<?php get_footer(); ?>
