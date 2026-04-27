<?php
defined('ABSPATH') || exit;

get_header();
?>

<main id="main" class="site-main error-404-page">
  <section class="error-404-brand">
    <div class="container">
      <div class="error-404-brand__card">
        <p class="error-404-brand__code">404</p>

        <h1 class="error-404-brand__title catalog-title">
          Tato stránka se nenašla
        </h1>

        <p class="error-404-brand__text">
          Odkaz může být neplatný, nebo byla stránka přesunuta.
          Zkuste pokračovat do katalogu nebo vyhledat produkt.
        </p>

        <div class="error-404-brand__actions">
          <a class="error-404-brand__button" href="<?php echo esc_url(home_url('/katalog/')); ?>">
            Přejít do katalogu
          </a>

          <a class="error-404-brand__secondary" href="<?php echo esc_url(home_url('/')); ?>">
            Zpět na hlavní stránku
          </a>
        </div>

        <div class="error-404-brand__search">
          <?php get_product_search_form(); ?>
        </div>

        <div class="error-404-brand__sections">
          <h2 class="error-404-brand__subtitle catalog-title">
            Oblíbené sekce
          </h2>

          <div class="error-404-brand__grid">
            <a href="<?php echo esc_url(home_url('/product-category/gel-laky/')); ?>">Gel laky</a>
            <a href="<?php echo esc_url(home_url('/product-category/base/')); ?>">Base</a>
            <a href="<?php echo esc_url(home_url('/product-category/topy/')); ?>">Topy</a>
            <a href="<?php echo esc_url(home_url('/product-category/modelaz-nehtu/')); ?>">Modeláž nehtů</a>
            <a href="<?php echo esc_url(home_url('/product-category/design-nehtu/')); ?>">Design nehtů</a>
            <a href="<?php echo esc_url(home_url('/product-category/horni-formy/')); ?>">Horní formy</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
