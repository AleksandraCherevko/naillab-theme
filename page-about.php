<?php
/**
 * Template Name: About Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<main class="about-page">
  <section class="about-hero">
    <img class="about-hero-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero.png'); ?>" alt="O nás">
    <div class="about-hero__text">
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
      <li>gel laky v různých odstínech</li>
      <li>báze a topy</li>
      <li>produkty pro modeláž a zpevnění nehtů</li>
      <li>materiály pro nail art</li>
      <li>nástroje a pomocné tekutiny</li>
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
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-1.jpg'); ?>" alt="">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-2.jpg'); ?>" alt="">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-3.jpg'); ?>" alt="">
        <img class="about-gallery__grid-img" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/about-4.jpg'); ?>" alt="">
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

  <section class="about-section">
    <h2>Sídlo společnosti a fakturační údaje</h2>
    <p>Anastasiia Nedosichenko</p>
    <p>Lesní 534,</p>
    <p>289 24, Milovice - Mladá</p>
    <p>IČO: 19254067</p>
    <p><a href="mailto:nailslab.cz@gmail.com">📧 nailslab.cz@gmail.com</a></p>
    <p><a a href="tel:+420722392887">📞 +420 722 392 887</a></p>
    <p>Rádi vám pomůžeme.</p>
  </section>
</main>

<?php get_footer(); ?>
