<?php
/**
 * Template Name: Catalog Page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<?php
function naillab_render_catalog_section($title, $category_slug) {
    $products = new WP_Query([
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'tax_query'      => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ],
        ],
    ]);

    if (!$products->have_posts()) {
        wp_reset_postdata();
        return;
    }

    wp_reset_postdata();
    ?>
    <section class="catalog-block container">
      <h2 class="catalog-title"><?php echo esc_html($title); ?></h2>
      <div class="catalog-carousel">
        <button class="catalog-arrow prev" type="button" aria-label="Previous">
          <svg class="icon" width="20" height="20" aria-hidden="true">
            <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-angle-left'); ?>"></use>
          </svg>
        </button>

        <div class="catalog-row">
          <?php echo do_shortcode('[products category="' . esc_attr($category_slug) . '" limit="100" columns="8"]'); ?>
        </div>

        <button class="catalog-arrow next" type="button" aria-label="Next">
          <svg class="icon" width="20" height="20" aria-hidden="true">
            <use href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/symbol-defs.svg#icon-angle-right'); ?>"></use>
          </svg>
        </button>
      </div>
    </section>
    <?php
}
?>
 <main class="catalog-page">
  <?php naillab_render_catalog_section('Gel laky', 'gel-laky'); ?>
  <?php naillab_render_catalog_section('Base', 'base'); ?>
  <?php naillab_render_catalog_section('Topy', 'topy'); ?>

  <div class="catalog-more is-hidden">
    <?php naillab_render_catalog_section('Modeláž nehtů', 'modelaz-nehtu'); ?>
    <?php naillab_render_catalog_section('Design nehtů', 'nail-art-design-nehtu'); ?>
    <?php naillab_render_catalog_section('Horní formy', 'horni-formy-dual-forms'); ?>
    <?php naillab_render_catalog_section('Štětce', 'stetce'); ?>
    <?php naillab_render_catalog_section('Frézy', 'frezy'); ?>
    <?php naillab_render_catalog_section('Pomocné tekutiny', 'pomocne-tekutiny'); ?>
    <?php naillab_render_catalog_section('Jednorázové produkty', 'jednorazove-produkty'); ?>
    <?php naillab_render_catalog_section('Onistop', 'onistop'); ?>
    <?php naillab_render_catalog_section('Podology+', 'profesionalni-kosmetika-podology'); ?>
  </div>

  <div class="catalog-actions container">
    <button class="catalog-more-btn" type="button">Zobrazit více</button>
  </div>
</main>


<?php get_footer(); ?>
